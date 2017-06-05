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

    Route::get('/product', ['as' => 'product.index', 'uses' => 'ProductController@index', 'middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('/product/create', ['as' => 'product.create', 'uses' => 'ProductController@create', 'middleware' => ['permission:item-create']]);
    Route::post('/product', ['as' => 'product.store', 'uses' => 'ProductController@store', 'middleware' => ['permission:item-create']]);
    Route::get('/product/{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
    Route::post('product/delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductController@destroy', 'middleware' => ['permission:item-delete']]);
    Route::get('product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit', 'middleware' => ['permission:item-edit']]);
    Route::put('product/{id}', ['as' => 'product.update', 'uses' => 'ProductController@update', 'middleware' => ['permission:item-edit']]);
    Route::post('product/addAttribute', 'ProductController@addAttribute');
    Route::post('product/addNotes', 'ProductController@addNotes');

    /*Route::get('/product' , 'ProductController@index');
    Route::get('/product/create' , 'ProductController@create');
    Route::post('/product','ProductController@store');
    Route::get('/product/{id}','ProductController@show');
    Route::post('product/delete/{id}','ProductController@destroy');
    Route::get('product/{id}/edit','ProductController@edit');
    Route::put('product/{id}','ProductController@update');
    Route::post('product/addAttribute','ProductController@addAttribute');
    Route::post('product/addNotes','ProductController@addNotes');*/

/*
    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);*/


    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('roles/store', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::post('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);






});