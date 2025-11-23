<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;

use App\Http\Controllers\api\Util\{
    ImageUploadController,
    SearchController,
    SkillController
};

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\webhook\StripeWebhookController;
use App\Http\Controllers\api\emp\{
    AccRepController,
    BizVerController,
    EmpProfileController,
    ProfileInfoController as EmpProfileInfoController,
    JobApplicationController as EmpJobApplicationController
};

use App\Http\Controllers\api\subscription\SubscriptionController;

use App\Http\Controllers\api\pmtf\{
    StripeController,
    PaymentController
};

use App\Http\Controllers\api\job\{
    GetJobController,
    JobController
};
use App\Http\Controllers\api\jsk\{
    JskProfileController,
    ProfileInfoController,
    ProfileExpController,
    ProfileSkillController,
    JskEducationController,
    JskCertificateController,
    JskSavedJobController,
    JobApplicationController
};

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/google/login', [AuthController::class, 'googleLogin']);
    Route::get('/google/callback', [AuthController::class, 'googleCallback']);
    Route::get('/verify-token', [AuthController::class, 'verifyToken']);

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'registerVerfication'])->name('verification.verify');
});

Route::apiResource('jobs', GetJobController::class)->only(['index', 'show']);
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle']);
Route::get('job-search/{title}', [GetJobController::class, 'searchByTitle']);
Route::get('/get-plan', [SubscriptionController::class, 'getAllPlans']);


Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Common Util
    Route::post('image-upload', [ImageUploadController::class, 'imageUpload']);

    Route::get('jsk-profile-search/{name}', [JskProfileController::class, 'searchByName']);
    // Route::get('profile-search/{name}', [SearchController::class, 'searchByName']);

    Route::apiResource('jsk-profile', JskProfileController::class)->only(['index', 'show']);

    Route::prefix('JS')->middleware('auth.route:JSK')->group(function () {
        Route::get('jsk-profile-data', [JskProfileController::class, 'getCurrentUserProfile']);
        Route::get('easy-apply-eligibility', [JobApplicationController::class, 'checkEasyApplyEligibility']);
        Route::apiResource('jsk-profile-info', ProfileInfoController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('profile-exp', ProfileExpController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('profile-skill', ProfileSkillController::class)->only(['store', 'update', 'destroy']);
        Route::get('industries', [ProfileSkillController::class, 'getIndustries']);
        Route::apiResource('profile-edu', JskEducationController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('profile-cert', JskCertificateController::class)->only(['store', 'update', 'destroy']);

        Route::get('saved-jobs', [JskSavedJobController::class, 'getAllSavedJobs']);
        Route::post('saved-job', [JskSavedJobController::class, 'storedSavedJob']);
        Route::delete('saved-job', [JskSavedJobController::class, 'deleteSavedJob']);

        Route::get('current-applications', [JobApplicationController::class, 'getCurrentApplications']);
        Route::get('skills', [SkillController::class, 'searchSkills']);

        Route::post('apply-job', [JobApplicationController::class, 'applyJob']);
        Route::post('cv-upload', [JobApplicationController::class, 'cvUpload']);
        Route::post('cancel-application', [JobApplicationController::class, 'cancelApplication']);
    });

    Route::get('emp-profile-search/{name}', [EmpProfileController::class, 'searchByName']);
    Route::apiResource('emp-profile', EmpProfileController::class)->only(['index', 'show']);

    Route::prefix('EP')->middleware('auth.route:EMP')->group(function () {
        Route::get('emp-profile-data', [EmpProfileController::class, 'getCurrentUserProfile']);

        Route::apiResource('emp-profile-info', EmpProfileInfoController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('biz-verification', BizVerController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('acc-representative', AccRepController::class)->only(['store', 'update', 'destroy']);
        Route::get('job-history', [GetJobController::class, 'getEmployerHiringHistory']);
        Route::middleware('subscriber')->group(function () {
            Route::apiResource('jobs', JobController::class);
            Route::post('cancel-subscription', [PaymentController::class, 'cancelSubscription']);
        });
        Route::get('skills', [SkillController::class, 'searchSkills']);
        Route::get('is-subscribed', [StripeController::class, 'isSubscribed']);
        Route::get('get-user-subscription', [StripeController::class, 'getUserSubscription']);
        Route::get('get-specific-subscription', [StripeController::class, 'getSubscription']);

        Route::get('stripe/get-stripe-customer', [StripeController::class, 'getCurrentStripeCustomer']);

        Route::post('stripe/charge-per-day', [PaymentController::class, 'chargePerDay']);
        Route::post('stripe/subscribe-plan', [PaymentController::class, 'planSubscription']);
        Route::get('job-applications', [EmpJobApplicationController::class, 'getJobApplications']);
        Route::post('update-application-status', [EmpJobApplicationController::class, 'updateJobApplicationStatus']);


    });

    Route::prefix('AD')->middleware('auth.route:ADM')->group(function () {
        Route::get('/home', function (Request $request) {
            return response()->json([
                'data' => 'testing Admin Route',
            ]);
        });
    });

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});