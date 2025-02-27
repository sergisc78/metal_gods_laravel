<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetalGodsController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


                                 /* ADMIN ROUTES */
Route::get('/admin/dashboard',[AdminController::class,'index']);


/*GENRES*/
Route::get('/admin/genres/add-genre',[AdminController::class,'addGenreForm']);
Route::post('/admin/addGenre',[AdminController::class,'addGenre']);
Route::get('/admin/genres',[AdminController::class,'getGenres']);
Route::get('/admin/genres/edit-genre/{id}',[AdminController::class,'getGenreById']);
Route::post('admin/genres/edit-genre/{id}',[AdminController::class,'editGenre']);
Route::get('/admin/genres/{id}', [AdminController::class, 'deleteGenre']);

/* BANDS*/
Route::get('/admin/bands/add-band',[AdminController::class,'addBandForm']);
Route::post('/admin/addBand',[AdminController::class,'addBand']);
Route::get('/admin/bands',[AdminController::class,'getBands']);
Route::get('/admin/bands/edit-band/{id}',[AdminController::class,'getBandById']);
Route::post('/admin/bands/edit-band/{id}',[AdminController::class,'editBand']);
Route::get('/admin/bands/{id}', [AdminController::class, 'deleteBand']);

/*REVIEWS*/
Route::get('/admin/reviews/add-review',[AdminController::class,'addReviewForm']);
Route::post('/admin/addReview',[AdminController::class,'addReview']);
Route::get('/admin/reviews',[AdminController::class,'getReviews']);
Route::get('/admin/reviews/view-edit-review/{id}',[AdminController::class,'getReviewById']);
Route::post('/admin/reviews/view-edit-review/{id}',[AdminController::class,'editReview']);
Route::get('/admin/reviews/{id}', [AdminController::class, 'deleteReview']);

/*USERS*/
Route::get('/admin/users',[AdminController::class,'getUsers']);
Route::get('/admin/users/edit-role/{id}',[AdminController::class,'getUserById']);
Route::post('/admin/users/edit-role/{id}',[AdminController::class,'editUserRole']);
Route::get('/admin/users/{id}', [AdminController::class, 'deleteUser']);

/*REPORTS*/
Route::get('/admin/reports',[AdminController::class,'getReports']);


                                 /* USER ROUTES */

/*REVIEWS*/
Route::get('/user/reviews/add-review',[UserController::class,'addReviewForm']); 
Route::post('/user/addReview',[UserController::class,'addReview']);
Route::get('/user/reviews/',[UserController::class,'getReviews']);
Route::get('/user/reviews/view_review/{id}/{band}/{album}',[UserController::class,'getReviewById']);
Route::get('/user/reviews/your-reviews',[UserController::class,'getYourReviews']);
Route::get('/user/reviews/your-reviews/view-edit-your-review/{id}',[UserController::class,'getYourReviewById']);
Route::post('user/reviews/your-reviews/view-edit-your-review/{id}',[UserController::class,'editYourReview']);
Route::get('/user/reviews/your-reviews/{id}',[UserController::class,'deleteYourReview']);

Route::get('/user/report-an-error',[UserController::class,'sendErrorForm']);
Route::post('/user/report-an-error',[UserController::class,'sendError']);

/*BANDS*/
Route::get('/user/bands/add-band',[UserController::class,'addBandForm']);
Route::post('/user/addBand',[UserController::class,'addBand']);
Route::get('/user/bands',[UserController::class,'getBands']);

/*GENRES*/
Route::get('/user/genres/add-genre',[UserController::class,'addGenreForm']);
Route::post('/user/addGenre',[UserController::class,'addGenre']);
Route::get('/user/genres',[UserController::class,'getGenres']);



                               /*HOME*/
Route::get('/reviews',[MetalGodsController::class,'getReviews']);
Route::get('/reviews/review/{id}/{band}/{album}',[MetalGodsController::class,'getReviewById']);
Route::get('/bands',[MetalGodsController::class,'getBands']);
Route::get('/bands/discography/{id}/{band}',[MetalGodsController::class,'getBandById']);
Route::get('/bands/discography/album/{band}/{album}',[MetalGodsController::class,'getAlbumByTitle']);
Route::get('/bands/discography/review/{id}/{album}',[MetalGodsController::class,'getReviewsById']);
Route::get('/report-an-error',[MetalGodsController::class,'sendErrorForm']);
Route::post('/report-an-error',[MetalGodsController::class,'sendError']); 
Route::get('/aboutUs',[MetalGodsController::class,'getAboutUs']);
Route::get('/contact',[MetalGodsController::class,'getContact']); 
                 

require __DIR__.'/auth.php';
