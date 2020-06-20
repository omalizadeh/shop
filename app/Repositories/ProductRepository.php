<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function all()
    {
        return Product::all();
    }

    public function paginate($perPage)
    {
        return Product::paginate($perPage);
    }

    public function paginateActive($perPage)
    {
        return Product::where('is_active', true)->paginate($perPage);
    }

    public function except(array $ids)
    {
        return Product::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        return Product::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Product::PRODUCTS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function syncCategories(Product $product, array $categoryIds)
    {
        return $product->categories()->sync($categoryIds);
    }

    public function syncFeatures(Product $product, array $features)
    {
        return $product->features()->sync($features);
    }

    public function syncImages(Product $product, array $paths)
    {
        return $product->images()->saveMany($paths);
    }

    public function nextImagePosition(Product $product)
    {
        return $product->images()->max('position') + 1;
    }

    public function setDefaultCategory(Product $product, $categoryId)
    {
        return $product->categories()->wherePivot('category_id', $categoryId)->update(['is_default' => true]);
    }

    public function destroy(Product $product)
    {
        return DB::transaction(function () use ($product) {
            $images = $product->images;
            if ($images->count() > 0) {
                foreach ($images as $image) {
                    $this->imageRepository->destroy($image);
                }
            }
            $this->delete($product->id);
        });
    }
}
