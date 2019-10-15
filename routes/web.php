<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dl/{hash}', 'DeeplinkController@click');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// get user data
Route::get('/api/user', 'UserController@index');

// get deeplinks
Route::get('/api/deeplink', 'DeeplinkController@index');
// create deeplink
Route::post('/api/deeplink', 'DeeplinkController@create');
// update deeplink
Route::put('/api/deeplink', 'DeeplinkController@update');
// delete deeplink
Route::delete('/api/deeplink/{deeplink_id}', 'DeeplinkController@delete');

// get clicks
Route::get('/api/click', 'ClickController@index');
