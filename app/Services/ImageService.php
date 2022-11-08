<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * @return array|object
     */
    public function selectAllImage(): array|object
    {
        return DB::table('images')->select('*')
            ->get()//вернет коллекцию
//        ->pluck('image')
            ->all();//вернет массив с результатами из столбца image

    }

    /**
     * @param $image
     * @return void
     */
    public function add($image): void
    {
        DB::table('images')->insert(
            ['image' => $image->store('uploads')]
        );
    }

    public function getOneById($id)
    {
        return DB::table('images')->select('*')
            ->where('id', $id)
            ->first();
    }

    /**
     * @param $id
     * @param $image
     * @return void
     */
    public function update($id, $image): void
    {
        $get_image = $this->getOneById($id);
        Storage::delete($get_image->image);

        $filename = $image->store('uploads');
        DB::table('images')->where('id', $id)->update(['image'=> $filename]);
    }

    public function deleteById($id)
    {
        $file = $this->getOneById($id);
        Storage::delete($file->image);
        DB::table('images')->delete($file->id);
    }
}
