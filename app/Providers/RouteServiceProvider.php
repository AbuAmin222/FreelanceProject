<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\EmailVerifiedByGuard;
use Illuminate\Support\Facades\Route;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->routes(function () {
        //     // مسارات Web
        //     Route::middleware('web')
        //         ->group(base_path('routes/web.php'));

        //     // مسارات API
        //     Route::prefix('api')
        //         ->middleware('api')
        //         ->group(base_path('routes/api.php'));
        // });
        Route::macro('authGuard', function (string $prefix, string $name, string $guard, string $controller, array $options = []) {
            Route::controller($controller)->group(function () use ($guard, $options, $prefix, $name) {

                // Login Routes
                Route::get('login', 'index')->name('login');
                Route::post('login', 'login')->name('login.submit');
                // End-Routes

                // Forgot Password Routes
                Route::get('index-forget-password', 'indexForgetPass')->name('forgetPass');
                Route::post('forget-password', 'forgetPass')->name('forgetPass.submit');
                // End-Routes

                // Register Routes
                if (!isset($options['register']) || $options['register'] !== false) {
                    Route::get('register', 'indexregister')->name('register')->defaults('guard', $guard);
                    Route::post('register', 'register')->name('register.submit')->defaults('guard', $guard);
                }
                // End-Routes

                Route::prefix($prefix)
                    ->name($name . '.')
                    ->group(function () use ($guard, $options) {
                        Route::middleware(['verified.guard:' . $guard, 'auth.guard:' . $guard])->group(function () use ($guard) {
                            // Default Routes
                            Route::get('dashboard-light', 'lightDash')->name('lightDash')->defaults('guard', $guard);
                            Route::get('dashboard-dark', 'darkDash')->name('darkDash')->defaults('guard', $guard);
                            // End-Routes

                            // Logout-Routes
                            Route::post('logout', 'logout')->name('logout')->defaults('guard', $guard);
                            // Logout-Routes

                        });
                        // Route::middleware('verified.guard:' . $guard)->group(function () use ($guard, $options) {
                        // Login Routes
                        Route::get('login', 'index')->name('login');
                        Route::post('login', 'login')->name('login.submit');
                        // End-Routes

                        // Forgot Password Routes
                        Route::get('index-forget-password', 'indexForgetPass')->name('forgetPass');
                        Route::post('forget-password', 'forgetPass')->name('forgetPass.submit');
                        // End-Routes

                        // Register Routes
                        if (!isset($options['register']) || $options['register'] !== false) {
                            Route::get('register', 'indexregister')->name('register')->defaults('guard', $guard);
                            Route::post('register', 'register')->name('register.submit')->defaults('guard', $guard);
                        }
                        // End-Routes

                        // Forgot Password Routes
                        Route::get('forget-password-resend', 'sendPassLink')->name('forgetPass.reSend')->defaults('guard', $guard);
                        Route::post('forget-password-resend', 'sendPassLink')->name('forgetPass.reSend')->defaults('guard', $guard);
                        Route::get('verified-password', 'confirm')->name('confirm')->defaults('guard', $guard);
                        Route::post('reset-password', 'resetPass')->name('resetPass.submit')->defaults('guard', $guard);
                        // End-Routes

                        // Email verification Routes
                        Route::get('sending-email-notification', 'emailNotification')->name('emailNotification')->defaults('guard', $guard);
                        Route::get('email-verified', 'emailVerified')->name('emailVerified')->defaults('guard', $guard);
                        Route::get('email-verified-success', 'emailVerifiedS')->name('emailVerifiedS')->defaults('guard', $guard);
                        // End-Routes

                        // });
                    });
            });
        });
        Route::macro('dashboardActions', function (string $prefix, string $name, string $guard, string $controller) {
            Route::controller($controller)
                ->group(function () use ($guard, $prefix, $name) {
                    Route::prefix($prefix)
                        ->name($name . '.')
                        ->group(function () use ($guard) {
                            Route::get('index-confirm-password', 'confirmPass')->name('confirmPass')->defaults('guard', $guard);
                            Route::post('validate-data', 'validateData')->name('validateData')->defaults('guard', $guard);
                            Route::get('reset-password', 'resetPass')->name('resetPass')->defaults('guard', $guard);
                            Route::post('submit-reset-password', 'submitRPass')->name('resetPass.submit')->defaults('guard', $guard);
                            Route::get('index-profile', 'profile')->name('profile')->defaults('guard', $guard);
                        });
                });
        });
    }
}
