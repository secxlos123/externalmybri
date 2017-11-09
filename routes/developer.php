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

	/**
	 * This route for group for manage project or property
	 */
	Route::group(['prefix' => 'proyek-type', 'as' => 'proyek-type.'], function () {

		/**
		 * This route for showing list property of developer
		 */
		Route::get('/', 'PropertyTypeController@index')->name('index');

		/**
		 * This route for showing list property of developer
		 */
		Route::post('/', 'PropertyTypeController@store')->name('store');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('{slug}/detail', 'PropertyTypeController@show')->name('show');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('{slug}/edit', 'PropertyTypeController@edit')->name('edit');

		/**
		 * This route for showing list property of developer
		 */
		Route::match(['put', 'patch'], '{slug}', 'PropertyTypeController@update')->name('update');

		/**
		 * This route for showing list property of developer
		 */
		Route::get('tambah', 'PropertyTypeController@create')->name('create');
	});

	/**
	 * This route for group for manage project or property
	 */
	Route::group(['prefix' => 'proyek-item', 'as' => 'proyek-item.'], function () {
		/**
		 * This route for showing list item of developer
		 */
		Route::get('/', 'ItemController@index')->name('index');

		/**
		 * This route for showing list property of developer
		 */
		Route::post('/', 'ItemController@store')->name('store');

		/**
		 * This route for showing list item of developer
		 */
		Route::get('{slug}/detail', 'ItemController@show')->name('show');

		/**
		 * This route for showing list item of developer
		 */
		Route::get('{slug}/edit', 'ItemController@edit')->name('edit');

		/**
		 * This route for showing list item of developer
		 */
		Route::get('tambah', 'ItemController@create')->name('create');

		/**
		 * This route for showing list property of developer
		 */
		Route::match(['put', 'patch'], '{slug}', 'ItemController@update')->name('update');
	});

	/**
	 * This route for group for manage project or property
	 */
	Route::group(['prefix' => 'developer', 'as' => 'developer.'], function () {
		/**
		 * This route for showing list developer of developer
		 */
		Route::get('/', 'DeveloperController@index')->name('index');

		/**
		 * This route for showing list developer of developer
		 */
		Route::post('/', 'DeveloperController@store')->name('store');

		/**
		 * This route for showing list Developer of developer
		 */
		Route::get('edit/{id}', 'DeveloperController@show')->name('show');

		/**
		 * This route for showing list Developer of developer
		 */
		Route::put('/{slug}', 'DeveloperController@update')->name('update');

		/**
		 * This route for showing list Developer of developer
		 */
		Route::get('tambah', 'DeveloperController@create')->name('create');

		/**
		 * This route for showing list Developer of developer
		 */
		Route::get('tables', 'DeveloperController@table')->name('table');

		/**
		 * This route for showing list developer of developer
		 */
		Route::match(['put', 'patch'], '{slug}', 'DeveloperController@update')->name('update');

		/**
		* This route for banned agent developer
		*/
		Route::put('banned/{id}', 'DeveloperController@deactive')->name('deactive');

	});
});
