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

use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('catalog', 'Admin\CatalogController@index');
    Route::get('catalog/create', 'Admin\CatalogController@add');
    Route::post('catalog/create', 'Admin\CatalogController@create');
    Route::get('catalog/delete', 'Admin\CatalogController@delete');
    Route::get('catalog/edit', 'Admin\CatalogController@edit');
    Route::post('catalog/edit', 'Admin\CatalogController@update');
    Route::get('profile/{user_id}', 'Admin\ProfileController@index')->name('profile');
    Route::get('profile/edit/{user_id}', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::post('profile/edit/{user_id}', 'Admin\ProfileController@update')->name('profile.update');
});


Auth::routes();

Route::get('catalogs/detail/{catalog_id}', 'CatalogsController@detail')->name('catalogs.detail');
Route::get('catalogs/search', 'CatalogsController@search')->name('catalogs.search');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CatalogsController@index');



