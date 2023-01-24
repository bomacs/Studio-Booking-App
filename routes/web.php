<?php

use App\Models\Hero;
use App\Models\User;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Package;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ManageHeroController;
use App\Http\Controllers\admin\ManageImageController;
use App\Http\Controllers\admin\ManageUsersController;
use App\Http\Controllers\admin\ManageVideoController;
use App\Http\Controllers\admin\ManageClientController;
use App\Http\Controllers\admin\ManagePackageController;
use App\Http\Controllers\PhotographerBookingController;
use App\Http\Controllers\admin\ManageTestimonialController;
use App\Http\Controllers\admin\ManagePhotographerController;
use App\Http\Controllers\admin\AdminBookingPaymentController;

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
        'galleryImages' => DB::table('images')->limit(6)->get(),
        'galleryVideos' => DB::table('videos')->limit(4)->get(),
        'photographers' => User::whereRoleIs('photographer')->limit(3)->get(),
        'packages' => Package::limit(3)->get(),
        'comments' => Comment::with('user.userprofile')->limit(3)->get(),
        'heros' => Hero::all(),
    ]);
})->name('home');

// Terms and condition
Route::get('policies', function() {
    return view('termsAndCondition');
})->name('termsAndConditions');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator','auth', 'verified']], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
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
    // hero 
    Route::get('heros/create', [ManageHeroController::class, 'create'])->name('heros.create');
    Route::post('/heros', [ManageHeroController::class, 'store'])->name('heros.store');
    // testimonial
    Route::get('/testimonial/{comment}', [ManageTestimonialController::class, 'show'])->name('testimonial.show');
    Route::delete('testimonial/{id}/delete', [ManageTestimonialController::class, 'destroy'])->name('testimonial.destroy');
    // Images
    Route::get('/images/{image}', [ManageImageController::class, 'show'])->name('image.show');
    Route::delete('images/{image}/delete',[ManageImageController::class, 'destroy'])->name('image.destroy');
    // Videos
    Route::get('/videos/{video}', [ManageVideoController::class, 'show'])->name('video.show');
    Route::delete('/videos/{video}/delete', [ManageVideoController::class, 'destroy'])->name('video.destroy');
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
    // Gallery/Images route
    Route::get('gallery/create', [ImageController::class, 'create'])->name('gallery.create');
    Route::post('gallery/create', [ImageController::class, 'store'])->name('gallery.store');
    // Video route
    Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('video/store', [videoController::class, 'store'])->name('video.store');
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

// Gallery Route
Route::get('/gallery/images', [ImageController::class, 'index'])->name('gallery.index');
Route::get('/gallery/videos', [VideoController::class, 'index'])->name('videoGallery.index');

// Testimonial/Comment Route
Route::post('/', [CommentController::class, 'store'])->name('comment.store');
Route::get('/testimonials', [CommentController::class, 'index'])->name('comment.index');

// Packages Route
Route::get('/packages', [PackageController::class, 'index'])->name('package.index');

// Photographers Route
Route::get('/photographers', [PhotographerController::class, 'index'])->name('photographer.index');

require __DIR__.'/auth.php';