<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientTestimonialController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/sectors-brands', [FrontendController::class, 'sectorsBrands'])->name('sectors.brands');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/services', [FrontendController::class, 'services'])->name('services.page');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [FrontendController::class, 'blogDetails'])->name('blog.details');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-us', [FrontendController::class, 'submitContact'])->name('contact.submit');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('clients', ClientController::class);
    Route::resource('client-testimonials', ClientTestimonialController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('case-studies', \App\Http\Controllers\Admin\CaseStudyController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('social-links', SocialLinkController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('users', UserController::class);
    Route::resource('blog-categories', BlogCategoryController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
