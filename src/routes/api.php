<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'LoginController@login')->name('login');
Route::post('register', 'LoginController@register')->name('register');
Route::group(['middleware' => 'permission'], function () {

    /**
     * Route for Handle Manage User
     */
    Route::group(['prefix' => 'user'], function () {
        Route::put('update', "UserController@updateInfoById")->name('user.update');
        Route::get('info', "UserController@getUserInfoById")->name('user.getInfo');
    });

    /**
     * Route for Handle Manage Store
     */
    Route::group(['prefix' => 'store'], function () {
        Route::put('update/{id}', "StoreController@updateStoreInfoById")->name('store.update');
        Route::get('{id}', "StoreController@getStoreInfoById")->name('store.getStore.detail');
        Route::get('', "StoreController@getAllStoreInfoByUser")->name('store.getAllStoreByUser');
        Route::post('create', 'StoreController@create')->name('store.create');
        Route::delete('{id}', 'StoreController@delete')->name('store.delete');
    });

    /**
     * Route for Handle Manage Product
     */
    Route::group(['prefix' => 'product'], function () {
        Route::put('update/{id}', "ProductController@updateProductInfoById")->name('product.update');
        Route::get('{id}', "ProductController@getProductInfoById")->name('product.getProduct.detail');
        Route::get('', "ProductController@getAllProductInfoByUser")->name('product.getAllProductByUser');
        Route::post('create', 'ProductController@create')->name('product.create');
        Route::delete('{id}', 'ProductController@delete')->name('product.delete');
    });
});

