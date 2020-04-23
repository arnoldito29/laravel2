<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('messages')->group(function () {
        Route::get('/', 'MessageController@index')->name('messages.index');
        Route::get('/sent', 'MessageController@sent')->name('messages.sent');
        Route::get('/userMessages/{user}', 'MessageController@userMessages')->name('messages.userMessages');
        Route::get('/{message}', 'MessageController@show')->name('messages.show');
        Route::post('/', 'MessageController@store')->name('messages.store');
        Route::patch('/{message}', 'MessageController@update')->name('messages.update');
    });
    Route::prefix('users')->group(function () {
        Route::get('/search', 'UserController@search')->name('users.search');
    });
});
