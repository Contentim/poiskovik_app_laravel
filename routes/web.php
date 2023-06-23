<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HorizontalController;
use App\Http\Controllers\VerticalController;
use App\Http\Controllers\WatermarkController;
use App\Http\Controllers\SitemapXmlController;


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

// Auth


// Route::post('login', [AuthenticatedSessionController::class, 'store'])
//     ->name('login.store')
//     ->middleware('guest');

// Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->name('logout');

// Route::get('forgot-password', [AuthenticatedSessionController::class, 'forgotPassword'])
//     ->name('forgot-password')
//     ->middleware('guest');

// Route::get('forgot-password/{token}', [AuthenticatedSessionController::class, 'forgotPasswordValidate']);

// Route::post('forgot-password', [AuthenticatedSessionController::class, 'resetPassword'])
//     ->name('forgot-password')
//     ->middleware('guest');

// Route::put('forgot-password', [AuthenticatedSessionController::class, 'updatePassword'])
//     ->name('forgot-password')
//     ->middleware('guest');

// Route::get('email/{token}', [AuthenticatedSessionController::class, 'getEmail'])
//     ->name('email')
//     ->middleware('guest');
  

// Dashboard ->middleware('auth'); 

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('horizontal', [HorizontalController::class, 'index'])
    ->name('horizontal');

Route::get('vertical', [VerticalController::class, 'index'])
    ->name('vertical')
    ->middleware('guest');    

Route::get('watermark', [WatermarkController::class, 'index'])
    ->name('watermark')
    ->middleware('guest'); 

Route::get('/sitemap.xml', 'SitemapXmlController@index');


// Users
// Route::get('users', [UsersController::class, 'index'])
//     ->name('users')
//     ->middleware('guest');

// Route::get('get_users_json', [UsersController::class, 'getUsersJSON'])
//     ->name('users')
//     ->middleware('guest');    

// Route::get('users/create', [UsersController::class, 'create'])
//     ->name('users.create')
//     ->middleware('guest');

// Route::post('users', [UsersController::class, 'store'])
//     ->name('users.store')
//     ->middleware('guest');

// Route::get('users/{user}/edit', [UsersController::class, 'edit'])
//     ->name('users.edit')
//     ->middleware('guest');

// Route::put('users/{user}', [UsersController::class, 'update'])
//     ->name('users.update')
//     ->middleware('guest');

// Route::delete('users/{user}', [UsersController::class, 'remove'])
//     ->name('users.remove')
//     ->middleware('guest');


// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');


/* clear-cache */
Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "config is cleared";
});
    

Route::get('/migrate', function() {
    Artisan::call('migrate');
    return "Migrate is success";
});    