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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ogloszenie/{post}', 'PostController@show')->name('post');

//Admin routes
Route::get('/admin/dashboard', 'AdminsController@index')->name('admin.index')->middleware('is_admin');
Route::post('/admin/dashboard/posts', 'PostController@store')->name('post.store')->middleware('is_admin');
Route::get('/admin/dashboard/posts/create', 'PostController@create')->name('post.create')->middleware('is_admin');
Route::get('/admin/dashboard/posts/view', 'PostController@index')->name('post.index')->middleware('is_admin');
Route::delete('/admin/dashboard/posts/{post}/delete', 'PostController@destroy')->name('post.destroy')->middleware('is_admin');
Route::get('/admin/dashboard/posts/{post}/edit', 'PostController@edit')->name('post.edit')->middleware('is_admin');
Route::patch('/admin/dashboard/posts/{post}/update', 'PostController@update')->name('post.update')->middleware('is_admin');