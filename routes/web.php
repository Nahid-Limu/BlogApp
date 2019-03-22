<?php

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
//     return view('home');
// });

//user
Route::get('/', 'HomeController@home')->name('home');
Route::get('/viewPost/{id}', 'HomeController@viewPost')->name('viewPost');

//admin login
Route::get('/admin', 'AdminController@login');

Route::post('/login', 'AdminController@login_check')->name('login');
Route::get('/logout', 'AdminController@logout')->name('logout');

Route::get('/dashboard', 'AdminController@viewDashboard')->name('dashboard');

//add post
Route::get('/post', 'AdminController@viewPost');
Route::post('/addPost', 'AdminController@addPost')->name('addPost');
Route::get('/adminViewPost', 'AdminController@adminViewPost')->name('adminViewPost');
Route::get('/editPost/{id}', 'AdminController@editPost')->name('editPost');
Route::get('/deletePost/{id}', 'AdminController@deletePost')->name('deletePost');
Route::post('/updatePost/{id}', 'AdminController@updatePost')->name('updatePost');

//image galary
Route::get('imageGallery', 'AdminController@imageGallery');
Route::post('image/upload/store','AdminController@fileStore');
Route::post('image/delete','AdminController@fileDestroy');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
