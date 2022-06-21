<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\PostController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\PodcastController;
use App\Http\Controllers\Site\User\UserController;
use App\Http\Controllers\Site\DiscussionController;
use App\Http\Controllers\Site\User\DiscussionController as UserDiscussionController;
use App\Http\Controllers\Site\User\ProjectController;
use App\Http\Controllers\Site\User\AccountController;

Route::group(['as' => 'site.'], function () {
    Route::get('', [SiteController::class, 'index'])->name('index');
    Route::get('/faqs', [SiteController::class, 'faqs'])->name('pages.faqs');
    Route::get('/contact', [SiteController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact', [SiteController::class, 'contactUsStore'])->name('contact-us.store');
    Route::get('/jobs', [SiteController::class, 'jobRequest'])->name('jobs.request');
    Route::post('/jobs/request', [SiteController::class, 'jobRequestStore'])->name('jobs.request.store');
    Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about-us');
    Route::get('/changelog', [SiteController::class, 'changelog'])->name('changelog');
    Route::get('/pricing', [SiteController::class, 'pricingPage'])->name('pricing');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/@{user:username}', [UserController::class, 'show'])->name('users.show');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

    Route::get('/podcasts', [PodcastController::class, 'index'])->name('podcasts.index');
    Route::get('/podcasts/{podcast}', [PodcastController::class, 'show'])->name('podcasts.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::resource('discussions', DiscussionController::class)->only(['index', 'show', 'create', 'store']);
});


Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => 'auth'], function () {

    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/edit', [AccountController::class, 'editForm'])->name('edit.form');
    Route::put('/edit', [AccountController::class, 'edit'])->name('edit');
    Route::get('/password/change', [AccountController::class, 'passwordChangeForm'])->name('password.change.form');
    Route::post('/password/change', [AccountController::class, 'passwordChange'])->name('password.change');
    Route::get('/favorites', [AccountController::class, 'editForm'])->name('favorites.index');

    Route::resources([
        'discussions' => UserDiscussionController::class,
        'tickets' => DiscussionController::class,
        'projects' => ProjectController::class,
    ]);
});
