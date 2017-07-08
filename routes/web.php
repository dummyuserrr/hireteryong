<?php

// Pages
Route::get('/', 'PagesController@index');
Route::get('test', 'PagesController@test');

// Demo Pages
Route::get('demo/', 'PagesController@demoIndex');
Route::post('demo/home', 'PagesController@homepage');
Route::post('demo/posts', 'PagesController@posts');

// Users
Route::post('demo/register', 'UsersController@register'); 
Route::post('demo/login', 'UsersController@login');
Route::post('demo/logout', 'UsersController@logout');
Route::get('demo/verify', 'UsersController@verify');

// Posts
Route::post('demo/posts/add', 'PostsController@add');

// Comments
Route::post('demo/posts/comment/add', 'CommentsController@addcomment');
Route::post('demo/posts/comment/load', 'CommentsController@loadcomments');