<?php

namespace App\Http\Controllers\auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Notifications\VerifyEmail;

class AuthController
{
    /**
     *  Login
     **/
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (! $user->hasVerifiedEmail()) {
                $this->generateMail($user);

                return response()->json([
                    'message' => 'Please verify your email. A new verification link has been sent to your inbox.',
                ]);
            }

            $token = $this->generate_token($user);

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
                'profile' => $user->role == 'JSK' ? $user->jskProfile : $user->empProfile,
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function generateMail(User $user)
    {
        // verify link valid tah 1 day te
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addDay(),
            [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        try {
            $user->sendEmailVerificationNotification();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User registered, but failed to send verification email.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Register
     **/
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:JSK,EMP',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'account_type' => 'email',
        ]);

        $this->generateMail($user);

        return response()->json([
            'message' => 'Registration successful. Please check your email for verification link for account activation.',
        ]);
    }

    public function registerVerfication(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (!hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link'], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified']);
        }

        $user->markEmailAsVerified();

        $frontend_url = env('FRONTEND_CALLBACK_URL', 'http://localhost:3000/auth/callback');
        return redirect($frontend_url . '?token=' . $this->generate_token($user));
    }

    /**
     * Logout
     **/
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }

    private function generate_token($user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    /**
     *Verify Token
     *
     **/
    public function verifyToken(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return response()->json([
                'message' => 'Token is required.',
            ], 400);
        }

        $personalAccessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);

        if (!$personalAccessToken) {
            return response()->json([
                'message' => 'Invalid or expired token.',
            ], 401);
        }

        $user = $personalAccessToken->tokenable;

        return response()->json([
            'message' => 'Successfully verified token',
            'user' => $user,
            'profile' => $user->role == 'JSK' ? $user->jskProfile : $user->empProfile,
        ]);
    }

    /**
     * Google Login
     **/
    public function googleLogin()
    {
        $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();

        return response()->json([
            'message' => 'Redirect to this URL to login with Google',
            'redirect_url' => $url,
        ]);
    }

    /**
     * Google Callback
     **/
    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $email = $googleUser->getEmail();
            if (!$email) {
                return response()->json(
                    [
                        'message' => 'Google account has no email address associated.',
                    ],
                    422,
                );
            }

            $user = User::where('email', $email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName() ?? explode('@', $email)[0],
                    'email' => $email,
                    'role' => 'JSK',
                    'password' => Hash::make(Str::random(40)),
                    'email_verified_at' => now(),
                    'account_type' => 'google',
                ]);
            } else {
                $needsSave = false;

                if ($user->account_type !== 'google') {
                    $user->account_type = 'google';
                    $needsSave = true;
                }

                if (is_null($user->email_verified_at)) {
                    $user->email_verified_at = now();
                    $needsSave = true;
                }

                if (empty($user->name) && $googleUser->getName()) {
                    $user->name = $googleUser->getName();
                    $needsSave = true;
                }

                if ($needsSave) {
                    $user->save();
                }
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            $frontend_url = env('FRONTEND_CALLBACK_URL', 'http://localhost:3000/auth/callback');
            return redirect($frontend_url . '?token=' . $token);
        } catch (\Throwable $e) {
            Log::error('Google login error', ['error' => $e->getMessage()]);
            return response()->json(
                [
                    'message' => 'Unable to login with Google.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}
