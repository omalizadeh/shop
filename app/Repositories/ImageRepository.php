<?php

namespace App\Repositories;

use App\Image;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageRepository implements ImageRepositoryInterface
{
    public function all()
    {
        return Image::all();
    }

    public function except(array $ids)
    {
        return Image::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Image::create($data);
    }

    public function update(array $data, $id)
    {
        return Image::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Image::IMAGES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Image::findOrFail($id);
    }

    public function destroy(Image $image)
    {
        if (Storage::exists($image->getPath())) {
            Storage::delete($image->getPath());
        }
        return $this->delete($image->id);
    }
}
