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
Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/home', 'HomeController@dashboard')->name('home');
Auth::routes();

Route::post("selectTownship","HomeController@selectTownship")->name("selectTownship");

Route::get('/auctions','PagesController@auctionpage')->name('auctions');
Route::get('/about','PagesController@aboutpage')->name('about');
Route::get('/contact','PagesController@contactpage')->name('contact');

Route::get('/banks/create','PagesController@createbank')->name('createbank');

Route::get('/account','PagesController@account')->name('account');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('shops','ShopController');
	Route::resource('customers','CustomerController');
    Route::resource('banks','BankController');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

