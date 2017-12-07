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
Route::group([ 'prefix' => 'eform', 'as' => 'eform.' ], function () {

	/**
	 * This route for submit form application
	 */
	Route::post('/', 'EformController@store')->name('store');

	/**
	 * This route for get form eform
	 */
	Route::get('/', 'EformController@index')->name('index');

	/**
	* This route for get form Eform Agen Developer
	*/
	Route::get('eform-agen', 'EformController@formEform')->name('eform-agen');

	/**
	 * This route for submit verify page
	 */
	Route::get('{token}/{status}', 'EformController@verify')->name('verify');

	/**
	 * This route for get page confirmation
	 */
	Route::get('konfirmasi', 'EformController@confirmation')->name('confirmation');

	/**
	 * This route for get page success
	 */
	Route::get('sukses', 'EformController@success')->name('success');
	/**
	 * This route for get list customer data
	 */
	Route::get('list-customer', 'EformController@getCustomer')->name('get-list-ustomer');

	/**
	 * This route for get list customer data
	 */
	Route::post('new-leads', 'EformController@saveCustomer')->name('save-customer');

	/**
	 * This route for get list customer data
	 */
	Route::get('detail-customer', 'EformController@detailCustomer')->name('detail-customer');

	Route::get('get-cust', 'EformController@getCust')->name('get-cust');

	Route::get('form-lead', 'EformController@formlead')->name('form-lead');

	Route::post('add-lead', 'EformController@add_cust')->name('add-lead');

});