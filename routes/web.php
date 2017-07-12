<?php

// Pages
Route::get('/', 'PagesController@index');
Route::post('/', 'PagesController@contactme');
Route::get('demo/resetmypassword', 'PagesController@resetmypassword');
Route::get('test', 'PagesController@test');

// Demo Pages
Route::get('demo', 'PagesController@demoIndex');
Route::post('demo/home', 'PagesController@homepage');
Route::post('demo/posts', 'PagesController@posts');
Route::post('demo/myaccount/edit', 'PagesController@editaccount');//->middleware('checksession');
Route::post('demo/myaccount', 'PagesController@myaccount');//->middleware('checksession');
Route::post('demo/myaccount/edit/save', 'UsersController@update');//->middleware('checksession');
Route::post('demo/publicchat', 'PagesController@publicchat');

// Users
Route::post('demo/register', 'UsersController@register'); 
Route::post('demo/login', 'UsersController@login');
Route::post('demo/logout', 'UsersController@logout');
Route::get('demo/verify', 'UsersController@verify');
Route::post('demo/sendpasswordresetlink', 'UsersController@sendpasswordresetlink');
Route::get('demo/resetpassword', 'UsersController@resetpassword');

// Posts
Route::post('demo/posts/add', 'PostsController@add');
Route::post('demo/posts/delete', 'PostsController@delete');

// Comments
Route::post('demo/posts/comment/add', 'CommentsController@addcomment');
Route::post('demo/posts/comment/load', 'CommentsController@loadcomments');

// Likes
Route::post('demo/posts/togglelike', 'LikesController@toggleLike');

// Chats
Route::post('demo/publicchat/send', 'ChatsController@send');
Route::post('demo/publicchat/refresh', 'ChatsController@refresh');