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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/insert', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/insert', 'AdminCategoryController@insert');
        Route::get('/update/{id}', 'AdminCategoryController@update')->name('admin.get.update.category');
        Route::post('/update/{id}', 'AdminCategoryController@edit');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('admin.get.delete.category');
        Route::get('/active/{id}', 'AdminCategoryController@changeStatus')->name('admin.get.status.category');

    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'AdminProductController@index')->name('admin.get.list.product');
        Route::get('/insert', 'AdminProductController@create')->name('admin.get.create.product');
        Route::post('/insert', 'AdminProductController@insert');
        Route::get('/update/{id}', 'AdminProductController@update')->name('admin.get.update.product');
        Route::post('/update/{id}', 'AdminProductController@edit');
        Route::get('delete/{id}', 'AdminProductController@delete')->name('admin.get.delete.product');
        Route::get('/active/{id}', 'AdminProductController@changeActive')->name('admin.get.active.product');
        Route::get('/type/{id}', 'AdminProductController@changeType')->name('admin.get.type.product');

    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', 'AdminBrandController@index')->name('admin.get.list.brand');
        Route::get('/insert', 'AdminBrandController@create')->name('admin.get.create.brand');
        Route::post('/insert', 'AdminBrandController@insert');
        Route::get('/update/{id}', 'AdminBrandController@update')->name('admin.get.update.brand');
        Route::post('/update/{id}', 'AdminBrandController@edit');
        Route::get('delete/{id}', 'AdminBrandController@delete')->name('admin.get.delete.brand');
        Route::get('/active/{id}', 'AdminBrandController@changeStatus')->name('admin.get.status.brand');

    });
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('danh-muc/{slug}-{id}', 'CategoryController@getListProduct')->name('get.list.product');

Route::get('san-pham/{slug}-{id}', 'ProductDetailController@productDetail')->name('get.detail.product');