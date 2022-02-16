<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('password/forgot', [AuthController::class, 'showForgotPasswordForm'])->name('password.forgot');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('password/email', [ForgotPasswordController::class, 'forgotPasswordEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'resetPasswordEmail'])->name('password.update');

    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('{provider}/social', [SocialiteController::class, 'redirectToProvider'])->name('socialite');
    Route::get('{provider}/social/callback', [SocialiteController::class, 'handleProviderCallback'])->name('socialite.callback');
});
