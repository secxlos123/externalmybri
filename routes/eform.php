<?php

/*
|--------------------------------------------------------------------------
| Dropdown Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dropdown routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * This route grup for eform need authenticate for access
 */
Route::group([ 'prefix' => 'eform', 'as' => 'eform.', 'middleware' => ['auth.api'] ], function () {

	/**
	 * This route for submit form application
	 */
	Route::post('/', 'EformController@store')->name('store');

	/**
	 * This route for get form eform
	 */
	Route::get('/', 'EformController@index')->name('index');

	/**
	 * This route for submit verify page
	 */
	Route::get('{token}/{status}', 'EformController@verify')->name('verify');

	/**
	 * This route for get page confirmation
	 */
	Route::get('konfrimasi', 'EformController@confirmation')->name('confirmation');

	/**
	 * This route for get page success
	 */
	Route::get('sukses', 'EformController@success')->name('success');
});