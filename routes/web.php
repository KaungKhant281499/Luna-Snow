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
Route::post("normalBid","HomeController@normalBid")->name("normalBid");
Route::post("directBuy","HomeController@directBuy")->name("directBuy");
Route::post("checkRole","HomeController@checkRole")->name("checkRole");

Route::get('/about','PagesController@aboutpage')->name('about');
Route::get('/contact','PagesController@contactpage')->name('contact');

Route::get('/banks/create','PagesController@createbank')->name('createbank');

Route::get('/account','PagesController@account')->name('account');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('banks','BankController');
	Route::resource('cities','CityController');
	Route::resource('districts','DistrictController');
	Route::resource('setups','SetupController');
	Route::resource('shops','ShopController');
	Route::resource('auctions','AuctionController');
	Route::resource('customers','CustomerController');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/auctions','PagesController@auctionpage')->name('auctions');

