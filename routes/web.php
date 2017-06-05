<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::get('/users', 'UserController@index')->name('user');

Route::get('/factions', 'FactionController@index')->name('faction');

Route::get('/alliances', 'AllianceController@index')->name('alliance');

Route::get('/gumballs', 'GumballController@index')->name('gumball');
Route::post('/gumballs', 'GumballController@store');

Route::get('/fates', 'FateController@index')->name('fate');
Route::post('/fates', 'FateController@store');

Route::get('/matches', 'MatchController@index')->name('match');




