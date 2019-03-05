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
Route::get('/', 'HomeController@home');

//admin
Route::get('/admin', 'AdminController@viewDashboard');
Route::get('/post', 'AdminController@viewPost');
Route::post('/addPost', 'AdminController@addPost')->name('addPost');