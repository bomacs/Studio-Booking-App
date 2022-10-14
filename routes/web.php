<?php

use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Gallery;

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
        'galleryImages' => Gallery::all()
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
// Photographer
Route::group(['prefix' => 'photographer', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('photographer.profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('photographer.dashboard');
});

// User
Route::group(['prefix' => 'user', 'middleware' =>['auth', 'verified']], function () {
    Route::get('/profile',  [ProfileController::class, 'show'])->name('user.profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});


// for admin
Route::get('gallery/create', [GalleryController::class, 'create'])->name('create.gallery');
Route::post('gallery/create', [GalleryController::class, 'store']);


require __DIR__.'/auth.php';