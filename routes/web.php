<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;


Route::group(['as' => 'site.'], function () {
    Route::get('/contact', [SiteController::class, 'contactUs'])->name('site.contact-us');
    Route::post('/contact', [SiteController::class, 'contactUsStore'])->name('site.contact-us.store');
    Route::get('/jobs', [SiteController::class, 'jobRequest'])->name('site.jobs.request');
    Route::post('/jobs/request', [SiteController::class, 'jobRequestStore'])->name('site.jobs.request.store');
    Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('site.about-us');
    Route::get('/packages', [SiteController::class, 'packagesPage'])->name('site.pages.packages');
});
