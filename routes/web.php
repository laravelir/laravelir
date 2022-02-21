<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\PostController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\PodcastController;
use App\Http\Controllers\Site\DiscussionController;
use App\Http\Controllers\Site\User\UserController;

Route::group(['as' => 'site.'], function () {
    Route::get('', [SiteController::class, 'index'])->name('index');
    Route::get('/contact', [SiteController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact', [SiteController::class, 'contactUsStore'])->name('contact-us.store');
    Route::get('/jobs', [SiteController::class, 'jobRequest'])->name('jobs.request');
    Route::post('/jobs/request', [SiteController::class, 'jobRequestStore'])->name('jobs.request.store');
    Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about-us');
    Route::get('/changelog', [SiteController::class, 'changelog'])->name('changelog');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/packages', [SiteController::class, 'packagesPage'])->name('pages.packages');


    Route::get('/podcasts', [PodcastController::class, 'index'])->name('podcasts.index');
    Route::get('/podcasts/{podcast}', [PodcastController::class, 'show'])->name('podcasts.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');

});
