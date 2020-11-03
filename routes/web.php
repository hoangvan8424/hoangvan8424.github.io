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

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
    });

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

});

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@create')->name('register');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
