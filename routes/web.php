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


# Rutas del dashboard
Route::get('/', 'DashboardController@index');
Route::get('/adminRegistro', 'DashboardController@showAdminRegistro');


# Rutas de gestión de usuario
Route::get('/login', 'AuthController@showLoginForm');
Route::get('/registro', 'AuthController@showRegForm');
Route::get('/verify/{vercode}','AuthController@verifyReg');
Route::post('/login', 'AuthController@login');
Route::post('/registro', 'AuthController@register');



# Rutas del dashboard para 
Route::get('/admin', 'DashboardController@admin');
Route::get('/agregar-usuario', 'DashboardController@add');