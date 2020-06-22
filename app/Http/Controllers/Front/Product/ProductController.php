<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\FeatureGroupRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;
    private $brandRepository;
    private $categoryRepository;
    private $featureGroupRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository,
        FeatureGroupRepositoryInterface $featureGroupRepository
    ) {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->featureGroupRepository = $featureGroupRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginateActive(20);
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->allProductCategories();
        return view('products', compact('products', 'brands', 'categories'));
    }

    public function show(Product $product)
    {
        if (!$product->isActive()) {
            abort(404);
        }
        $featureGroups = $this->featureGroupRepository->allOrderBy('position');
        return view('product', compact('product', 'featureGroups'));
    }
}
