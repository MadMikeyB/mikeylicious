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

Route::get('/article/{post}', function($post) {
    return redirect()->route('posts.show', $post);
});

Route::get('blog.php4', function() {
    $id = request()->ID;
    $post = \App\Models\Post::published()->active()->where('id', $id)->firstOrFail();
    return view('posts.show', compact('post'));
});

Route::namespace('Page')->group(function() {
    Route::get('{page}', 'PageController@show')->name('pages.show');
});

// Route::fallback('Page\\PageController@show');
