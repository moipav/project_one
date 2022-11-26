<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getAllPosts()
    {
        $posts = Post::paginate(5);
        return view('about', ['posts'=>$posts]);
    }
}
