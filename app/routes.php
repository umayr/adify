<?php

Route::get('/', 'HomeController@showWelcome');

Route::get('/dashboard', 'DashboardController@index');

// TODO: Input Validation.
// TODO: Make it POST.
Route::get('/ad/create', 'AdController@create');

Route::get('/ad/all', 'AdController@all');
Route::get('/ad/available-sizes', 'AdController@availableSizes');
