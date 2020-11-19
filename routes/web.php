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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


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
        });
    });
});

Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);
