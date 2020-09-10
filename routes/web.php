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

//Admin routes - admin
Route::get('/admin/dashboard', 'AdminsController@index')->name('admin.index')->middleware('is_admin');

//Post routes -admin
Route::post('/admin/dashboard/posts', 'PostController@store')->name('post.store')->middleware('is_admin');
Route::get('/admin/dashboard/posts/create', 'PostController@create')->name('post.create')->middleware('is_admin');
Route::get('/admin/dashboard/posts/view', 'PostController@index')->name('post.index')->middleware('is_admin');
Route::get('/admin/dashboard/posts/{post}/edit', 'PostController@edit')->name('post.edit')->middleware('is_admin');
Route::delete('/admin/dashboard/posts/{post}/delete', 'PostController@destroy')->name('post.destroy')->middleware('is_admin');
Route::patch('/admin/dashboard/posts/{post}/update', 'PostController@update')->name('post.update')->middleware('is_admin');

//User routes -admin
Route::put('/admin/dashboard/users/{user}/update', 'UserController@update')->name('user.update')->middleware('is_admin');
Route::get('/admin/dashboard/profile/{user}', 'UserController@show')->name('user.profile')->middleware('is_admin');
Route::get('admin/dashboard/users', 'UserController@index')->name('users.index')->middleware('is_admin');
Route::delete('/admin/dashboard/user/{user}/delete', 'USerController@destroy')->name('user.destroy')->middleware('is_admin');

//Normal, but authenticated user routes
Route::middleware('auth')->group(function()
    {
        Route::get('/profile/{user}/edit', 'UserController@showNormalUser')->name('user.show.detail.profile');
        Route::put('/profile/{user}/update', 'UserController@update')->name('user.profile.update');
        Route::put('/profile/{user}/changepassword', 'UserController@changePassword')->name('user.profile.changepassword');
        Route::get('/post/create', 'PostController@userCreate')->name('user.post.create');
        Route::post('/posts/posts', 'PostController@userStore')->name('user.post.store');
        Route::delete('/posts/destroyer/{post}/delete', 'PostController@Userdestroy')->name('user.post.destroy');
        Route::delete('/profile/{user}/delete', 'UserController@destroy')->name('user.destroy');
        Route::get('/ogloszenie/{post}/edit', 'PostController@userEditPost')->name('user.post.edit');
        Route::patch('/ogloszenie/{post}/update', 'PostController@update')->name('user.post.update');
    });

//Unauthenticated routes
Route::get('profile/{user}', 'UserController@normaluserprofile')->name('user.show.profile');