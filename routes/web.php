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
//     return view('welcome');
// });
// ---------------------------------USER------------------------------
Route::get('/', 'UserViewController@home')->name('home');
Route::get('/viewPost/{id}', 'UserViewController@viewPost')->name('viewPost');

Route::get('/UpComingevents', 'UserViewController@event')->name('UpComingevents');
Route::get('/gallery', 'UserViewController@imageGallery')->name('gallery');
Route::get('/about', 'UserViewController@about')->name('about');

Route::get('/contuct', 'SendEmailController@contuct')->name('contuct');
Route::post('/contuct/sendmail', 'SendEmailController@sendmail')->name('sendmail');

//Route::get('/admin', 'AdminController@viewDashboard')->name('dashboard');


Auth::routes();
/* Logout route start */
Route::get('/logout', 'Auth\LoginController@logout');
/* Logout route end */
Route::group(['middleware'=>'auth'], function () {

    //Route::get('/home', 'HomeController@index')->name('home');

    //dashboard
    Route::get('/admin', 'AdminController@viewDashboard')->name('dashboard');
    Route::post('/changePassword','AdminController@change_password')->name('change_password');
    Route::post('/changePhoto','AdminController@update_photo')->name('update_photo');
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

    //Moto
    Route::get('admin/ViewMoto', 'PostController@viewMoto')->name('moto');
    Route::post('admin/moto', 'PostController@addMoto')->name('addMoto');
    
});


