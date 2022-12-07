<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    private array $validate_rules = [
        'title'=> 'required|max:255',
        'content'=>'required|min:10'
    ];

    public function addPostPage(): Factory|View|Application
    {
        return view('posts/add');
    }

    public function addPost(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate($this->validate_rules);
        // Валидация запроса ...

        $post = new Post();

        $title = $request->title;
        $slug = Str::of($title)->slug('-');

        $post->title = $title;
        $post->content = $request->content;
        $post->slug = $slug;
        $post->user_id = rand(1,10);
        $post->date = date('Y-m-d');

        $post->save();
        return redirect(route('all.posts'));
    }
    public function getAllPosts(): Factory|View|Application
    {
        collect($posts = DB::table('posts')->select('*')->orderByDesc('id')->paginate(5));
//        $posts = Post::paginate(5);
        return view('posts/all', ['posts' => $posts]);
    }

    public function showOnePost(int $id)//: Factory|View|Application
    {
        $post = Post::where('id', $id)->get()->first();
        return view('posts/one', ['post' => $post]);
    }

    public function showEditPostPage(int $id): Factory|View|Application
    {
        $post = Post::where('id', $id)->get()->first();
        return view('posts/edit', ['post' => $post]);
    }

    /**
     * @throws ValidationException
     */
    public function editPost(Request $request, int $id): Redirector|Application|RedirectResponse
    {

        $validated = $request->validate($this->validate_rules);

        $title = $request->title;
        $slug = Str::of($title)->slug('-');

        $post = Post::find($id);
        $post->title = $title;
        $post->slug = $slug;
        $post->content = $request->content;// rename property
        $post->save();
        return redirect(route('all.posts'));
    }

    public function deletePost(int $id): Redirector|Application|RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('all.posts'));

    }

}
