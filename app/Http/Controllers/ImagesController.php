<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

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

    public function showCreateImagePage(Request $request): Factory|View|Application
    {
        return view('create');
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     * @throws ValidationException
     */
    public function createImage(Request $request): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image'
        ]);
        $image = $request->file('image');
        $this->images->add($image);
        return redirect('/');
    }

    public function showOneImage($id): Factory|View|Application|RedirectResponse
    {
        $image = $this->images->getOneById($id);
        if($image === null){
            return back();
        }
        return view('show', ['image' => $image->image]);
    }

    /**
     * @param int $id
     * @return RedirectResponse|Application|Factory|View
     */
    public function showEditImagePage(int $id): RedirectResponse|Application|Factory|View
    {
        $image =$this->images->getOneById($id);
        if($image === null){
            return back();
        }

        return view('edit', ['image' => $image]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Redirector|Application|RedirectResponse
     * @throws ValidationException
     */
    public function editImage(Request $request, int $id): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image'
        ]);
        $image = $request->file(['image']);
        $this->images->update($id, $image);
        return redirect('/');
    }

    /**
     * @param int $id
     * @return Redirector|Application|RedirectResponse
     */
    public function deleteImage(int $id): Redirector|Application|RedirectResponse
    {
        $this->images->deleteById($id);
        return redirect('/');
    }
}
