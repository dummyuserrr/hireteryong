<?php

// Pages
Route::get('/', 'PagesController@index');
Route::get('test', 'PagesController@test');

// Demo Pages
Route::get('demo', 'PagesController@demoIndex');

// Users
Route::post('demo/register', 'UsersController@register'); 
Route::post('demo/login', 'UsersController@login');
Route::post('demo/logout', 'UsersController@logout');