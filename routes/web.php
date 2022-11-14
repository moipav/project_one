<?php

use App\Http\Controllers\ImagesController;
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

{
    Route::controller(ImagesController::class)->group(function () {
        Route::get('/', [ImagesController::class, 'index']);

        Route::get('/show/{id}', [ImagesController::class, 'showOneImage']);

        Route::get('/create', 'showCreateImagePage')->middleware(['admin']);

        Route::post('/create', 'createImage');

        Route::get('/edit/{id}', 'showEditImagePage');
        Route::post('/edit/{id}', 'editImage');

        Route::get('/delete/{id}', 'deleteImage');
    });
}

Route::get('/login', function () {
    echo 'Страница входа';
    echo "<a href='/'> назад</a>";
})->name('login');

