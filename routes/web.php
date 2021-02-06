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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/content/formbuku', 'PostController@create');
Route::post('/home/content', 'PostController@store');
Route::get('/home/content', 'PostController@index');
Route::get('/content/{id}', 'PostController@show');
Route::get('/content/{id}/edit', 'PostController@edit');
Route::put('/content/{id}', 'PostController@update');
Route::delete('/home/content/{id}', 'PostController@destroy');

// Route::get('/upload', 'UploadController@upload');
// Route::post('/upload', 'UploadController@proses_upload');


// Autentikasi
Route::get('/login', 'PageController@getLoginPage')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postLogin')->middleware('guest');

Route::get('/register', 'PageController@getRegisterPage')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@postRegister')->middleware('guest');

Route::get('/home', function(){
    return view('partials.landpage');
})->name('home')->middleware('auth');

Route::get('/logout', 'AuthController@logout')->name('logout');



// Profile Page
Route::get('/profile', 'PageController@getProfilePage')->name('profile')->middleware('auth');

Route::get('/profile/edit', 'PageController@getStoreProfilePage')->name('editProfile')->middleware('auth');

Route::post('/profile', 'ProfileController@storeProfile')->middleware('auth');

Route::delete('/profile', 'ProfileController@deleteProfile')->middleware('auth')->name('deleteProfile');
