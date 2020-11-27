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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\ShoppingCartContrller;

Auth::routes();

Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/gioi-thieu', 'HomeController@getAboutUs')->name('about.us');
Route::get('/tat-ca-san-pham', [ShowProductController::class, 'getAllProduct'])->name('product.all');
Route::get('/san-pham/{slug}', [ShowProductController::class, 'getDetailProduct'])->name('product.detail');
Route::get('danh-muc/{slug}', [ShowProductController::class, 'getProductWithCategory'])->name('get.product.category');

// cart
//Route::group(['prefix' => 'gio-hang'], function () {
//    Route::get('/', 'ShoppingCartController@index')->name('get.list.cart');
//    Route::post('them-vao-gio', 'ShoppingCartController@addToCart')->name('add.cart');
//    Route::patch('cap-nhat-gio', 'ShoppingCartController@update')->name('update.cart');
//    Route::delete('xoa-khoi-gio', 'ShoppingCartController@remove')->name('remove.cart');
//    Route::get('/checkout', 'ShoppingCartController@showFormCheckOut')->middleware('checkLogin')->name('show.checkout.cart');
//    Route::post('/checkout', 'ShoppingCartController@checkOut');
//});



Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.list');
            Route::get('/add', [CategoryController::class, 'showAddForm'])->name('category.add');
            Route::post('/add', [CategoryController::class, 'save'])->name('category.save');

            Route::get('/update/{id}', [CategoryController::class, 'showUpdateForm'])->name('category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.list');
            Route::get('/add', [ProductController::class, 'showAddForm'])->name('product.add');
            Route::post('/add', [ProductController::class, 'save'])->name('product.save');

            Route::get('/update/{id}', [ProductController::class, 'showUpdateForm'])->name('product.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('/change-type/{id}', [ProductController::class, 'changeType'])->name('product.change.type');
            Route::get('/change-status/{id}', [ProductController::class, 'changeStatus'])->name('product.change.status');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user.list');

            Route::get('/update/{id}', [UserController::class, 'showUpdateForm'])->name('user.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        });

        Route::group(['prefix' => 'slide'], function () {
            Route::get('/', [SlideController::class, 'index'])->name('slide.list');
            Route::get('/add', [SlideController::class, 'showAddForm'])->name('slide.add');
            Route::post('/add', [SlideController::class, 'save'])->name('slide.save');

            Route::get('/update/{id}', [SlideController::class, 'showUpdateForm'])->name('slide.edit');
            Route::post('/update/{id}', [SlideController::class, 'update'])->name('slide.update');
            Route::get('/delete/{id}', [SlideController::class, 'delete'])->name('slide.delete');
        });
    });
});
