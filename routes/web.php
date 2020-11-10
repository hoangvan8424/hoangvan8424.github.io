<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('/install', 'InstallController@index')->name('install');
Route::post('/install/save', 'InstallController@save')->name('save.install');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::group(['prefix' => 'branch'], function () {
            Route::get('/', 'BranchController@index')->name('branch.list');
            Route::get('/add', 'BranchController@add')->name('branch.add');
            Route::post('/add', 'BranchController@save')->name('branch.save');

            Route::get('/update/{id}', 'BranchController@showUpdateForm')->name('branch.edit');
            Route::post('/update/{id}', 'BranchController@update')->name('branch.update');

            Route::get('/delete/{id}', 'BranchController@delete')->name('branch.delete');
        });

        Route::group(['prefix' => 'department'], function () {
            Route::get('', 'DepartmentController@index')->name('department.list');
            Route::get('/add', 'DepartmentController@add')->name('department.add');
            Route::post('/add', 'DepartmentController@save')->name('department.save');

            Route::get('/update/{id}', 'DepartmentController@showUpdateForm')->name('department.edit');
            Route::post('/update/{id}', 'DepartmentController@update')->name('department.update');

            Route::get('/delete/{id}', 'DepartmentController@delete')->name('department.delete');
        });

        // product
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('product.list');
            Route::get('/add', 'ProductController@add')->name('product.add');
            Route::post('/add', 'ProductController@save')->name('product.save');

            Route::get('/update/{id}', 'ProductController@showUpdateForm')->name('product.edit');
            Route::post('/update/{id}', 'ProductController@update')->name('product.update');

            Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
        });

        // product print
        Route::group(['prefix' => 'product-print'], function () {
            Route::get('/', 'ProductPrintController@index')->name('product.print.list');
            Route::get('/add', 'ProductPrintController@add')->name('product.print.add');
            Route::post('/add', 'ProductPrintController@save')->name('product.print.save');
            Route::get('/update/{id}', 'ProductPrintController@showUpdateForm')->name('product.print.edit');
            Route::post('/update/{id}', 'ProductPrintController@update')->name('product.print.update');

            Route::get('/delete/{id}', 'ProductPrintController@delete')->name('product.print.delete');
        });

        // product demo
        Route::group(['prefix' => 'product-demo'], function () {
            Route::get('/', 'ProductDemoController@index')->name('product.demo.list');
            Route::get('/add', 'ProductDemoController@add')->name('product.demo.add');
            Route::post('/add', 'ProductDemoController@save')->name('product.demo.save');
            Route::get('/update/{id}', 'ProductDemoController@showUpdateForm')->name('product.demo.edit');
            Route::post('/update/{id}', 'ProductDemoController@update')->name('product.demo.update');

            Route::get('/get-product', 'ProductDemoController@getProductFromBranch')->name('get.product.from.branch');
            Route::get('/get-customer', 'ProductDemoController@getCustomerFromBranch')->name('get.customer.from.branch');

            Route::get('/delete/{id}', 'ProductDemoController@delete')->name('product.demo.delete');
        });

        // customer
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'CustomerController@index')->name('customer.list');
            Route::get('/add', 'CustomerController@add')->name('customer.add');
            Route::post('/add', 'CustomerController@save')->name('customer.save');
            Route::get('/update/{id}', 'CustomerController@showUpdateForm')->name('customer.edit');
            Route::post('/update/{id}', 'CustomerController@update')->name('customer.update');

            Route::get('/delete/{id}', 'CustomerController@delete')->name('customer.delete');

            Route::get('/get-user', 'CustomerController@getUserFromBranch')->name('get.user.from.branch');
        });

        // user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')->name('user.list');
            Route::get('/add', 'UserController@add')->name('user.add');
            Route::post('/add', 'UserController@save')->name('user.save');
            Route::get('/update/{id}', 'UserController@showUpdateForm')->name('user.edit');
            Route::post('/update/{id}', 'UserController@update')->name('user.update');

            Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
        });

    });

});

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@create')->name('register');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
