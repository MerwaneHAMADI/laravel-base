<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|    ==========================
|    ABOUT ROUTES AND MIDDLEWARES
|    ============================
|
|
|    All Employee and User views require authentication  no matter the
|   action --> called in Route group
|   User Views also require for the user to be admin --> called in another route group
|   But Employee Views require the user to be admin only for certain actions.
|   As said in the Laravel documentation, it is then better to implement the middleware
|   in the EmployeeController in the constructor.
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
  Route::resource('employee', 'Dashboard\EmployeeController');

  Route::group(['middleware' => 'role'], function(){
    Route::resource('user', 'Dashboard\UserController');
  });
});
