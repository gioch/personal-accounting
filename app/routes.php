<?php

Route::get('/', function() {
	return 'Home Page';
});

Route::get('login', 'SessionsController@index');
Route::get('logout', 'SessionsController@destroy'); 
Route::resource('sessions', 'SessionsController', ['only' => ['index', 'store', 'destroy']]);

Route::get('register', 'UserController@index');
Route::resource('users', 'UserController');

Route::resource('members', 'FamilyMembersController');

Route::get('charges', 'ChargesController@index')->before('auth');
Route::post('charges', 'ChargesController@store')->before('auth');
Route::delete('charges/{id}', ['as' => 'charges.delete', 'uses' => 'ChargesController@destroy'])->before('auth');
Route::get('charges/{id}/edit', ['as' => 'charges.edit', 'uses' => 'ChargesController@edit'])->before('auth');
Route::patch('charges/{id}', ['as' => 'charges.update', 'uses' => 'ChargesController@update'])->before('auth');

Route::get('monthinfo', 'MonthInfoController@create')->before('auth');
Route::post('monthinfo', 'MonthInfoController@store')->before('auth');