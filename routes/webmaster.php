<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webmaster\City\CityController;
use App\Http\Controllers\Webmaster\News\NewsController;
use App\Http\Controllers\Webmaster\User\UserController;
use App\Http\Controllers\Webmaster\WebmasterController;
use App\Http\Controllers\Webmaster\Skill\SkillController;
use App\Http\Controllers\Webmaster\Acl\Role\RoleController;
use App\Http\Controllers\Webmaster\Ticket\TicketController;
use App\Http\Controllers\Webmaster\Comment\CommentController;
use App\Http\Controllers\Webmaster\Content\Tag\TagController;
use App\Http\Controllers\Webmaster\Country\CountryController;
use App\Http\Controllers\Webmaster\Package\PackageController;
use App\Http\Controllers\Webmaster\Payment\PaymentController;
use App\Http\Controllers\Webmaster\Project\ProjectController;
use App\Http\Controllers\Webmaster\Contact\ContactUsController;
use App\Http\Controllers\Webmaster\Content\Post\PostController;
use App\Http\Controllers\Webmaster\Discount\DiscountController;
use App\Http\Controllers\Webmaster\Language\LanguageController;
use App\Http\Controllers\Webmaster\Province\ProvinceController;
use App\Http\Controllers\Webmaster\Ticket\TicketSubjectController;
use App\Http\Controllers\Webmaster\Freelancer\FreelancerController;
use App\Http\Controllers\Webmaster\Miscellaneous\Faq\FaqController;
use App\Http\Controllers\Webmaster\Achievement\AchievementController;
use App\Http\Controllers\Webmaster\Content\Podcast\PodcastController;
use App\Http\Controllers\Webmaster\Acl\Permission\PermissionController;
use App\Http\Controllers\Webmaster\Content\Category\CategoryController;
use App\Http\Controllers\Webmaster\Discussion\DiscussionController;
use App\Http\Controllers\Webmaster\Miscellaneous\Faq\FaqGroupController;
use App\Http\Controllers\Webmaster\Miscellaneous\AcquaintedUs\AcquaintedUsController;

Route::group(['prefix' => 'webmaster', 'as' => 'webmaster.', 'middleware' => []], function () {
    Route::get('', [WebmasterController::class, 'webmaster'])->name('index');

    Route::get('/roles/assign', [RoleController::class, 'assignForm'])->name('roles.assign.form');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');

    Route::get('/achievements/assign', [AchievementController::class, 'assignForm'])->name('achievements.assign.form');
    Route::post('/achievements/assign', [AchievementController::class, 'assign'])->name('achievements.assign');

    Route::post('/tickets/reply/{ticket}', [TicketController::class, 'reply'])->name('tickets.reply');
    Route::post('/tickets/done/{ticket}', [TicketController::class, 'done'])->name('tickets.done');
    Route::post('/tickets/open/{ticket}', [TicketController::class, 'open'])->name('tickets.open');
    Route::resource('tickets', TicketController::class)->except(['update', 'edit']);

    Route::get('/statistics', [RoleController::class, 'assignForm'])->name('advanced.statistics');
    Route::get('/logs', [RoleController::class, 'assignForm'])->name('advanced.logs');
    Route::get('/settings', [RoleController::class, 'assignForm'])->name('advanced.settings');

    Route::get('/jobs/requests', [WebmasterController::class, 'jobRequests'])->name('jobs.requests');
    Route::get('/jobs/requests/{job}', [WebmasterController::class, 'jobRequestsShow'])->name('jobs.requests.show');

    Route::resource('projects', ProjectController::class, [
        'as' => 'webmaster'
    ])->except(['store', 'update', 'edit']);


    Route::get('/contacts', [ContactUsController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactUsController::class, 'show'])->name('contacts.show');
    Route::post('/contacts', [ContactUsController::class, 'store'])->name('contacts.store');

    Route::resources([
        'users' => UserController::class,
        'sponsors' => UserController::class,
        'view-points' => UserController::class,
        'partners' => UserController::class,
        'acquaints' => AcquaintedUsController::class,
        'faqs' => FaqController::class,
        'faq-groups' => FaqGroupController::class,
        'achievements' => AchievementController::class,
        'freelancers' => FreelancerController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'payments' => PaymentController::class,
        'advertises' => NewsController::class,
        'podcasts' => PodcastController::class,
        'posts' => PostController::class,
        'tags' => TagController::class,
        'skills' => SkillController::class,
        'categories' => CategoryController::class,
        'subjects' => TicketSubjectController::class,
        'discounts' => DiscountController::class,
        'discussions' => DiscussionController::class,
        'comments' => CommentController::class,
        'countries' => CountryController::class,
        'provinces' => ProvinceController::class,
        'cities' => CityController::class,
        'languages' => LanguageController::class,
        'acquainted' => AcquaintedUsController::class,
        'packages' => PackageController::class,
    ]);
});
