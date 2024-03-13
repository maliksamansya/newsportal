<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'FrontController@index')->name('home');
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/page/category/{slug}', [FrontController::class, 'pageCategory'])->name('page.category');
Route::get('/page/news/{slug}', [FrontController::class, 'pageNews'])->name('page.news');
Route::get('/page', [FrontController::class, 'pageArchive'])->name('page');
Route::get('/page/search', [FrontController::class, 'pageSearch'])->name('page.search');

// AUTHENTICATION 
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::post('/register',[RegisterController::class, 'registration'])->name('register');

// SOCIAL LOGIN
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// 404
Route::get('/nopermission', function(){ return back(); })->name('nopermission');

