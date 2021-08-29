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

// Route::get('/', function () {
//     return view('pages.index');
// })->name('home');
Route::get('/', 'PagesController@index')->name('home');
Auth::routes();

Auth::routes(['verify' => true]);

// admin middleware will go here
Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/users/admin/dashboard', 'admin\AdminController@index')->name('adminDashboard');
    Route::get('users/admin/admin_management', 'admin\AdminController@adminmanagement')->name('adminsmanagement');
    Route::post('users/admin/addadmin', 'admin\AdminController@addadmin')->name('add.admin');
    Route::put('users/admin/updateadmin', 'admin\AdminController@updateadmin')->name('update.admin');
    Route::delete('users/admin/deleteadmin', 'admin\AdminController@deleteadmin')->name('delete.admin');
    Route::resource('/users/admin/events', 'admin\AdminUpcomingEvent');
    Route::post('confirm_video_delete', 'admin\VideoController@confirmVideoDelete')->name('confirmVideoDelete');
    Route::resource('/admin/users', 'admin\UsersController');
    Route::resource('/admin/videos', 'admin\VideoController');
    Route::get('/users/admin/change_password', 'admin\AdminController@gotochangepassword')->name('admins_change_password');
    Route::put('admin_change_password', 'users\UsersController@changepassword')->name('admin_change_password');
});

Route::group(['middleware' => ['auth', 'user', 'verified']], function () {
    //Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/users/dashboard', 'users\UsersController@index')->name('usersdashboard');
    Route::get('/users/user/makepayment', 'users\UserPaymentController@makepayment');
    Route::post('/users/user/verify-payment', 'users\UserPaymentController@verifypayment');
    Route::resource('/users/user', 'users\UsersController');
    Route::resource('/users/account', 'users\UsersAccount');
    Route::resource('/user/videos/previousvideos', 'users\UserVideoController');    
    Route::resource('/users/usersubscribed', 'users\SubscribeController');
    Route::get('/subscibed/video/{userid}/{videoid}/{subid}/{video}', 'users\SubscribeController@subscriber')->name('subscribed_videos');
    Route::get('/users/change_password', 'users\UsersController@gotochangepassword')->name('change_password');
    Route::put('user_change_password', 'users\UsersController@changepassword')->name('user_change_password');
    Route::post('congirmed_subscription', 'users\UserVideoController@confirm_subscription')->name('confirm_subscription');

});

