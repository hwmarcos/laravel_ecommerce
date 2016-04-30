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

Route::get('/home', 'StoreController@index');
Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
Route::get('cart', ['as' => 'store.cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/update/{id}/{qtd}', ['as' => 'cart.update', 'uses' => 'CartController@update']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

/*
 * ROTAS PARA USUÁRIOS LOGADOS
 */

Route::group(['middleware' => 'auth'], function(){   
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);    
});

Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin', 'where' => ['id' => '[0-9]+']], function() {
    
    /*
     *  ORDERS
     */
    Route::get('orders', ['as' => 'orders', 'uses' => 'OrderController@index']);     
    Route::get('order/update/{id}/{status}', ['as' => 'oder.update', 'uses' => 'OrderController@update']);
    

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

/*
 *  AUTH
 */

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);
