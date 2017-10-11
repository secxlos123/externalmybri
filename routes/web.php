<?php

use Illuminate\Http\Request;

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

Route::post('upload', function (Request $request) {
	dd($request->all());
});

Route::get('test', function (Request $request) {
	return view('test');
});

/**
 * This route for handle homepage
 */
Route::get('/', 'HomeController@index')->name('homepage');

/**
 * This route for handle homepage
 */
Route::get('properties', 'PropertyController@index')->name('properties');

/**
 * This route grup for authenticate
 */
Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {

	/**
	 * This route for handle customer register
	 */
	Route::group(['prefix' => 'register', 'as' => 'register.'], function () {

		/**
		 * This route for send request registration
		 */
		Route::post('/', 'RegisterController@register')->name('store');

		/**
		 * This route for get form registration simple
		 */
		Route::get('simple', 'RegisterController@simple')->name('simple');

		/**
		 * This route for get form registration simple
		 */
		Route::get('complete', 'RegisterController@complete')->name('complete');
	});

	/**
	 * This route for send request login
	 */
	Route::post('login', 'LoginController@login')->name('login');

	/**
	 * This route for send request login
	 */
	Route::post('password/reset', 'ForgotPasswordController@reset')->name('password.reset');

	/**
	 * This route for send request login
	 */
	Route::delete('logout', 'LoginController@logout')->name('logout');
});