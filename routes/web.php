<?php

use App\Http\Controllers\admin\AdminBookingPaymentController;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Package;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ManagePackageController;
use App\Http\Controllers\admin\ManageUsersController;
use App\Http\Controllers\admin\ManageClientController;
use App\Http\Controllers\admin\ManagePhotographerController;
use App\Http\Controllers\PhotographerBookingController;

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
        'galleryImages' => Gallery::paginate(6),
        'photographers' => User::whereRoleIs('photographer')->paginate(3),
        'packages' => Package::paginate(3),
    ]);
})->name('home');

// Terms and condition
Route::get('policies', function() {
    return view('termsAndCondition');
})->name('termsAndConditions');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator','auth', 'verified']], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('create.gallery');
    Route::post('gallery/create', [GalleryController::class, 'store']);
    Route::get('/tables', [TableController::class, 'index'])->name('tables');
    // booking
    Route::get('/booking/{id}', [BookingController::class, 'showBooking'])->where('id', '[0-9]+')->name('booking.show');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->where('id', '[0-9]+')->name('booking.delete');
    Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])->where('id', '[0-9]+')->name('booking.edit');
    Route::post('/booking/edit/{id}', [BookingController::class, 'update'])->where('id', '[0-9]+')->name('booking.update');
    // payment
    Route::get('/payment/{id}', [AdminBookingPaymentController::class, 'show'])->where('id', '[0-9]+')->name('payment.show');
    Route::get('/payment/{id}/edit', [AdminBookingPaymentController::class, 'edit'])->where('id', '[0-9]+')->name('payment.edit');
    Route::put('/payment/{id}/edit', [AdminBookingPaymentController::class, 'update'])->where('id', '[0-9]+')->name('payment.update');
    Route::delete('/payment/{id}', [AdminBookingPaymentController::class, 'destroy'])->where('id', '[0-9]+')->name('payment.delete');
    // user
    Route::get('users/create', [ManageUsersController::class, 'create'])->name('create.user');
    Route::post('users/create', [ManageUsersController::class, 'store']);
    Route::get('/profile/{id}' , [ManageUsersController::class, 'show'])->where('id', '[0-9]+')->name('user.show');
    Route::get('/profile/{id}/edit' , [ManageUsersController::class, 'edit'])->where('id', '[0-9]+')->name('user.edit');
    Route::put('/profile/{id}/edit' , [ManageUsersController::class, 'update'])->where('id', '[0-9]+')->name('user.update');
    Route::delete('/profile/{id}/delete' , [ManageUsersController::class, 'destroy'])->where('id', '[0-9]+')->name('user.delete');
    // client
    Route::get('clients/create', [ManageClientController::class, 'create'])->name('create.client');
    Route::post('clients/create', [ManageClientController::class, 'store'])->name('store.client'); 
    // package
    Route::get('package/create', [ManagePackageController::class, 'create'])->name('create.package');
    Route::post('package/create', [ManagePackageController::class, 'store'])->name('store.package');
    Route::get('package/{id}', [ManagePackageController::class, 'show'])->name('show.package');
    Route::get('package/{id}/edit', [ManagePackageController::class, 'edit'])->name('edit.package');
    Route::put('package/{id}/edit', [ManagePackageController::class, 'update'])->name('update.package');
    Route::delete('package/{id}/delete', [ManagePackageController::class, 'destroy'])->name('delete.package');
    // photographer
    Route::get('photographers/create', [ManagePhotographerController::class, 'create'])->name('create.photographer');
    Route::post('photographers/create', [ManagePhotographerController::class, 'store'])->name('store.photographer'); 

}); 

// Photographer Only
Route::group(['prefix' => 'photographer', 'middleware' => ['role:photographer','auth', 'verified']], function () {
    Route::get('/profile/create',  [UserController::class, 'createProfile'])->name('createPhotographerProfile');
    Route::post('/profile/create',  [UserController::class, 'updateProfile']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('photographer.dashboard');
    // Bookings route
    Route::get('/bookings', [PhotographerBookingController::class, 'index'])->name('photographer.bookings');
    Route::post('/bookings', [PhotographerBookingController::class, 'update']);
    Route::get('/bookings/cancel', [PhotographerBookingController::class, 'index'])->name('photographer.bookings.cancel');
    Route::post('/bookings/cancel', [PhotographerBookingController::class, 'cancel']);
});

// User only
Route::group(['prefix' => 'user', 'middleware' =>['role:user','auth', 'verified']], function () {
    Route::get('/profile/create',  [UserController::class, 'createProfile'])->name('createUserProfile');
    Route::post('/profile/create',  [UserController::class, 'updateProfile']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    // Bookings Route
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('create.booking');
    Route::post('/bookings/create', [BookingController::class, 'store']);
    Route::get('/my_bookings', [BookingController::class, 'showUserBookings'])->name('my_bookings');
    Route::post('/my_bookings', [BookingController::class, 'cancel']);
    Route::get('/package/{id}/book', [BookingController::class, 'bookPackage'])->name('book.package');
    Route::post('/package/{id}/book', [BookingController::class, 'store']);
});

// No need to prefix
Route::group(['middleware' =>['role:user','auth', 'verified']], function () {
    Route::get('/photographer/{id}/create', [BookingController::class, 'bookPhotographer'])->name('book.photographer');
    Route::post('/photographer/{id}/create', [BookingController::class, 'store']);
});

// common route
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/profile', [UserController::class, 'indexProfile'])->name('photographer.profile');
    Route::get('/profile/{id}' , [UserController::class, 'showProfile'])->where('id', '[0-9]+')->name('profile.show');
});

// User and Photographer @auth
Route::group(['prefix' => 'user', 'middleware' =>['auth', 'verified']], function () {
    Route::get('/profile',  [UserController::class, 'indexProfile'])->name('user.profile');
});



require __DIR__.'/auth.php';