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

Route::get('/', 'IndexController@index');
Route::get('/popular-this-year', 'IndexController@showMostPopularOfTheYear');
Route::get('/top-horror-movies', 'IndexController@showTopHorrorMovies');

Route::resource('movies', 'SearchController');
Route::resource('users', 'UserController');
Route::resource('watchlists', 'WatchlistController');
Route::resource('reviews', 'ReviewController');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/comments', 'CommentController@store')->name('comments.store');
