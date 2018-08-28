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

Route::get('/', 'Page\\HomeController@show')->name('home');

Route::prefix('blog')->namespace('Blog')->group(function() {
    Route::get('/', 'PostController@index')->name('posts.index');
    Route::get('{post}', 'PostController@show')->name('posts.show');
});

Route::feeds();
Route::get('error', 'SomeController@index');
Route::namespace('Page')->group(function() {
    Route::get('{page}', 'PageController@show')->name('pages.show');
});

