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

/* Login Routes*/

    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', 'account@login' )->name('login');
        Route::post('login', 'account@login_check' )->name('login');    
    });


Route::group(['middleware' => 'auth'], function(){

    /* General Routes*/
    Route::get('logout', 'account@logout' )->name('logout');

    Route::get('/', 'mosq_form@showForm' )->name('form');



    /* Orders Routes */
    Route::group(['prefix'=> "order"], function(){
        Route::put('save', 'mosq_form@store' )->name('save_order');
    });

});