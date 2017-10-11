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
 * This route grup for authenticate
 */
Route::group(['prefix' => 'dropdown', 'as' => 'dropdown.'], function () {

	/**
	 * This route for get form registration simple
	 */
	Route::get('cities', 'DropdownController@cities')->name('cities');

	/**
	 * This route for get form registration simple
	 */
	Route::get('citizenships', 'DropdownController@citizenships')->name('citizenships');

	/**
	 * This route for get form registration simple
	 */
	Route::get('types', 'DropdownController@types')->name('prop_types');

	/**
	 * This route for get form registration simple
	 */
	Route::get('property', 'DropdownController@properties')->name('property');

	/**
	 * This route for get form registration simple
	 */
	Route::get('jobFields', 'DropdownController@jobFields')->name('jobFields');

	/**
	 * This route for get form registration simple
	 */
	Route::get('jobTypes', 'DropdownController@jobTypes')->name('jobTypes');

});