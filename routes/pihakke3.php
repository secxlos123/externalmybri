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
	'prefix' => 'pihakke3', 'as' => 'pihakke3.', 'namespace' => 'Pihakke3', 'middleware' => ['auth.api', 'HasAccess:others']
], function () {

	/**
	 * This route for get homepage of pihakke3
	 */
	Route::get('dashboard', 'HomeController@index')->name('index');

	Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
		/**
		 * This route for handle homepage
		 */
		Route::get('/', 'ProfileController@index')->name('index');

		/**
		 * This route for handle homepage
		 */
		Route::get('/ubah', 'ProfileController@edit')->name('edit');

		/**
		 * This route for send request change password
		 */
		Route::post('password/change-password', 'ProfileController@changePassword')->name('change-password');

		/**
		 * This route for update of profile developer
		 */
		Route::match(['put', 'patch'], '{type}', 'ProfileController@update')->name('update');
	});


});
