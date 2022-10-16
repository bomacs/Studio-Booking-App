<?php

use App\Models\Gallery;
use App\Models\Package;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PackageController;

;

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
// Home Page
Route::get('/', function () {
    return view('home', [
        'galleryImages' => Gallery::all(),
        'packages' => Package::all()
    ]);
})->name('home');

// Terms and condition
Route::get('policies', function() {
    return view('termsAndCondition');
})->name('termsAndConditions');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator','auth', 'verified']], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
});

// Photographer Only
Route::group(['prefix' => 'photographer', 'middleware' => ['role:photographer','auth', 'verified']], function () {
    Route::get('/profile/create',  [UserController::class, 'createProfile'])->name('createPhotographerProfile');
    Route::post('/profile/update',  [UserController::class, 'updateProfile'])->name('updatePhotographerProfile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('photographer.dashboard');
});

// User only
Route::group(['prefix' => 'user', 'middleware' =>['role:user','auth', 'verified']], function () {
    Route::get('/profile/create',  [UserController::class, 'createProfile'])->name('createUserProfile');
    Route::post('/profile/update',  [UserController::class, 'updateProfile'])->name('updateUserProfile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

// Photographer and user @auth
Route::group(['prefix' => 'photographer', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/profile', [UserController::class, 'indexProfile'])->name('photographer.profile');
});

// User and Photographer @auth
Route::group(['prefix' => 'user', 'middleware' =>['auth', 'verified']], function () {
    Route::get('/profile',  [UserController::class, 'indexProfile'])->name('user.profile');
});


// for admin
Route::get('gallery/create', [GalleryController::class, 'create'])->name('create.gallery');
Route::post('gallery/create', [GalleryController::class, 'store']);

Route::get('package/create', [PackageController::class, 'create'])->name('create.package');
Route::post('package/create', [PackageController::class, 'store']);


require __DIR__.'/auth.php';