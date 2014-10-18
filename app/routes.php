<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// model bindings
Route::model('account', 'Account', function()
{
    return Redirect::to('/');
});

Route::model('transactions', 'Transaction', function()
{
    return Redirect::to('/');
});

// landing page
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);

// transactions - nested through accounts
Route::group(['before' => 'auth|auth.account'], function()
{
    Route::resource('account.transactions', 'TransactionsController');
});

// Confide RESTful route
Route::get('users/confirm/{code}', 'UsersController@getConfirm');
Route::get('users/reset_password/{token}', 'UsersController@getReset');
Route::get('users/reset_password', 'UsersController@postReset');
Route::controller( 'users', 'UsersController');
