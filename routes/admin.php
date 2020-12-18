<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

/* Login Routes*/
Route::group(['middleware' => 'guest','prefix' => "admin"], function(){
    Route::get('/login', 'admin_controller@login' )->name('login');
    Route::post('/login', 'admin_controller@login_check' )->name('login');
});



?>