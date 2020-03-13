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

//Auth::routes();
Route::redirect('/', 'login');

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

});

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('home', 'Backend\HomeController@index')->name('home');
    
    //User CRUD
    Route::get('users', 'Backend\User\UserController@index')->name('users.index');
    Route::get('users/create', 'Backend\User\UserController@create')->name('users.create');
    Route::post('users/store', 'Backend\User\UserController@store')->name('users.store');
    Route::get('users/{user}', 'Backend\User\UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'Backend\User\UserController@edit')->name('users.edit');
    Route::patch('users/{user}', 'Backend\User\UserController@update')->name('users.update');
    Route::delete('users/{user}', 'Backend\User\UserController@destroy')->name('users.delete');

    //Role CRUD
    Route::get('roles', 'Backend\User\RoleController@index')->name('roles.index');
    Route::get('roles/create', 'Backend\User\RoleController@create')->name('roles.create');
    Route::post('roles/store', 'Backend\User\RoleController@store')->name('roles.store');
    Route::get('roles/{role}', 'Backend\User\RoleController@show')->name('roles.show');
    Route::get('roles/{role}/edit', 'Backend\User\RoleController@edit')->name('roles.edit');
    Route::patch('roles/{role}', 'Backend\User\RoleController@update')->name('roles.update');
    Route::delete('roles/{role}', 'Backend\User\RoleController@destroy')->name('roles.delete');
    
    
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

});

    
    



