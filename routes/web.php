<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('pages.index');
});

Auth::routes();

// admin middleware will go here
Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/users/admin/dashboard', 'admin\AdminController@index')->name('adminDashboard');
    Route::post('confirm_video_delete', 'admin\VideoController@confirmVideoDelete')->name('confirmVideoDelete');
    Route::resource('/admin/users', 'admin\UsersController');
Route::resource('/admin/videos', 'admin\VideoController');

});





Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/users/dashboard', 'users\UsersController@index')->name('usersdashboard');
    Route::resource('/users/account', 'users\UsersAccount');
    Route::resource('/user/videos/video', 'users\UserVideoController');
    Route::resource('/users/usersubscribed', 'users\SubscribeController');
    Route::post('congirmed_subscription', 'users\UserVideoController@confirm_subscription')->name('confirm_subscription');

});

