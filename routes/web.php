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


Route::get('/employees/{id}', 'Dashboard\EmployeeController@show')->name('employee_path');
Route::get('/employees', 'Dashboard\EmployeeController@index')->name('employees_path');

Route::group(['middleware' => 'role:admin'], function () {
    Route::resource('user', 'Dashboard\UserController');
    Route::resource('employee', 'Dashboard\EmployeeController');
});
