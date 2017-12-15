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
Route::get('perfil', 'DashboardController@perfil');
Route::post('ajax-usuarios-receptores', 'DashboardController@usersPerDepartment');


# Rutas de gestión de usuario
Route::get('/login', 'AuthController@showLoginForm');
Route::get('/registro', 'AuthController@showRegForm');
Route::get('/verify/{vercode}','AuthController@verifyReg');
Route::post('/login', 'AuthController@login');
Route::post('/registro', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');

# Rutas del dashboard para el administrador
Route::get('/admin/usuarios', 'DashboardController@users');
Route::get('/admin/usuarios/control', 'DashboardController@manageUsers');
Route::post('/admin/usuarios/ajax-manage', 'DashboardController@activate');
Route::get('/admin', 'DashboardController@adminRoot');
Route::get('/admin/usuarios/permisos', 'DashboardController@privileges');

#Rutas para envío y recepción de mensajes
Route::get('/inbox', 'MessagesController@inbox');
Route::get('/outbox', 'MessagesController@outbox');
Route::get('/detalles/{id}', 'MessagesController@detalles');
//Route::get('/detalles', 'MessagesController@detallesTest');
Route::post('/enviar', 'MessagesController@enviar');
Route::post('/ajax-check-message', 'MessagesController@checker');


