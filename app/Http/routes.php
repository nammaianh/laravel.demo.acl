<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function()
{
    Route::post('register', [
        'as' => 'user.register',
        'uses' => 'UserController@register',
    ]);

    Route::post('authorise', [
        'as' => 'user.authorise',
        'uses' => 'UserController@authorise',
    ]);

    Route::get('denied', [
        'as' => 'user.denied',
        'uses' => function() { echo 'Denied'; },
    ]);

    Route::get('login', [
        'as' => 'user.login',
        'uses' => function ()
        {
            Auth::attempt([
                'email' => 'nammaianh@hotmail.com',
                'password' => 'pwd12345',
            ]);

            return redirect()->route('user.super-secret');
        },
        'middleware' => 'guest',
    ]);

    Route::get('logout', [
        'as' => 'user.logout',
        'uses' => function()
        {
            Auth::logout();

            return redirect()->route('user.super-secret');
        },
        'middleware' => 'auth',
    ]);

    Route::get('super-secret', [
        'as' => 'user.super-secret',
        'uses' => 'UserController@superSecret',
        'middleware' => ['auth', 'acl.permitted'],
    ]);
});
