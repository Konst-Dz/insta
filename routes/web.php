<?php

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', ['App\Http\Controllers\UserController', 'index']);
    Route::post('add/{id}', ['App\Http\Controllers\UserController','add'])->name('add');
    Route::delete('delete/{id}', ['App\Http\Controllers\UserController', 'delete'])->name('delete');

});

Auth::routes();

