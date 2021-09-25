<?php
namespace App;

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
    Route::get('users/admin/subscription-plans', 'admin\PlanController@addplan')->name('plan.add');
    Route::any('users/admin/store-plans', 'admin\PlanController@store')->name('adminplan.store');
    Route::put('users/admin/update-plans', 'admin\PlanController@update')->name('adminplan.update');
    Route::delete('users/admin/delete-plans', 'admin\PlanController@delete')->name('adminplan.delete');
    Route::post('/users/admin/events', 'admin\AdminUpcomingEvent@store')->name('events.store');
    Route::get('/users/admin/create-event', 'admin\AdminUpcomingEvent@create')->name('events.create');
    Route::get('/users/admin/events', 'admin\AdminUpcomingEvent@index')->name('events.index');
    Route::put('/users/admin/events-update', 'admin\AdminUpcomingEvent@update')->name('events.update');
    Route::delete('/users/admin/events-delete', 'admin\AdminUpcomingEvent@destroy')->name('events.delete');
    Route::resource('/users/admin/events', 'admin\AdminUpcomingEvent');
    Route::post('confirm_video_delete', 'admin\VideoController@confirmVideoDelete')->name('confirmVideoDelete');
    Route::resource('/admin/users', 'admin\UsersController');
    Route::get('/admin/videos/upload', 'admin\VideoController@uploadvideo')->name('adminvideo.upload');      
    Route::post('/admin/videos/save', 'admin\VideoController@store')->name('uploadvideo');
    Route::get('/admin/videos', 'admin\VideoController@index')->name('adminvideo.index');
    Route::put('/admin/videos-update{id}', 'admin\VideoController@update')->name('adminvideo.update');
    Route::get('/admin/live-video', 'admin\VideoController@livevideo')->name('adminvideo.live');
    Route::get('/users/admin/change_password', 'admin\AdminController@gotochangepassword')->name('admins_change_password');
    Route::put('admin_change_password', 'users\UsersController@changepassword')->name('admin_change_password');
    Route::get('users/admin/users/pending', 'admin\UsersController@pending')->name('users.pending');
    
});

Route::group(['middleware' => ['auth', 'user', 'verified']], function () {
    //Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/users/dashboard', 'users\UsersController@index')->name('usersdashboard');
    Route::get('/users/profile', 'users\UsersController@profile')->name('usersprofile');
    Route::get('/users/user/subscribe', 'users\UsersController@subscription')->name('subscribe');
    Route::post('/users/user/subscribed', 'users\UsersController@subscribe')->name('subscribe.now');
    Route::get('/users/user/makepayment', 'users\UserPaymentController@makepayment');
    Route::post('/users/user/verify-payment', 'users\UserPaymentController@verifypayment');
    Route::post('/users/user/payment', 'users\PayPalController@payment')->name('payment');
    Route::get('/users/user/cancel', 'users\PayPalController@cancel')->name('payment.cancel');
    Route::get('/users/user/payment/success', 'users\PayPalController@success')->name('payment.success');
    Route::resource('/users/user', 'users\UsersController');
    Route::resource('/users/account', 'users\UsersAccount');
    Route::resource('/user/videos/previousvideos', 'users\UserVideoController');   
    // Route::get('/users/videos/livevideo', 'users\UserVideoController@livevideo')->name('livevideos');
    Route::get('/users/change_password', 'users\UsersController@gotochangepassword')->name('change_password');
    Route::put('user_change_password', 'users\UsersController@changepassword')->name('user_change_password');
    Route::post('/users/user/confirm_subscription', 'users\UserVideoController@confirm_subscription')->name('confirm_subscription');
    // 
});

