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
    Route::get('crop-size-thumbnail', 'AnimeController@getCropThumbnail')->name('crop-size-thumbnail');
    Route::get('crop-size-banner', 'AnimeController@getCropBanner')->name('crop-size-banner');
    Route::get('create', 'AnimeController@create')->name('create');
    Route::post('store', 'AnimeController@store')->name('store');
    Route::get('{anime}/edit', 'AnimeController@edit')->name('edit');
    Route::put('{anime}/update-thumbnail', 'AnimeController@updateThumbnail')->name('update.thumbnail');
    Route::put('{anime}/update-banner', 'AnimeController@updateBanner')->name('update.banner');
    Route::patch('{anime}/update', 'AnimeController@update')->name('update');
    Route::delete('{anime}/delete', 'AnimeController@delete')->name('delete');

    Route::group(['prefix' => '{anime}/episodes', 'as' => 'episode.'], function() {
        Route::get('/', 'EpisodeController@index')->name('index');
        Route::post('store', 'EpisodeController@store')->name('store');
        Route::post('{episode}/publish', 'EpisodeController@publish')->name('publish');
        Route::patch('{episode}/update', 'EpisodeController@update')->name('update');
        Route::delete('{episode}/delete', 'EpisodeController@delete')->name('delete');
        
        Route::group(['prefix' => '{episode}/downloads', 'as' => 'download.'], function() {
            Route::get('/', 'DownloadController@index')->name('index');
            Route::post('store', 'DownloadController@store')->name('store');
            Route::patch('{download}/update', 'DownloadController@update')->name('update');
            Route::delete('{download}/delete', 'DownloadController@delete')->name('delete');
        });

        Route::group(['prefix' => '{episode}/streams', 'as' => 'stream.'], function() {
            Route::get('/', 'StreamController@index')->name('index');
            Route::post('store', 'StreamController@store')->name('store');
            Route::patch('{stream}/update', 'StreamController@update')->name('update');
            Route::delete('{stream}/delete', 'StreamController@delete')->name('delete');
        });
    });
});

Route::group(['prefix' => 'accounts', 'as' => 'account.'], function () {
    Route::get('/', 'AccountController@index')->name('index');
    Route::post('store', 'AccountController@store')->name('store');
    Route::patch('{account}/update', 'AccountController@update')->name('update');
    Route::delete('{account}/delete', 'AccountController@delete')->name('delete');
});