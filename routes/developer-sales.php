<?php

/*
|--------------------------------------------------------------------------
| Agent Developer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register agent developer routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * This route grup for agent developer
 */
Route::group([
	'prefix' => 'dev-sales', 'as' => 'dev-sales.', 'namespace' => 'Developer_sales', 'middleware' => ['auth.api', 'HasAccess:developer-sales']
], function () {

	/**
	 * This route for get homepage of agent developer
	 */
	Route::get('dashboard', 'HomeController@index')->name('index');
	Route::get('data_eform', 'HomeController@DataEform')->name('data-eform');
	Route::get('datatable/eforms', 'HomeController@datatables')->name('table-eform');
	Route::post('customer/add', 'HomeController@CustPost')->name('add-customer');
	Route::get('get-cust/{id}', 'HomeController@getCust')->name('get-cust');
	/** 
	* This route for get list Eform By id
	*/
	Route::get('get-eform/{id}', 'HomeController@getDataEform')->name('eform-cust');

	Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
		/**
		 * This route for handle homepage
		 */
		Route::get('/', 'ProfileController@edit')->name('index');

		/**
	 	* This route for success change password
		*/

		Route::get('change-password/check', 'ProfileController@successChangePassword')->name('index-password');

		/**
		 * This route for handle agent developer update data
		 */
		Route::match(['put', 'patch'], '{type}', 'ProfileController@update')->name('update');

		/**
		 * This route for send request change password
		 */
		Route::post('password/change-password', 'ProfileController@changePassword')->name('change-password');

		/**
		* This Route For View Profile
		*/
		//Route::get('')

		/**
		 * This route for handle homepage
		 */
		Route::get('/ubah', 'ProfileController@index')->name('edit');

		
	});


});
