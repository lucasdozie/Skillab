<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
	'prefix'=> 'admin',
	'middleware' => 'auth'
	], function(){
		route::get('profile', function(){ 
			echo "welcome to your profile page!";
		});
		route::get('gethelp', function(){ 
			echo "We offer pro bonou services!";
		});
	}
);

Auth::routes();

Route::get('/home', 'HomeController@index');
