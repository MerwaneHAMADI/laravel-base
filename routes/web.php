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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/employees/{id}', 'HomeController@single_employee')->name('employee_path');
Route::get('/employees', 'Admin\EmployeeController@index')->name('employees_path');

Route::group(['middleware' => 'role:admin'], function () {
    Route::resource('user', 'Admin\UserController');
    Route::resource('employee', 'Admin\EmployeeController');
});
