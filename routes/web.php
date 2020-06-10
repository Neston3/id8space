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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@login');
Auth::routes(['register' => false]);
Route::middleware(["auth"])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('companies', 'CompanyController')->only([
        'index', 'store', 'update', 'destroy'
    ]);

    Route::resource('employees', 'EmployeeController')->only([
        'index', 'store', 'update', 'destroy'
    ]);

});


