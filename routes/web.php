<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



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

 Route::get('home', [HomeController::class,'index']);

//=====================================================================================

 Route::prefix('admin')->group(function() {
  Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
 });

//=====================================================================================

//Route::post('/login/admin', [LoginController::class,'adminLogin']);

// Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
// Route::get('/login/blogger', [LoginController::class,'showBloggerLoginForm']);
// Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
// Route::get('/register/blogger', [RegisterController::class,'showBloggerRegisterForm']);

// Route::post('/login/admin', [LoginController::class,'adminLogin']);
// Route::post('/login/blogger', [LoginController::class,'bloggerLogin']);
// Route::post('/register/admin', [RegisterController::class,'createAdmin']);
// Route::post('/register/blogger', [RegisterController::class,'createBlogger']);

// Route::group(['middleware' => 'auth:blogger'], function () {
//     Route::view('/blogger', 'blogger');
// });

// Route::group(['middleware' => 'auth:admin'], function () {

//     Route::view('/admin', 'admin');
// });

// Route::get('logout', [LoginController::class,'logout']);










// Route::prefix('admin')->group(function() {
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::get('/', 'AdminController@index')->name('admin.dashboard');
//   });

// Route::prefix('admin')->group(function() {


//Route::resource('/users', [UserController::class, 'index']);




// Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
// Route::get('/login/blogger', [LoginController::class,'showBloggerLoginForm']);
// Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
// Route::get('/register/blogger', [RegisterController::class,'showBloggerRegisterForm']);

// Route::post('/login/admin', [LoginController::class,'adminLogin']);
// Route::post('/login/blogger', [LoginController::class,'bloggerLogin']);
// Route::post('/register/admin', [RegisterController::class,'createAdmin']);
// Route::post('/register/blogger', [RegisterController::class,'createBlogger']);

// Route::group(['middleware' => 'auth:blogger'], function () {
//     Route::view('/blogger', 'blogger');
// });

// Route::group(['middleware' => 'auth:admin'], function () {

//     Route::view('/admin', 'admin');
// });

//  Route::get('logout', [LoginController::class,'logout']);Auth::routes();



