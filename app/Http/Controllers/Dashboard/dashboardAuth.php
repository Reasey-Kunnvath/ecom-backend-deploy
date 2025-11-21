<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class dashboardAuth extends Controller
{
    public function dashboardLoginForm()
    {
        return view('Login');
    }
    public function dashboardLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'ADM') {
                $request->session()->regenerate();

                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Access denied. You do not have admin privileges.',
                ])->onlyInput('email');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function dashboardLogout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
