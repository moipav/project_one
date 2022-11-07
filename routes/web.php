<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::get('/home', function () {

    $images = DB::table('images')->select('*')
        ->get()//вернет коллекцию
//        ->pluck('image')
        ->all();//вернет массив с результатами из столбца image

//    dd($images);
    return view('home', ['images' => $images]);
});
/***********Добавление изображения*/
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
/******************************************/
Route::get('/show/{id}', function ($id) {
    $image = DB::table('images')->select('*')
        ->where('id', $id)
        ->first();

    return view('show', ['image' => $image->image]);
});

/**EDIT Images*/
Route::get('/edit/{id}', function ($id) {
    $image = DB::table('images')->select('*')
        ->where('id', $id)
        ->first();

    return view('edit', ['image' => $image]);
});

Route::post('/change/{id}', function (Request $request, $id) {

    $file = DB::table('images')->select('image')
        ->where('id', $id)
        ->first();
    Storage::delete($file->image);
    $file = $request->file(['image'])->store('uploads');
    DB::table('images')->where('id', $id)->update(['image'=> $file]);
    return redirect('/home');
});


/************************Удаление изображения***********************/
Route::get('/delete/{id}', function ($id) {
    $file = DB::table('images')->select('*')
        ->where('id',$id)
        ->first();
    Storage::delete($file->image);
    DB::table('images')->delete($file->id);
    return redirect('/home');
});
