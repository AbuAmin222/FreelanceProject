<?php

use App\HelperFunction;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Default\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/logining', function () {
    return redirect()->route('login');
});
Route::get('/', function () {
    return view('Dashboard.offers');
});
Route::get('confirm', function(){
    return 'Confirm email to be happy!!!';
})->name('confirm');
Route::get('client/login', [AuthController::class, 'index'])->name('login')->defaults('guard', 'web');
Route::get('profile', function(){
    $guard = 'web';
    return view('Dashboard.Content.contentProfile', compact('guard'));
})->name('profile')->defaults('guard', 'web');

// Administrator Routes
// HelperFunction::pagesRoutes('admin', AuthController::class, 'admin', 'admin');
Route::authGuard('admin', 'admin', 'admin', AuthController::class, ['register' => true]);
Route::dashboardActions('admin', 'admin', 'admin', DashboardController::class);

// Freelancers Routse
// HelperFunction::pagesRoutes('freelancer', AuthController::class, 'freelancer', 'freelancer');
// ['register' => false] if you need to show register routes
Route::authGuard('freelancer', 'freelancer', 'freelancer', AuthController::class, ['register' => true]);
Route::dashboardActions('freelancer', 'freelancer', 'freelancer', DashboardController::class);


// Clients Routes
// HelperFunction::pagesRoutes('client', AuthController::class, 'client', 'client');
Route::authGuard('client', 'web', 'web', AuthController::class);
Route::dashboardActions('client', 'web', 'web', DashboardController::class);

// Email verification sent
Route::get('verify-email/{guard}{token}', [EmailVerificationController::class, 'verify'])->name('verification.email')->where('guard', 'web|freelancer|admin');

// Reset Password
Route::get('reset-password/{guard}', [ResetPasswordController::class, 'indexReset'])->name('resetPasword')->where('guard', 'web|freelancer|admin');

