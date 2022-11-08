<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ImagesController extends Controller
{

    public function __construct(
        private readonly ImageService $images = new ImageService
    )
    {
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('home', ['images' => $this->images->selectAllImage()]);
    }

    /**
     * @return Factory|View|Application
     */

    public function showCreateImagePage(): Factory|View|Application
    {
        return view('create');
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function createImage(Request $request): Redirector|Application|RedirectResponse
    {
//    dd(get_class_methods($file));// проверяем доступные методы
        $image = $request->file('image');
        $this->images->add($image);
        return redirect('/');
    }

    public function showOneImage($id): Factory|View|Application
    {
        $image = $this->images->getOneById($id);

        return view('show', ['image' => $image->image]);
    }

    public function showEditImagePage($id): Factory|View|Application
    {
        $image =$this->images->getOneById($id);

        return view('edit', ['image' => $image]);
    }

    public function editImage(Request $request, $id): Redirector|Application|RedirectResponse
    {
        $image = $request->file(['image']);
        $this->images->update($id, $image);
        return redirect('/');
    }

    public function deleteImage($id): Redirector|Application|RedirectResponse
    {
        $this->images->deleteById($id);
        return redirect('/');
    }
}
