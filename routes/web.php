<?php

use Illuminate\Support\Facades\Route;

#Guest
Route::get('/', 'HomeController@index')->name('guest.welcome');
Route::get('posts', 'PostController@index')->name('posts');
Route::get('posts/{id}', 'PostController@show')->name('guest.posts.show');
Route::post('search', 'PostController@searchByKeys')->name('search');

Auth::routes();

#Admin
Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){
        Route::get('home', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
        Route::post('search', 'PostController@searchByKeys')->name('search');
    });
