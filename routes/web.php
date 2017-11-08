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


Route::get('test', function (Request $request) {
	// return view('auth.actived');
	return view('eforms.index');
});

/**
 * This route for handle homepage
 */
Route::get('/', 'HomeController@index')->name('homepage');

/**
 * This route for handle upload dropzone
 */
Route::post('upload', 'UploadController@upload');

/**
 * This route for handle homepage
 */
Route::get('properties', 'PropertyController@index')->name('properties');


/**
 * This route for handle homepage
 */
Route::get('rincian-property/{property}', 'PropertyController@detailProperty')->name('detail-properties');

/**
 * This route for handle homepage
 */
Route::get('rincian-property-type/{property}', 'PropertyController@detailPropertyType')->name('detail-properties-type');

/**
 * This route for handle homepage
 */
Route::get('rincian-property-unit/{property}', 'PropertyController@detailPropertyUnit')->name('detail-properties-unit');

/**
 * This route for handle homepage
 */
Route::get('get-unit-property', 'PropertyController@getDetailPropertyType')->name('get-detail-properties-type');

/**
 * This route for handle homepage
 */
Route::get('get-tipe-property', 'PropertyController@getPropertyType')->name('type-properties');


/**
 * This route for handle homepage
 */
Route::get('rincian-produk', 'HomeController@detailProduct')->name('detail-product');

/**
 * This route for handle homepage
 */
Route::get('daftar-proyek', 'PropertyController@pageProperty')->name('all-properties');

/**
 * This route for handle homepage
 */
Route::get('get-all-properties', 'PropertyController@listProperty')->name('get-list-property');

/**
 * This route for handle customer profile
 */
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth.api', 'HasAccess:customer']], function () {

	/**
	 * This route for send request profile data
	 */
	Route::get('/', 'ProfileController@index')->name('index-profile');

	/**
	 * This route for send request change password
	 */
	Route::post('password/change-password', 'ProfileController@changePassword')->name('change-password');

	/**
	 * This route to show field edit data profile
	 */
	Route::get('/ubah', 'ProfileController@edit')->name('edit');


	/**
	 * This route for update data personal
	 */
	Route::match(['put', 'patch'], 'ProfileController@update')->name('update');
});

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
	 * This route for get form registration simple
	 */
	Route::get('activate/{user_id}/{code}', 'RegisterController@activate')->name('activate');

	/**
	 * This route for get form registration simple
	 */
	Route::get('activated', 'RegisterController@activated')->name('activated');

	/**
	 * This route for get form registration simple
	 */
	Route::get('successed', 'RegisterController@successed')->name('successed');

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
	Route::get('password/success', 'ForgotPasswordController@successForgot')->name('password.success');

	/**
	 * This route for send request login
	 */
	Route::delete('logout', 'LoginController@logout')->name('logout');

});