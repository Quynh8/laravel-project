<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');

route::get('/dashboard','DashboardController@show')->middleware('verified')->middleware('auth');
route::get('/admin','DashboardController@show')->middleware('verified')->middleware('auth');



Route::middleware('auth')->group(function(){
    /////
    route::get('admin/user/list','AdminUserController@list');
    route::get('admin/user/add','AdminUserController@add');

    route::post('admin/user/store', 'AdminUserController@store');

    route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');

    route::get('admin/user/action','AdminUserController@action');

    route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user_edit');

    route::post('admin/user/update/{id}', 'AdminUserController@update')->name('user_update');


});
