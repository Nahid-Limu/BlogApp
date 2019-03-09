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
Route::get('/viewPost/{id}', 'HomeController@viewPost')->name('viewPost');

//admin
Route::get('/login', 'AdminController@login');
Route::get('/admin', 'AdminController@viewDashboard');
Route::get('/post', 'AdminController@viewPost');
Route::post('/addPost', 'AdminController@addPost')->name('addPost');
