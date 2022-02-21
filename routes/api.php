<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Site\TagApiController;
use App\Http\Controllers\Api\v1\Auth\AuthApiController;
use App\Http\Controllers\Api\V1\Site\PostApiController;
use App\Http\Controllers\Api\V1\Site\UserApiController;
use App\Http\Controllers\Api\V1\Site\CommentApiController;
use App\Http\Controllers\Api\V1\Site\PackageApiController;
use App\Http\Controllers\Api\V1\Site\PodcastApiController;
use App\Http\Controllers\Api\V1\Site\SponsorApiController;
use App\Http\Controllers\Api\V1\Site\CategoryApiController;
use App\Http\Controllers\Api\V1\Site\StatisticsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => []], function () {
    Route::group(['prefix' => 'auth', 'middleware' => []], function () {
        Route::post('login', [AuthApiController::class, 'login']);
        Route::post('register', [AuthApiController::class, 'register']);
        Route::post('logout', [AuthApiController::class, 'logout']);
        Route::post('me', [AuthApiController::class, 'me']);
    });
    Route::get('tags', [TagApiController::class, 'index']);
    Route::get('tags/{tag}', [TagApiController::class, 'show']);

    Route::get('categories', [CategoryApiController::class, 'index']);
    Route::get('categories/{category}', [CategoryApiController::class, 'show']);

    Route::get('packages', [PackageApiController::class, 'index']);
    Route::get('packages/{package}', [PackageApiController::class, 'show']);

    Route::get('posts', [PostApiController::class, 'index']);
    Route::get('posts/{post}', [PostApiController::class, 'show']);

    Route::get('podcasts', [PodcastApiController::class, 'index']);
    Route::get('podcasts/{podcast}', [PodcastApiController::class, 'show']);

    Route::get('comments', [CommentApiController::class, 'index']);
    Route::get('comments/{comment}', [CommentApiController::class, 'show']);

    Route::get('users', [UserApiController::class, 'index']);
    Route::get('users/{user}', [UserApiController::class, 'show']);

    Route::get('sponsors', [SponsorApiController::class, 'index']);
    Route::get('sponsors/{sponsor}', [SponsorApiController::class, 'show']);

    Route::get('statistics', [StatisticsApiController::class, 'index']);
});
