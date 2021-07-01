<?php

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

Route::get('/','siteController@create_order')->name('create.orders')->middleware('adprevent');
Route::post('/store-order','siteController@store_order')->name('store.order')->middleware('adprevent');
Route::post('/refresh-order','siteController@refresh')->name('refresh.order')->middleware('deprevent');

Route::get('/show-order','siteController@show_all_order')->name('show.orders')->middleware('adprevent');
Route::get('/show-department-order','siteController@show_department_order')->name('show.department.orders')->middleware('deprevent');
Route::get('/admin-dashboard','siteController@dashboard')->name('dashboard')->middleware('adprevent');
Route::get('/department-dashboard','siteController@deptdashboard')->name('department.dashboard')->middleware('deprevent');

Route::get('/edit-order/{id}','siteController@edit_order')->name('edit_order')->middleware('adprevent');
Route::post('/update-order/{id}','siteController@update_order')->name('update_order')->middleware('adprevent');

Route::get('/delete-order/{id}','siteController@delete_order')->name('delete_order')->middleware('adprevent');
Route::get('/print-order/{id}','siteController@print_order')->name('print_order')->middleware('deprevent');
Route::get('/put-technicians/{id}','siteController@put_techni')->name('put.techni')->middleware('deprevent');
Route::post('/store-techni/{id}','siteController@store_techni')->name('store.techni')->middleware('deprevent');
Route::get('/create-technicians','siteController@create_technicians')->name('create.techni')->middleware('deprevent');
Route::post('/store-technicians','siteController@store_technicians')->name('store.technicians')->middleware('deprevent');
Route::get('/login','siteController@login')->name('login');
Route::post('/signin','siteController@signin')->name('signin');
Route::get('/signup','siteController@signup')->name('signup');
Route::post('/create','siteController@createuser')->name('createuser');
Route::post('/checked','siteController@checked')->name('checked');
Route::post('/resprint','siteController@resprint')->name('resprint');
Route::get('/logout','siteController@logout')->name('logout');
