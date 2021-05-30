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
    Route::get('catalog/create', 'Admin\CatalogController@add');
    Route::post('catalog/create', 'Admin\CatalogController@create');
    Route::get('catalog', 'Admin\CatalogController@index');
    Route::get('catalog/edit', 'Admin\CatalogController@edit');
    Route::post('catalog/edit', 'Admin\CatalogController@update');
    Route::get('catalog/delete', 'Admin\CatalogController@delete');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile', 'Admin\ProfileController@detail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CatalogsController@index');
Route::get('catalog/detail', 'CatalogsController@detail');


