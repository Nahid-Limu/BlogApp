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

// Route::get('/js', function () {
//     return view('home');
// });
Route::get('/test', 'HomeController@test');

// ---------------------------------USER------------------------------
Route::get('/', 'HomeController@home')->name('home');
Route::get('/viewPost/{id}', 'HomeController@viewPost')->name('viewPost');

Route::get('/UpComingevents', 'HomeController@event')->name('UpComingevents');
Route::get('/gallery', 'HomeController@imageGallery')->name('gallery');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/contuct', 'SendEmailController@contuct')->name('contuct');
Route::post('/contuct/sendmail', 'SendEmailController@sendmail')->name('sendmail');

// ---------------------------------ADMIN------------------------------
//admin login
Route::get('/admin', 'AdminController@login');
Route::post('/login', 'AdminController@login_check')->name('login');
Route::get('/logout', 'AdminController@logout')->name('logout');

//dashboard
Route::get('/dashboard', 'AdminController@viewDashboard')->name('dashboard');

//add post
Route::get('/post/add', 'PostController@viewPost')->name('post');
Route::post('/addPost', 'PostController@addPost')->name('addPost');
Route::get('/admin/ViewPost', 'PostController@adminViewPost')->name('adminViewPost');
Route::get('/admin/editPost/{id}', 'PostController@editPost')->name('editPost');
Route::get('/admin/deletePost/{id}', 'PostController@deletePost')->name('deletePost');
Route::post('/admin/updatePost/{id}', 'PostController@updatePost')->name('updatePost');


//image galary
Route::get('imageGallery', 'ImageGalleryController@imageGallery')->name('imageGallery');
Route::post('image/upload/store','ImageGalleryController@fileStore');
Route::post('image/delete','ImageGalleryController@fileDestroy');

Route::get('/adminViewGallery', 'ImageGalleryController@adminViewGallery')->name('adminViewGallery');
Route::get('/deleteGalleryImage/{id}', 'ImageGalleryController@deleteGalleryImage')->name('deleteGalleryImage');

//event
Route::get('/event/add', 'EventController@viewEvent')->name('event');
Route::post('/addEvent', 'EventController@addEvent')->name('addEvent');
Route::get('/admin/ViewEvent', 'EventController@adminViewEvent')->name('adminViewEvent');
Route::get('/admin/editEvent/{id}', 'EventController@editEvent')->name('editEvent');
Route::get('/admin/deleteEvent/{id}', 'EventController@deleteEvent')->name('deleteEvent');
Route::post('/admin/updateEvent/{id}', 'EventController@updateEvent')->name('updateEvent');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
