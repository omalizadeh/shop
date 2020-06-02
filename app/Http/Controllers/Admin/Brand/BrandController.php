<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->all();
        return view('admins.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admins.brands.create');
    }

    public function store(BrandStoreRequest $request)
    {
        if ($request->input('slug') === null) {
            $request->merge(['slug' => Str::slug($request->input('name'))]);
        }
        try {
            $this->brandRepository->create($request->only(['name', 'slug']));
            return redirect()->route('admins.brands.index')->with('success', 'برند جدید ایجاد شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('admins.brands.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        if ($request->input('slug') === null) {
            $request->merge(['slug' => Str::slug($request->input('name'))]);
        }
        try {
            $this->brandRepository->update($request->only(['name', 'slug']), $brand->id);
            return redirect()->route('admins.brands.index')->with('success', 'برند بروزرسانی شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function destroy(Brand $brand)
    {
        try {
            $this->brandRepository->delete($brand->id);
            return redirect()->route('admins.brands.index')->with('success', 'برند حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
