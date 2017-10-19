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

#
# Rutas relacionadas al módulo de gestión de usuarios
#

# Muestra la pantalla principal del panel de gestión documental. Sólo es accesible para usuarios autenticados.
Route::get('/', 'DashboardController@index');
Route::get('/admin', 'DashboardController@admin');
Route::get('/login', 'DashboardController@login');
Route::get('/agregar-usuario', 'DashboardController@add');
Route::get('/registro', 'DashboardController@verifyReg');
Route::get('/registro/{vercode}','DashboardController@register');