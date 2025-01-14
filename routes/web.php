<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\avisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\paiementController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/contact', function () {
//     return view('front-end.contact');
// });
// Route::get('/home', function () {
//     return view('front-end.home');
// });


Route::post('paiement', [paiementController::class, 'index']);
Route::post('paiement/info', [paiementController::class, 'info']);

//// authentification ///
// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout')->middleware('auth');

/****   forget password  */
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get')->middleware('auth');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



////***form produit ***////

// Route::get('/product_Form', [produitContoller::class, 'createForm']);
// Route::post('/product_Form', [produitContoller::class, 'productForm']);


Route::get('image', [ImageUploadController::class, 'index']);
Route::post('upload', [ImageUploadController::class, 'upload']);


//**file */

Route::get('admin', [FileController::class, 'show'])->name('admin');

Route::post('admin/create', [FileController::class, 'create']);
Route::get('admin/edit', [FileController::class, 'edit'])->name('offre.edit');
Route::post('admin/update/{id}', [FileController::class, 'update']);


/** affichage des données  */
Route::get('home', [FileController::class, 'index'])->name('home')->middleware('auth'); 


/**contact route */
Route::get('contact', [ContactController::class, 'index']); 
Route::post('contact', [ContactController::class, 'create']); 
/**back end route */
Route::get('contact-show', [ContactController::class, 'show']);
Route::get('contact-show/{id}', [ContactController::class, 'destroy']);
/**crud client */
Route::get('client-show', [UserController::class, 'show'])->name('client-show');
Route::post('client-show/create', [UserController::class, 'store'])->name('client-show.create'); 
Route::post('client-show/{id}', [UserController::class, 'update'])->name('client-show.update'); 
Route::post('client-show/{id}', [UserController::class, 'update_user']); 
Route::get('client-show/delete/{id}', [UserController::class, 'destroy'])->name('client-show.delete');

/**avis route */
Route::get('avis/show', [avisController::class, 'show']); 
Route::post('/avis', [avisController::class, 'create']); 
/** end avis*/

/** avis back end */
Route::get('avis/delete/{id}', [avisController::class, 'destroy']);
/**end  */