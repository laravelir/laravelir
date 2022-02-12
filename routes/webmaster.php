<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webmaster\Tag\TagController;
use App\Http\Controllers\Webmaster\City\CityController;
use App\Http\Controllers\Webmaster\Role\RoleController;
use App\Http\Controllers\Webmaster\User\UserController;
use App\Http\Controllers\Webmaster\WebmasterController;
use App\Http\Controllers\Webmaster\Skill\SkillController;
use App\Http\Controllers\Webmaster\Ticket\TicketController;
use App\Http\Controllers\Webmaster\Comment\CommentController;
use App\Http\Controllers\Webmaster\Country\CountryController;
use App\Http\Controllers\Webmaster\Package\PackageController;
use App\Http\Controllers\Webmaster\Payment\PaymentController;
use App\Http\Controllers\Webmaster\Project\ProjectController;
use App\Http\Controllers\Webmaster\Category\CategoryController;
use App\Http\Controllers\Webmaster\Contact\ContactUsController;
use App\Http\Controllers\Webmaster\Discount\DiscountController;
use App\Http\Controllers\Webmaster\Language\LanguageController;
use App\Http\Controllers\Webmaster\Province\ProvinceController;
use App\Http\Controllers\Webmaster\Ticket\TicketSubjectController;
use App\Http\Controllers\Webmaster\Freelancer\FreelancerController;
use App\Http\Controllers\Webmaster\Permission\PermissionController;
use App\Http\Controllers\Webmaster\Miscellaneous\AcquaintedUs\AcquaintedUsController;



Route::group(['prefix' => 'webmaster', 'middleware' => ['auth:web', 'admin']], function () {
    Route::get('', [WebmasterController::class, 'webmaster'])->name('webmaster.index');

    Route::get('/roles/assign', [RoleController::class, 'assignForm'])->name('webmaster.roles.assign.form');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('webmaster.roles.assign');

    Route::post('/tickets/reply/{ticket}', [TicketController::class, 'reply'])->name('webmaster.tickets.reply');
    Route::post('/tickets/done/{ticket}', [TicketController::class, 'done'])->name('webmaster.tickets.done');
    Route::post('/tickets/open/{ticket}', [TicketController::class, 'open'])->name('webmaster.tickets.open');
    Route::get('/tickets/create/freelancer', [TicketController::class, 'createFreelancer'])->name('webmaster.tickets.create.freelancer');
    Route::post('/tickets/store/freelancer', [TicketController::class, 'storeFreelancer'])->name('webmaster.tickets.store.freelancer');
    Route::resource('tickets', TicketController::class, ['as' => 'webmaster'])->except(['update', 'edit']);

    Route::get('/jobs/requests', [WebmasterController::class, 'jobRequests'])->name('webmaster.jobs.requests');
    Route::get('/jobs/requests/{job}', [WebmasterController::class, 'jobRequestsShow'])->name('webmaster.jobs.requests.show');

    Route::resource('projects', ProjectController::class, [
        'as' => 'webmaster'
    ])->except(['store', 'update', 'edit']);


    Route::get('/contacts', [ContactUsController::class, 'index'])->name('webmaster.contacts.index');

    Route::resources([
        'users' => UserController::class,
        'freelancers' => FreelancerController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'payments' => PaymentController::class,
        'tags' => TagController::class,
        'skills' => SkillController::class,
        'categories' => CategoryController::class,
        'subjects' => TicketSubjectController::class,
        'discounts' => DiscountController::class,
        'comments' => CommentController::class,
        'countries' => CountryController::class,
        'provinces' => ProvinceController::class,
        'cities' => CityController::class,
        'languages' => LanguageController::class,
        'acquainted' => AcquaintedUsController::class,
        'packages' => PackageController::class,
    ], [
        'as' => 'webmaster'
    ]);
});
