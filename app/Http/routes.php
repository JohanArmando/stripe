<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'suscription'] , function(){

	Route::get('/' , [
			'as' => 'suscription.plan.now',
			'uses' => 'SuscriptionController@index'
		]);
		Route::get('/plan' , [
			'as' => 'suscription.change.plan',
			'uses' => 'SuscriptionController@changePlan'
		]);
		Route::post('/plan' , [
			'as' => 'suscription.post.plan',
			'uses' => 'SuscriptionController@changePlanPost'
		]);
		Route::get('/pay-plan' , [
			'as' => 'suscription.get.pay.plan',
			'uses' => 'SuscriptionController@getPayPlan'
		]);
		Route::post('/pay-plan' , [
			'as' => 'suscription.post.pay-plan',
			'uses' => 'SuscriptionController@postPayPlan'
		]);
	Route::get('/home' , [
			'as' => 'home',
			'middleware' => ['free' , 'not.suscribed'],
			'uses' => 'SuscriptionController@home'
		]);

	
});
	Route::group(['prefix' => 'wehook' , 'namespace' => 'wehook'] , function() {
		Route::post('stripe', 'StripeController@handleWebhook');
	});



Route::get('/',function(){
	return  redirect()->to('auth/login');
});
	

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');