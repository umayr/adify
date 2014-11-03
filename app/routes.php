<?php

Route::get('/', 'HomeController@showWelcome');

Route::get('/dashboard', 'DashboardController@index');

// TODO: Input Validation.
// TODO: Make it POST.

// TODO replace "ad" with anything else.
// This word is forbidden for AdBlocker.
Route::post('/ad/create', 'AdController@create');
Route::get('/ad/all', 'AdController@all');
Route::get('/ad/available-sizes', 'AdController@availableSizes');
