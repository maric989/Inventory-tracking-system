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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('users','UserController',['middleware' => ['permission:users-show']]);

    Route::group( [ 'prefix' => 'product' ], function()
    {
        Route::get('/', ['as' => 'product.index', 'uses' => 'ProductController@index', 'middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
        Route::get('create', ['as' => 'product.create', 'uses' => 'ProductController@create', 'middleware' => ['permission:item-create']]);
        Route::post('/', ['as' => 'product.store', 'uses' => 'ProductController@store', 'middleware' => ['permission:item-create']]);
        Route::get('{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
        Route::post('delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductController@destroy', 'middleware' => ['permission:item-delete']]);
        Route::get('{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit', 'middleware' => ['permission:item-edit']]);
        Route::put('{id}', ['as' => 'product.update', 'uses' => 'ProductController@update', 'middleware' => ['permission:item-edit']]);
        Route::post('addAttribute', 'ProductController@addAttribute');
        Route::post('addNotes', 'ProductController@addNotes');
        });

    Route::group( [ 'prefix' => 'roles' ], function()
    {

        Route::get('/', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('store', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::post('{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);

    });




});