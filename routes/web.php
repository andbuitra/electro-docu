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
    return 'If not logged in, index should redirect to login page';
});

Route::get('/admin', function(){
    return 'Admin panel. Only accesible for admins. Should redirect to index if logged user is not admin or if user is not logged in';
});

Route::get('/login', function(){
    return 'Login panel. Public accessible. Redirected from index and admin if no session is available';
});
