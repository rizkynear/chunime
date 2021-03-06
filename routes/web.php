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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function() {
        return redirect('/admin/dashboard');
    });

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
});

Route::group(['as' => 'user.', 'namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('search', 'AnimeController@search')->name('search');
    Route::get('latest-update', 'AnimeController@latest')->name('anime.latest');
    Route::get('ongoing', 'AnimeController@ongoing')->name('anime.ongoing');
    Route::get('anime-list', 'AnimeController@list')->name('anime.list');
    Route::get('genre-list', 'GenreController@list')->name('genre.list');
    Route::get('genres/{genre}', 'GenreController@index')->name('genre');
    Route::get('animes/{anime}', 'AnimeController@index')->name('anime');
    Route::get('{episode}', 'EpisodeController@index')->name('episode');
});