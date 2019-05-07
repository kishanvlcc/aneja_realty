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

//Route::get('/', 'HomeController@index');
Route::get('/', function () {
     if (\Auth::check('user'))
        return redirect('dashboard');
    else
        return redirect('/login');
});

Route::auth();

Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('dashboard','DashboardController');
    Route::resource('property','PropertyController');
    Route::post('property/search','PropertyController@index');
    Route::resource('ajax/gatData','DashboardController@getData');
    Route::resource('city','CityController');
    Route::resource('state','StateController');
    Route::resource('location','LocationController');
    
});