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
    
    Route::group(['middleware' => 'guest:admin'],function(){
        Route::get('login', 'admin_controller@login' )->name('admin_login');
        Route::post('login', 'admin_controller@login_check' )->name('admin_login');
    });

    Route::group(['middleware' => 'auth:admin'],function(){

        Route::get('logout', 'admin_controller@logout' )->name('admin_logout');
        Route::get('/', 'landing@index' )->name('dashboard');

        /* Orders routes */
        Route::get('orders/{id?}', 'Orders@index' )->name('orders');    

        Route::get('getOrders', 'Orders@getOrders' )->name('get_orders');
        Route::get('getOrderDetails', 'Orders@getOrderDetails' )->name('get_orders_details');

        Route::post('order/approve','Orders@orderApprove')->name('order_approve');
        Route::post('order/decline','Orders@orderDecline')->name('order_decline');

        Route::delete('/delete_order/{id}', 'Orders@delete_order' )->name('delete_order');

        

        /* Mosques routes */
        Route::get('mosques', 'Mosques@index')->name('mosques');      

        Route::get('getMosques', 'Mosques@getMosques' )->name('get_mosques');
        Route::get('/add_mosq', 'Mosques@addMosque' )->name('add_mosque');
        Route::put('/store_mosque', 'Mosques@store_mosque' )->name('store_mosque');

        Route::get('/edit_mosq/{id}', 'Mosques@editMosque' )->name('edit_mosque');
        Route::patch('/update_mosque/{id}', 'Mosques@update_mosque' )->name('update_mosque');

        Route::delete('/delete_mosque/{id}', 'Mosques@delete_mosque' )->name('delete_mosque');

        
        /* Resources routes */
        Route::get('resources', 'Resources@index')->name('resources');      

        Route::get('getResources', 'Resources@getResources' )->name('get_resources');
        Route::get('/add_resource', 'Resources@addResource' )->name('add_resource');
        Route::put('/store_resource', 'Resources@store_resource' )->name('store_resource');

        Route::get('/edit_resource/{id}', 'Resources@editResource' )->name('edit_resource');
        Route::patch('/update_resource/{id}', 'Resources@update_resource' )->name('update_resource');

        Route::delete('/delete_resource/{id}', 'Resources@delete_resource' )->name('delete_resource');

        /* admin_groups routes */
        Route::get('admin_groups', 'admin_groups@index')->name('admin_groups');      
        Route::get('get_admin_groups'       , 'admin_groups@get_admin_groups'    )->name('get_admin_groups');

        Route::get('/add_admin_group'          , 'admin_groups@add_admin_groups'    )->name('add_admin_groups');
        Route::put('/store_admin_groups'    , 'admin_groups@store_admin_groups' )->name('store_admin_groups');

        Route::get(     '/edit_admin_group/{id}'    , 'admin_groups@editadmin_groups'      )->name('edit_admin_groups');
        Route::patch(   '/update_admin_groups/{id}'  , 'admin_groups@update_admin_groups'   )->name('update_admin_groups');
        
        Route::delete(  '/delete_admin_group/{id}'  , 'admin_groups@delete_admin_group'   )->name('delete_admin_groups');

        /* Users routes */
        Route::get('users', 'Users@index')->name('users');      

        Route::get('getUsers', 'Users@getUsers' )->name('get_users');
        Route::get('/add_User', 'Users@addUser' )->name('add_User');
        Route::put('/store_User', 'Users@store_user' )->name('store_User');

        Route::get('/edit_user/{id}', 'Users@editUser' )->name('edit_user');
        Route::patch('/update_user/{id}', 'Users@update_user' )->name('update_user');

        Route::delete('/delete_user/{id}', 'Users@delete_user' )->name('delete_user');
  


    });
});



?>