<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        BrandRepositoryInterface $brandRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginate(10);
        return view('admins.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->allProductCategories();
        $brands = $this->brandRepository->all();
        return view('admins.products.create', compact('categories', 'brands'));
    }

    public function store(ProductStoreRequest $request)
    {
        dd($request->all());
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }

    public function changeStatus(Product $product)
    {
        if ($product->isActive()) {
            $newStatus = false;
        } else {
            $newStatus = true;
        }
        try {
            $this->productRepository->update(['is_active' => $newStatus], $product->id);
            return redirect()->back()->with('success', 'وضعیت محصول بروز شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
