<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function() {

    /*
     * CATEGORIES
     */
    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

    /*
     * PRODUCTS
     */
    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('destroy/{id}', ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('update/{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

        /*
         * PRODUCTS IMAGES
         */
        Route::group(['prefix' => 'images'], function() {
            Route::get('{id}', ['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}', ['as' => 'products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}', ['as' => 'products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}', ['as' => 'products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });
    });
});
