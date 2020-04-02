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

// Admin
Route::prefix('admin')->group(function () {

//  Trang admin-home
    Route::get('/', 'AdminController@index')->name('admin.home');

//  Quản lý danh mục
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/insert', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/insert', 'AdminCategoryController@insert');
        Route::get('/update/{id}', 'AdminCategoryController@update')->name('admin.get.update.category');
        Route::post('/update/{id}', 'AdminCategoryController@edit');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('admin.get.delete.category');
        Route::get('/active/{id}', 'AdminCategoryController@changeStatus')->name('admin.get.status.category');

    });

//   Quản lý sản phẩm
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

//  Quản lý thương hiệu
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'AdminBrandController@index')->name('admin.get.list.brand');
        Route::get('/insert', 'AdminBrandController@create')->name('admin.get.create.brand');
        Route::post('/insert', 'AdminBrandController@insert');
        Route::get('/update/{id}', 'AdminBrandController@update')->name('admin.get.update.brand');
        Route::post('/update/{id}', 'AdminBrandController@edit');
        Route::get('delete/{id}', 'AdminBrandController@delete')->name('admin.get.delete.brand');
        Route::get('/active/{id}', 'AdminBrandController@changeStatus')->name('admin.get.status.brand');

    });

//  Quản lý người dùng
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
        Route::get('/update/{id}', 'AdminUserController@update')->name('admin.get.update.user');
        Route::post('/update/{id}', 'AdminUserController@edit');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('admin.get.delete.user');
        Route::get('/active/{id}', 'AdminUserController@changeStatus')->name('admin.get.status.user');

    });

});
//  Kết thúc trang admin

//  Xử lý đăng nhập, đăng ký
Route::group(['namespace' => 'Auth'], function () {
    Route::get('dang-ky', 'RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky', 'RegisterController@postRegister');

    Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'LoginController@postLogin');

    Route::get('dang-xuat', 'LoginController@logout')->name('get.logout');
});
//  Kết thúc xử lý đăng nhập, đăng ký

//  Trang chủ
Route::get('/', 'HomeController@index')->name('home');

//  Hiển thị sản phẩm theo danh mục
Route::get('danh-muc/{slug}-{id}', 'CategoryController@getListProduct')->name('get.list.product');

//  Hiển thị chi tiết sản phẩm
Route::get('san-pham/{slug}-{id}', 'ProductDetailController@productDetail')->name('get.detail.product');

//  Xử lý giỏ hàng
Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('/', 'ShoppingCartController@index')->name('get.list.cart');
    Route::post('them-vao-gio', 'ShoppingCartController@addToCart')->name('add.cart');
    Route::patch('cap-nhat-gio', 'ShoppingCartController@update')->name('update.cart');
    Route::delete('xoa-khoi-gio', 'ShoppingCartController@remove')->name('remove.cart');
    Route::get('/checkout', 'ShoppingCartController@showFormCheckOut')->middleware('checkLogin')->name('show.checkout.cart');
    Route::post('/checkout', 'ShoppingCartController@checkOut');
});

//  Xử lý liên hệ
Route::get('lien-he', 'ContactController@getContact')->name('get.contact');
Route::post('lien-he', 'ContactController@postContact');
