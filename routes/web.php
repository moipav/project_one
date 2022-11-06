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

Route::get('/', function () {
    return view('welcome');
});
/**
 * todo урок 3
 */
Route::get('/about', function () {
    return view('about', ['message' => 'This is about page']);
});
Route::get('/hello', function () {
    return view('hello', ['name'=>'John']);
});
