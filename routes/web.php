<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;


Route::group(['as' => 'site.'], function () {
    Route::get('', [SiteController::class, 'index'])->name('index');
    Route::get('/contact', [SiteController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact', [SiteController::class, 'contactUsStore'])->name('contact-us.store');
    Route::get('/jobs', [SiteController::class, 'jobRequest'])->name('jobs.request');
    Route::post('/jobs/request', [SiteController::class, 'jobRequestStore'])->name('jobs.request.store');
    Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about-us');
    Route::get('/packages', [SiteController::class, 'packagesPage'])->name('pages.packages');
});
