<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'site.'], function () {
    Route::get('/contact//', [SiteController::class, 'contactUs'])->name('site.contact-us');
    Route::post('/contact', [SiteController::class, 'contactUsStore'])->name('site.contact-us.store');
    Route::get('/jobs//', [SiteController::class, 'jobRequest'])->name('site.jobs.request');
    Route::post('/jobs/request', [SiteController::class, 'jobRequestStore'])->name('site.jobs.request.store');
    Route::get('/about-us//', [SiteController::class, 'aboutUs'])->name('site.about-us');
    Route::get('/seo//', [SiteController::class, 'seoPage'])->name('site.pages.seo');
    Route::get('/packages//', [SiteController::class, 'packagesPage'])->name('site.pages.packages');
    Route::get('/content//', [SiteController::class, 'contentPage'])->name('site.pages.content');
    Route::get('/content-in-english//', [SiteController::class, 'contentEnglishPage'])->name('site.pages.content.english');
    Route::get('/seo-in-isfahan//', [SiteController::class, 'seoIsfahanPage'])->name('site.pages.seo.isfahan');
    Route::get('/website-design//', [SiteController::class, 'webDesignPage'])->name('site.pages.web');
    Route::get('/social-media//', [SiteController::class, 'socialMediaPage'])->name('site.pages.social');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
