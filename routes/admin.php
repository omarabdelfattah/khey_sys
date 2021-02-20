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
Route::group(['prefix' => "admin"], function(){
    
    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', 'admin_controller@login' )->name('admin_login');
        Route::post('login', 'admin_controller@login_check' )->name('admin_login');
    });

    Route::group(['middleware' => 'auth:admin'],function(){
        Route::get('logout', 'admin_controller@logout' )->name('admin_logout');
        Route::get('/', 'admin_controller@show_dashboard' )->name('dashboard');
    });
});



?>