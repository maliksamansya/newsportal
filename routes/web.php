<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UsersController;
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
Route::get('/', [FrontController::class, 'index'])->name('home'); // udah
Route::get('/page/category/{slug}', [FrontController::class, 'pageCategory'])->name('page.category');
Route::get('/partial/category/{slug}', [FrontController::class, 'showCategoryPartial'])->name('partial.category'); 
Route::get('/page/news/{slug}', [FrontController::class, 'pageNews'])->name('page.news'); // udah
Route::get('/page', [FrontController::class, 'pageArchive'])->name('page');
Route::get('/page/search', [FrontController::class, 'pageSearch'])->name('page.search');
Route::get('/about', [FrontController::class, 'about'])->name('page.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('page.contact');
Route::get('/category', [FrontController::class, 'category'])->name('page.category');



// AUTHENTICATION 
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::post('/register',[RegisterController::class, 'registration'])->name('register');

// SOCIAL LOGIN
Route::get('login/google',[AuthLoginController::class, 'redirectToProvider'])->name('login.google');
Route::get('login/google/callback',[AuthLoginController::class, 'handleProviderCallback']);

// 404
Route::get('/nopermission', function(){ return back(); })->name('nopermission');


// ONLY ADMIN
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => ['auth','roles'], 'roles' => ['admin']], function(){

    Route::resource('users','App\Http\Controllers\UsersController');

    Route::resource('settings','App\Http\Controllers\SettingController')->only(['index','store']);
    Route::get('settings/breakingnews',[SettingController::class, 'breakingNews'])->name('settings.breakingnews');
    Route::post('settings/breakingnews/store',[SettingController::class, 'storeBreakingNews'])->name('settings.breakingnews.store');

    Route::resource('advertisements','App\Http\Controllers\AdvertisementController')->only(['index','store']);

    Route::resource('menus','App\Http\Controllers\MenuController');
    Route::post('menuitems-json',[MenuController::class, 'getMenuItems'])->name('menuitems.json');
    Route::post('menuitemsdetails-json',[MenuController::class, 'getMenuItemsDetails'])->name('menuitemsdetails.json');
    
});

// BOTH EDITOR AND ADMIN
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','roles'],'roles'=>['editor','admin']], function(){
    Route::resource('category','App\Http\Controllers\CategoryController');
    Route::resource('news','App\Http\Controllers\NewsController');
});

// USER, EDITOR AND ADMIN
Route::group(['middleware'=>['auth','roles'],'roles'=>['user','editor','admin']], function(){

    Route::get('/dashboard', function(){ return view('backend.dashboard'); })->name('dashboard');

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile',[ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('changepassword',[ProfileController::class, 'changePassword'])->name('profile.changepassword');
});

