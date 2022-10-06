<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
>>>>>>> eeda7eb (Update CRUD)

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

<<<<<<< HEAD
Route::get('/home', function() {
=======
Route::get('/home', function () {
>>>>>>> eeda7eb (Update CRUD)
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
<<<<<<< HEAD
=======

Route::resource('about', 'App\Http\Controllers\AboutController');
Route::resource('post', 'App\Http\Controllers\PostController');
Route::resource('education', 'App\Http\Controllers\EducationController');
Route::resource('experience', 'App\Http\Controllers\ExperienceController');
Route::resource('socialmedia', 'App\Http\Controllers\SocialmediaController');


Route::resource('products', ProductController::class);
>>>>>>> eeda7eb (Update CRUD)
