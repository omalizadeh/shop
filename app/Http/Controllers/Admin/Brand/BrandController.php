<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        //
    }

    public function update(Request $request, Brand $brand)
    {
        //
    }

    public function destroy(Brand $brand)
    {
        //
    }
}
