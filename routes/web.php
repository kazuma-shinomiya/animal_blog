<?php
Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');

Route::resource('/posts', 'PostController')->except(['index','show'])->middleware('auth');

Route::get('/posts/{post}/like', 'PostController@like')->name('posts.like')->middleware('auth');
Route::get('/posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike')->middleware('auth');

Route::get('/users/{name}', 'UserController@show')->name('users.show');

Route::get('/users/{name}/follow', 'UserController@follow')->name('users.follow')->middleware('auth');
Route::get('/users/{name}/unfollow', 'UserController@unfollow')->name('users.unfollow')->middleware('auth');
