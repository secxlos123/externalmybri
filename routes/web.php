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
	return view('auth.success-register');
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


/**ri
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
Route::get('tentang-kami', 'HomeController@aboutUs')->name('about-us');

/**
 * This route for handle homepage
 */
Route::get('daftar-proyek', 'PropertyController@pageProperty')->name('all-properties');

/**
 * This route for handle homepage
 */
Route::get('get-all-properties', 'PropertyController@listProperty')->name('get-list-property');

/**
 * This route for handle homepage
 */
Route::get('daftar-developer', 'DevelopersController@index')->name('all-developer');

/**
 * This route for handle homepage
 */
Route::get('get-all-developer', 'DevelopersController@getListDeveloper')->name('get-list-developer');

/**
 * This route for handle homepage
 */
Route::get('properti-developer/{id}', 'DevelopersController@listPropertyDeveloper')->name('list-property-developer');

/**
 * This route for handle homepage
 */
Route::get('get-properti-developer', 'DevelopersController@getListPropertyDeveloper')->name('get-property-developer');

/**
 * This route for handle customer profile
 */
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth.api', 'HasAccess:customer']], function () {

	/**
	 * This route for send request profile data
	 */
	Route::get('/{type}', 'ProfileController@index')->name('index-profile');

	/**
	 * This route for success change password
	 */

	Route::get('change-password/check', 'ProfileController@successChangePassword')->name('index-password');

	/**
	 * This route for send request change password
	 */
	Route::post('password/change-password', 'ProfileController@changePassword')->name('change-password');

	/**
	 * This route to show field edit data profile
	 */
	Route::get('/ubah/{type}', 'ProfileController@edit')->name('edit');

	/**
	 * This route for update data personal
	 */
	Route::match(['put', 'patch'], '{type}', 'ProfileController@update')->name('update');
});

/**
 * This route for handle customer profile
 */
Route::group(['prefix' => 'schedule', 'as' => 'schedule.', 'middleware' => ['auth.api', 'HasAccess:customer']], function () {

	/**
	 * This route for send request schedule data
	 */
	Route::get('/', 'ScheduleController@index')->name('index-schedule');
	/**
	 * This route for send request form create data
	 */
	Route::get('/data-list', 'ScheduleController@listData')->name('list-data');
	/**
	 * This route for send request form create data
	 */
	Route::get('/update', 'ScheduleController@update')->name('update');
});

/**
 * This route for handle page tracking
 */
Route::group(['prefix' => 'tracking', 'as' => 'tracking.', 'middleware' => ['auth.api', 'HasAccess:customer']], function () {

	/**
	 * This route for send request tracking list data
	 */
	Route::get('/', 'TrackingController@index')->name('index-tracking');
	/**
	 * This route for send request detail tracking
	 */
	Route::get('/detail/{id}', 'TrackingController@show')->name('show');
});

/**
 * This route for handle page verification
 */
Route::group(['prefix' => 'verification', 'as' => 'verification.', 'middleware' => ['auth.api', 'HasAccess:customer']], function () {

	/**
	 * This route for send request verification list data
	 */
	Route::get('/', 'VerificationController@index')->name('index-verification');
	/**
	 * This route for send request detail verification
	 */
	// Route::get('/detail/{id}', 'VerificationController@show')->name('show');
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

	   /**
	 	* This route for refresh captcha
	 	*/
		Route::get('recaptcha', 'RegisterController@refreshCaptcha')->name('recaptcha');
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
	 * This route for resend email function
	 */
	Route::get('resend', 'RegisterController@resendEmail')->name('resend');

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
Route::group(['prefix' => 'kalkulator', 'as' => 'kalkulator.'], function () {
	/**
	 * This route for Form Calculator
	 */
	Route::get('/', 'HomeController@calculate')->name('kalkulator');
	/*
	*  This  route for get Price from detail property
	*/
	Route::get('/{unit_price}/simulasi-kpr', 'HomeController@calculate')->name('simulasi.kpr');
	/**
	 * This route for Post Calculator
	 */
	Route::post('/', 'HomeController@postcalculate')->name('post');
});
