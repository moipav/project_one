<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PostController;
use App\Models\Image;
use App\Models\Post;
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
        Route::get('/', 'index')->name('home');

        Route::get('/show/{id}', 'showOneImage');

        Route::get('/create', 'showCreateImagePage')/*->middleware(['admin'])*/;//middleware ограничит доступ толькодля админов

        Route::post('/create', 'createImage');

        Route::get('/edit/{id}', 'showEditImagePage');
        Route::post('/edit/{id}', 'editImage');

        Route::get('/delete/{id}', 'deleteImage');
    });
}

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'getAllPosts')->name('all.posts');
    Route::get('/posts/add', 'addPostPage')->name('add.post');
    Route::post('/posts/add', 'addPost');
    Route::get('/posts/show/{id}', 'showOnePost');
    Route::get('/posts/edit/{id}', 'showEditPostPage');
    Route::post('/posts/edit/{id}', 'editPost')->name('edit.post');
    Route::get('posts/delete/{id}', 'deletePost');
});


Route::get('/test', function () {
//    $post = \App\Models\Post::first();
//    dd($post->user->email);

//    $user = \App\Models\User::where('id', 6)->first();
//    $user->posts();
//    dd($user->posts);

});


