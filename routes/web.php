<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryController as AdminIndustryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

/*
|-----------------------------------------------------------------------
| Public site
|-----------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/solutions', [PageController::class, 'solutions'])->name('solutions');
Route::get('/solutions/{solution:slug}', [PageController::class, 'solutionShow'])->name('solutions.show');
Route::get('/brands', [PageController::class, 'brands'])->name('brands');
Route::get('/brands/{brand:slug}', [PageController::class, 'brandShow'])->name('brands.show');
Route::get('/industries', [PageController::class, 'industries'])->name('industries');
Route::get('/industries/{industry:slug}', [PageController::class, 'industryShow'])->name('industries.show');
Route::get('/articles', [PageController::class, 'articles'])->name('articles');
Route::get('/articles/{article:slug}', [PageController::class, 'articleShow'])->name('articles.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/{career:slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{career:slug}/apply', [CareerController::class, 'apply'])
    ->middleware('throttle:5,1')->name('careers.apply');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:10,1')->name('contact.store');

Route::get('/quote', [QuoteController::class, 'show'])->name('quote');
Route::post('/quote', [QuoteController::class, 'store'])
    ->middleware('throttle:10,1')->name('quote.store');

/*
|-----------------------------------------------------------------------
| Admin auth
|-----------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])
            ->middleware('throttle:5,1')->name('login.post');
    });
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth')->name('logout');
});

/*
|-----------------------------------------------------------------------
| Admin panel (authenticated + admin role)
|-----------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('brands', AdminBrandController::class);
        Route::resource('solutions', AdminSolutionController::class);
        Route::resource('industries', AdminIndustryController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('careers', AdminCareerController::class);
        Route::resource('articles', AdminArticleController::class);

        Route::get('career-applications', [CareerApplicationController::class, 'index'])
            ->name('career-applications.index');
        Route::get('career-applications/{application}', [CareerApplicationController::class, 'show'])
            ->name('career-applications.show');
        Route::delete('career-applications/{application}', [CareerApplicationController::class, 'destroy'])
            ->name('career-applications.destroy');

        Route::get('quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
        Route::get('quotes/{quote}', [AdminQuoteController::class, 'show'])->name('quotes.show');
        Route::patch('quotes/{quote}', [AdminQuoteController::class, 'update'])->name('quotes.update');
        Route::delete('quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');

        Route::get('contact-messages', [ContactMessageController::class, 'index'])
            ->name('contact-messages.index');
        Route::get('contact-messages/{message}', [ContactMessageController::class, 'show'])
            ->name('contact-messages.show');
        Route::delete('contact-messages/{message}', [ContactMessageController::class, 'destroy'])
            ->name('contact-messages.destroy');

        Route::get('media', [MediaController::class, 'index'])->name('media.index');
        Route::post('media', [MediaController::class, 'store'])->name('media.store');
        Route::delete('media/{medium}', [MediaController::class, 'destroy'])->name('media.destroy');

        Route::get('company-info', [CompanyInfoController::class, 'edit'])->name('company-info.edit');
        Route::put('company-info', [CompanyInfoController::class, 'update'])->name('company-info.update');

        Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit-logs.index');
    });