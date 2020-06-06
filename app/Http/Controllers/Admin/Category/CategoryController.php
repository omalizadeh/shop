<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $articleCategories = $this->categoryRepository->allArticleCategories();
        $productCategories = $this->categoryRepository->allProductCategories();
        return view('admins.categories.index', compact('articleCategories', 'productCategories'));
    }

    public function create()
    {
        //// TODO: API CALL AFTER TYPE Selection FOR Available Parents
        //
        $categories = $this->categoryRepository->all();
        return view('admins.categories.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        if ($request->input('slug') === null) {
            $request->merge(['slug' => Str::slug($request->input('name'))]);
        }
        try {
            $this->categoryRepository->create($request->only(['name', 'slug', 'type', 'parent_id']));
            return redirect()->route('admins.categories.index')->with('success', 'دسته بندی ایجاد شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        if ($category->isProductCategory()) {
            $categories = $this->categoryRepository->allProductCategories();
        } else {
            $categories = $this->categoryRepository->allArticleCategories();
        }
        return view('admins.categories.edit', compact('categories', 'category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $this->categoryRepository->update($request->only(['name', 'slug', 'type', 'parent_id']), $category->id);
            return redirect()->route('admins.categories.index')->with('success', 'دسته بندی ویرایش شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->delete($category->id);
            return redirect()->route('admins.categories.index')->with('success', 'دسته بندی حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
