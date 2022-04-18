<?php

/*
|--------------------------------------------------------------------------
| B2B Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin

Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){   

    Route::get('/community/all-products', 'CommunityProductController@community_products')->name('community_products');

    Route::get('/community-product/create', 'CommunityProductController@product_create')->name('community_product_create');
    Route::post('/community-product/store', 'CommunityProductController@product_store')->name('community_product_store');
    Route::get('/community-product/{id}/edit', 'CommunityProductController@product_edit')->name('community_product_edit');
    Route::post('/community-product/update/{id}', 'CommunityProductController@product_update')->name('community_product_update');
    Route::get('/community-product/destroy/{id}', 'CommunityProductController@product_destroy')->name('community_product_destroy');

});