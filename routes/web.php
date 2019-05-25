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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/login', [
    'as' => 'admin.login-form',
    'uses' => 'Auth\AdminLoginController@showLoginForm'
]);

Route::post('/admin/login', [
    'as' => 'admin.login',
    'uses' => 'Auth\AdminLoginController@login'
]);


Route::get('/admin', [
    'as' => 'administration',
//    'middleware' => ['auth:admin'],
    'middleware' => ['admin:super_admin'],
    'uses' => function () {
        return 'ela';
    }
]);