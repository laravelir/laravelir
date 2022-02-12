<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webmaster\Tag\TagController;
use App\Http\Controllers\Webmaster\City\CityController;
use App\Http\Controllers\Webmaster\Role\RoleController;
use App\Http\Controllers\Webmaster\User\UserController;
use App\Http\Controllers\Webmaster\WebmasterController;
use App\Http\Controllers\Webmaster\Skill\SkillController;
use App\Http\Controllers\Webmaster\Addons\AddonsController;
use App\Http\Controllers\Webmaster\Adword\AdwordController;
use App\Http\Controllers\Webmaster\Factor\FactorController;
use App\Http\Controllers\Webmaster\Payout\PayoutController;
use App\Http\Controllers\Webmaster\Ticket\TicketController;
use App\Http\Controllers\Webmaster\Article\ArticleController;
use App\Http\Controllers\Webmaster\Comment\CommentController;
use App\Http\Controllers\Webmaster\Country\CountryController;
use App\Http\Controllers\Webmaster\Package\PackageController;
use App\Http\Controllers\Webmaster\Payment\PaymentController;
use App\Http\Controllers\Webmaster\Product\ProductController;
use App\Http\Controllers\Webmaster\Project\ProjectController;
use App\Http\Controllers\Webmaster\Category\CategoryController;
use App\Http\Controllers\Webmaster\Contact\ContactUsController;
use App\Http\Controllers\Webmaster\Discount\DiscountController;
use App\Http\Controllers\Webmaster\Language\LanguageController;
use App\Http\Controllers\Webmaster\Province\ProvinceController;
use App\Http\Controllers\Webmaster\Reportage\ReportageController;
use App\Http\Controllers\Webmaster\Ticket\TicketSubjectController;
use App\Http\Controllers\Webmaster\AdwordPlan\AdwordPlanController;
use App\Http\Controllers\Webmaster\Freelancer\FreelancerController;
use App\Http\Controllers\Webmaster\Permission\PermissionController;
use App\Http\Controllers\Webmaster\SeoProject\SeoProjectController;
use App\Http\Controllers\Webmaster\ProductReportage\ProductReportageController;
use App\Http\Controllers\Webmaster\Miscellaneous\AcquaintedUs\AcquaintedUsController;
use App\Http\Controllers\Webmaster\Miscellaneous\ContentFormat\ContentFormatController;
use App\Http\Controllers\Webmaster\Miscellaneous\ContentQuality\ContentQualityController;


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

    Route::get('/payouts', [PayoutController::class, 'index'])->name('webmaster.payouts');
    Route::get('/factors', [FactorController::class, 'index'])->name('webmaster.factors');
    Route::get('/factors/{factor}', [FactorController::class, 'show'])->name('webmaster.factors.show');
    Route::post('/factors/{factor}/upload', [FactorController::class, 'uploadFactor'])->name('webmaster.factors.upload');

    Route::get('/packages/orders', [PackageController::class, 'orders'])->name('webmaster.packages.orders');
    Route::get('/packages/orders/{order}', [PackageController::class, 'orderShow'])->name('webmaster.packages.orders.show');

    Route::get('/jobs/requests', [WebmasterController::class, 'jobRequests'])->name('webmaster.jobs.requests');
    Route::get('/jobs/requests/{job}', [WebmasterController::class, 'jobRequestsShow'])->name('webmaster.jobs.requests.show');

    Route::get('/reportages/orders', [ReportageController::class, 'orders'])->name('webmaster.reportages.orders');
    Route::get('/reportages/orders/{order}', [ReportageController::class, 'orderShow'])->name('webmaster.reportages.orders.show');
    Route::get('reportage/setting-order/{order}', [ReportageController::class, 'settingOrderForm'])->name('webmaster.reportages.setting.order.form');
    Route::post('reportages/setting-order/{order}', [ReportageController::class, 'settingOrder'])->name('webmaster.reportages.setting.order');
    Route::post('reportages/setting-order/{order}/link', [ReportageController::class, 'settingOrderLinkStore'])->name('webmaster.reportages.setting.order.link');
    Route::post('reportages/setting-order/{order}/approve', [ReportageController::class, 'approve'])->name('webmaster.reportages.setting.order.approve');
    Route::post('reportages/setting-order/{order}/disapprove', [ReportageController::class, 'disapprove'])->name('webmaster.reportages.setting.order.disapprove');

    Route::post('/projects/{project}/adminDone', [ProjectController::class, 'adminDone'])->name('webmaster.projects.done');
    Route::post('/projects/{project}/attachment', [ProjectController::class, 'storeAttachment'])->name('webmaster.projects.attachment');
    Route::get('/projects/{attachment}/download', [ProjectController::class, 'downloadContentAttachment'])->name('webmaster.projects.attachment.download');
    Route::post('projects/{order}/{attachment}/attachment/approve', [ProjectController::class, 'approveAttachment'])->name('webmaster.projects.order.attachment.approve');
    Route::post('projects/{order}/attachment/disapprove', [ProjectController::class, 'disapproveAttachment'])->name('webmaster.projects.order.attachment.disapprove');
    Route::post('projects/{order}/freelancer/change', [ProjectController::class, 'changeFreelancer'])->name('webmaster.projects.order.freelancer.change');
    Route::post('projects/{project_id}/{freelancer_id}/assign', [ProjectController::class, 'assignToFreelancer'])->name('webmaster.projects.order.freelancer.assign');
    Route::post('projects/{order}/approve', [ProjectController::class, 'approve'])->name('webmaster.projects.order.approve');
    Route::post('projects/{order_id}/disapprove', [ProjectController::class, 'disapprove'])->name('webmaster.projects.order.disapprove');
    Route::resource('projects', ProjectController::class, [
        'as' => 'webmaster'
    ])->except(['store', 'update', 'edit']);

    Route::post('freelancers/{portfolio}/approve', [FreelancerController::class, 'portfolioApprove'])->name('webmaster.freelancers.portfolio.approve');

    Route::post('adwords/{adword}/approve', [AdwordController::class, 'approve'])->name('webmaster.adwords.approve');
    Route::post('adwords/{adword}/done', [AdwordController::class, 'done'])->name('webmaster.adwords.done');

    Route::post('/seo-projects/orders/approve/{order}', [SeoProjectController::class, 'approve'])->name('webmaster.seo-projects.orders.approve');
    Route::post('/seo-projects/orders/reject/{order}', [SeoProjectController::class, 'reject'])->name('webmaster.seo-projects.orders.reject');
    Route::post('/seo-projects/orders/done/{order}', [SeoProjectController::class, 'done'])->name('webmaster.seo-projects.orders.done');
    Route::get('/seo-projects/orders', [SeoProjectController::class, 'index'])->name('webmaster.seo-projects.orders');
    Route::get('/seo-projects/orders/{order}', [SeoProjectController::class, 'show'])->name('webmaster.seo-projects.orders.show');

    // Route::resource('contacts', ContactUsController::class)->only('index', 'show');

    Route::get('/contacts', [ContactUsController::class, 'index'])->name('webmaster.contacts.index');
    // Route::get('/contacts/{contact}', [ContactUsController::class, 'show'])->name('webmaster.contacts.show');


    Route::post('/users/national-card/{user}/approved', [UserController::class, 'nationalCardApprove'])->name('webmaster.users.national.card.approve');
    Route::post('/freelancers/national-card/{freelancer}/approved', [FreelancerController::class, 'nationalCardApprove'])->name('webmaster.freelancers.national.card.approve');

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
        'products' => ProductController::class,
        'product-reportages' => ProductReportageController::class,
        'articles' => ArticleController::class,
        'languages' => LanguageController::class,
        'acquainted' => AcquaintedUsController::class,
        'addons' => AddonsController::class,
        'qualities' => ContentQualityController::class,
        'formats' => ContentFormatController::class,
        'adwords' => AdwordController::class,
        'adword-plans' => AdwordPlanController::class,
        'reportages' => ReportageController::class,
        'packages' => PackageController::class,
    ], [
        'as' => 'webmaster'
    ]);
});
