<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\PostAjaxController;


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

// Admin Routes
Route::get('admin-login', [adminController::class, 'adminLogin'])->name('admin-login');
Route::get('admin-register', [adminController::class, 'adminRegister'])->name('admin-register');
Route::post('admin-register', [adminController::class, 'adminSignup'])->name('admin-register');
Route::post('login-submit', [adminController::class, 'loginSubmit'])->name('login-submit');
Route::get('dashboard', [adminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('admin-logout', [adminController::class, 'adminLogout'])->name('admin-logout')->middleware('auth');
Route::get('category', [adminController::class, 'category'])->name('category')->middleware('auth');
Route::post('add-category', [adminController::class, 'addCategory'])->name('add-category')->middleware('auth');

Route::resource('ajaxposts', PostAjaxController::class);


// Soulaca Routes
Route::get('add-aboutus-content', [adminController::class, 'addAboutus'])->name('add-aboutus-content')->middleware('auth');
Route::get('delete-aboutus', [adminController::class, 'deleteAboutus'])->name('delete-aboutus')->middleware('auth');
Route::post('add-aboutus-content', [adminController::class, 'saveAboutus'])->name('add-aboutus-content')->middleware('auth');
Route::get('view-aboutus-content', [adminController::class, 'viewAboutus'])->name('view-aboutus-content')->middleware('auth');




