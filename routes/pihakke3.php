<?php

/*
|--------------------------------------------------------------------------
| Pihak Ke 3 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register pihak ke 3 routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * This route grup for pihakke3
 */
Route::group([
	'prefix' => 'pihakke3', 'as' => 'pihakke3.', 'namespace' => 'Pihakke3', 'middleware' => ['auth.api']
], function () {

	/**
	 * This route for get homepage of pihakke3
	 */
	Route::get('dashboard', 'HomeController@index')->name('index');


});
