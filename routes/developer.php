<?php

/*
|--------------------------------------------------------------------------
| Developer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register developer routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * This route grup for developer
 */
Route::group([
	'prefix' => 'dev', 'as' => 'developer.', 'namespace' => 'Developer', 'middleware' => ['auth.api'] 
], function () {

	/**
	 * This route for get homepage of developer
	 */
	Route::get('dashboard', 'HomeController@index')->name('index');

	/**
	 * This route for group for manage project or property
	 */
	Route::group(['prefix' => 'proyek', 'as' => 'proyek.'], function () {

		/**
		 * This route for showing list property of developer
		 */
		Route::get('/', 'PropertyController@index')->name('index');

		/**
		 * This route for showing list property of developer
		 */
		Route::post('/', 'PropertyController@store')->name('store');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('{slug}/detail', 'PropertyController@show')->name('show');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('{slug}/edit', 'PropertyController@edit')->name('edit');

		/**
		 * This route for showing list property of developer
		 */
		Route::match(['put', 'patch'], '{slug}', 'PropertyController@update')->name('update');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('tambah', 'PropertyController@create')->name('create');
	});
});