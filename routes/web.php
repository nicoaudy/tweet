<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'TimelineController@index')->name('home');

    Route::post('/tweets', 'TweetController@create');

    Route::get('user/{user}', 'UserController@index')->name('user.index');
    Route::get('user/{user}/follow', 'UserController@follow')->name('user.follow');
});
