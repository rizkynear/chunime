<?php

Route::get('/', function() {
    return redirect('admin/dashboard');
});

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

Route::group(['prefix' => 'genres', 'as' => 'genre.'], function () {
    Route::get('/', 'GenreController@index')->name('index');
    Route::post('store', 'GenreController@store')->name('store');
    Route::delete('{genre}/delete', 'GenreController@delete')->name('delete');
    Route::patch('{genre}/update', 'GenreController@update')->name('update');
});

Route::group(['prefix' => 'animes', 'as' => 'anime.'], function () {
    Route::get('/', 'AnimeController@index')->name('index');
    Route::get('create', 'AnimeController@create')->name('create');
    Route::post('store', 'AnimeController@store')->name('store');
    Route::get('{anime}/edit', 'AnimeController@edit')->name('edit');
    Route::patch('{anime}/update', 'AnimeController@update')->name('update');
    Route::delete('{anime}/delete', 'AnimeController@delete')->name('delete');
});