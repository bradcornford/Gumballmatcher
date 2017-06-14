<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('', ['uses' => 'IndexController@index', 'as' => 'index']);

        Route::get('users', ['uses' => 'UserController@index', 'as' => 'user.index']);

        Route::get('account/change_details', ['uses' => 'Auth\AccountController@showChangeDetailsForm', 'as' => 'auth.account.change_details']);
        Route::patch('account/change_details', ['uses' => 'Auth\AccountController@changeDetails', 'as' => 'auth.account.change_details']);

        Route::get('account/change_password', ['uses' => 'Auth\AccountController@showChangePasswordForm', 'as' => 'auth.account.change_password']);
        Route::patch('account/change_password', ['uses' => 'Auth\AccountController@changePassword', 'as' => 'auth.account.change_password']);

        Route::get('alliances', ['uses' => 'AllianceController@index', 'as' => 'alliance.index']);

        Route::get('gumballs', ['uses' => 'GumballController@index', 'as' => 'gumball.index']);
        Route::post('gumballs', ['uses' => 'GumballController@store', 'as' => 'gumball.store']);

        Route::get('fates', ['uses' => 'FateController@index', 'as' => 'fate.index']);
        Route::post('fates', ['uses' => 'FateController@store', 'as' => 'fate.store']);

        Route::get('matches', ['uses' => 'MatchController@index', 'as' => 'match.index']);
        Route::post('matches', ['uses' => 'MatchController@store', 'as' => 'match.store']);
    }
);

Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::get('', ['uses' => 'Admin\IndexController@index', 'as' => 'index']);

        Route::post('roles/mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
        Route::resource('roles', 'Admin\RolesController');

        Route::post('users/mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
        Route::resource('users', 'Admin\UsersController');

        Route::post('alliances/mass_destroy', ['uses' => 'Admin\AlliancesController@massDestroy', 'as' => 'alliances.mass_destroy']);
        Route::resource('alliances', 'Admin\AlliancesController');

        Route::post('factions_mass_destroy', ['uses' => 'Admin\FactionsController@massDestroy', 'as' => 'factions.mass_destroy']);
        Route::resource('factions', 'Admin\FactionsController');

        Route::post('gumballs/mass_destroy', ['uses' => 'Admin\GumballsController@massDestroy', 'as' => 'gumballs.mass_destroy']);
        Route::resource('gumballs', 'Admin\GumballsController');

        Route::post('groups/mass_destroy', ['uses' => 'Admin\GroupsController@massDestroy', 'as' => 'groups.mass_destroy']);
        Route::resource('groups', 'Admin\GroupsController');

        Route::post('fates/mass_destroy', ['uses' => 'Admin\FatesController@massDestroy', 'as' => 'fates.mass_destroy']);
        Route::resource('fates', 'Admin\FatesController');
    }
);





