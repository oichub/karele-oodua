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

 //  Paystack
Route::post('/pay', 'Paystack\PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'Paystack\PaymentController@handleGatewayCallback');




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
    Route::get('users/admin/subscription-plans', 'admin\PlanController@addplan')->name('plan.add');
    Route::any('users/admin/store-plans', 'admin\PlanController@store')->name('adminplan.store');
    Route::put('users/admin/update-plans', 'admin\PlanController@update')->name('adminplan.update');
    Route::delete('users/admin/delete-plans', 'admin\PlanController@delete')->name('adminplan.delete');
    Route::resource('/users/admin/events', 'admin\AdminUpcomingEvent');
    Route::post('confirm_video_delete', 'admin\VideoController@confirmVideoDelete')->name('confirmVideoDelete');
    Route::resource('/admin/users', 'admin\UsersController');
      Route::get('/admin/videos/upload', 'admin\VideoController@uploadvideo')->name('adminvideo.upload');
      Route::post('/admin/videos/save', 'admin\VideoController@store')->name('uploadvideo');
    Route::get('/admin/live-video', 'admin\VideoController@livevideo')->name('adminvideo.live');
    Route::get('/users/admin/change_password', 'admin\AdminController@gotochangepassword')->name('admins_change_password');
    Route::put('admin_change_password', 'users\UsersController@changepassword')->name('admin_change_password');
});
Route::group(['middleware' => ['auth', 'user', 'verified']], function () {
    //Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/users/dashboard', 'users\UsersController@index')->name('usersdashboard');
    Route::resource('/users/user', 'users\UsersController');
    Route::resource('/users/account', 'users\UsersAccount');
    Route::resource('/user/videos/video', 'users\UserVideoController');
    Route::resource('/users/usersubscribed', 'users\SubscribeController');
    Route::get('/subscibed/video/{userid}/{videoid}/{subid}/{video}', 'users\SubscribeController@subscriber')->name('subscribed_videos');
    Route::get('/users/change_password', 'users\UsersController@gotochangepassword')->name('change_password');
    Route::put('user_change_password', 'users\UsersController@changepassword')->name('user_change_password');
    Route::post('congirmed_subscription', 'users\UserVideoController@confirm_subscription')->name('confirm_subscription');

});

