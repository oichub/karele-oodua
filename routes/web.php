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
    Route::resource('/admin/users', 'admin\UsersController');
Route::resource('/admin/videos', 'admin\VideoController');

});





Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/users/dashboard', 'users\UsersController@index')->name('usersdashboard');

});

