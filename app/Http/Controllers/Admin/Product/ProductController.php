<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\FeatureRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;
    private $featureRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        BrandRepositoryInterface $brandRepository,
        FeatureRepositoryInterface $featureRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->featureRepository = $featureRepository;
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
        $features = $this->featureRepository->all();
        return view('admins.products.create', compact('categories', 'brands', 'features'));
    }

    public function store(ProductStoreRequest $request)
    {
        $selectedCategories = $request->input('category_ids');
        if (!in_array($request->input('default_category_id'), $selectedCategories, true)) {
            $selectedCategories += $request->input('default_category_id');
        }
        if ($request->input('slug') === null) {
            $request->merge(['slug' => Str::slug($request->input('name'))]);
        }
        $features = array_filter($request->input('features'));
        try {
            DB::transaction(function () use ($request, $selectedCategories, $features) {
                $product = $this->productRepository->create($request->only([
                    'name',
                    'description',
                    'brand_id',
                    'barcode',
                    'slug',
                    'meta_title',
                    'meta_description',
                    'insta_link',
                    'stock',
                    'price',
                    'weight'
                ]));
                $this->productRepository->syncCategories($product, $selectedCategories);
                if (sizeof($features) > 0) {
                    $this->productRepository->syncFeatures($product, self::setFeatureArray($features));
                }
                $this->productRepository->setDefaultCategory($product, $request->input('default_category_id'));
            });
            return redirect()->route('admins.products.index')->with('success', 'محصول ثبت شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->allProductCategories();
        $brands = $this->brandRepository->all();
        $features = $this->featureRepository->all();
        return view('admins.products.edit2', compact('categories', 'brands', 'features', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $selectedCategories = $request->input('category_ids');
        if (!in_array($request->input('default_category_id'), $selectedCategories, true)) {
            $selectedCategories += $request->input('default_category_id');
        }
        if ($request->input('slug') === null) {
            $request->merge(['slug' => Str::slug($request->input('name'))]);
        }
        $features = array_filter($request->input('features'));
        try {
            DB::transaction(function () use ($request, $selectedCategories, $features, $product) {
                $this->productRepository->update($request->only([
                    'name',
                    'description',
                    'brand_id',
                    'barcode',
                    'slug',
                    'meta_title',
                    'meta_description',
                    'insta_link',
                    'stock',
                    'price',
                    'weight'
                ]), $product->id);
                $this->productRepository->syncCategories($product, $selectedCategories);
                if (sizeof($features) > 0) {
                    $this->productRepository->syncFeatures($product, self::setFeatureArray($features));
                }
                $this->productRepository->setDefaultCategory($product, $request->input('default_category_id'));
            });
            return redirect()->route('admins.products.index')->with('success', 'محصول بروزرسانی شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
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

    public static function setFeatureArray(array $features)
    {
        $data = array();
        foreach ($features as $key => $value) {
            $data += [(int) $key => ['value' => $value]];
        }
        return $data;
    }
}
