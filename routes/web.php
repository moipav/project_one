<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
 * todo урок 4
 */
Route::get('/about', function () {
    return view('about', ['message' => 'This is about page']);
});

Route::get('/home', function () {

    $images = DB::table('images')->select('*')
        ->get()//вернет коллекцию
        ->pluck('image')->all();//вернет массив с результатами из столбца image

//    dd($images);
    return view('home', ['images' => $images]);
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/store', function (Request $request) {
    $file = $request->file(['image'])->store('uploads');//почел выполнения сохраняет имя файла
//    $file = $request->file('image');
//    $file->store('uploads'); //сохранение файла

//    dd(get_class_methods($file));// проверяем доступные методы
    DB::table('images')->insert(
        ['image'=>$file]
    );
    return redirect('/home');
});

Route::get('/show', function () {
    return view('show');
});

Route::get('/edit', function () {
    return view('edit');
});
