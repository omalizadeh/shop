<?php

namespace App\Http\Controllers\Admin\Carrier;

use App\Carrier;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarrierRequest;

class CarrierController extends Controller
{
    public function index()
    {
        $carriers = Carrier::all();
        return view('admins.carriers.index', compact('carriers'));
    }

    public function create()
    {
        return view('admins.carriers.create');
    }

    public function store(CarrierRequest $request)
    {
        try {
            Carrier::create($request->only(['name']));
            return redirect()->route('admins.carriers.index')->with('success', 'حامل افزوده شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function edit(Carrier $carrier)
    {
        return view('admins.carriers.edit', compact('carrier'));
    }

    public function update(CarrierRequest $request, Carrier $carrier)
    {
        try {
            $carrier->update($request->only(['name']));
            return redirect()->route('admins.carriers.index')->with('success', 'حامل ویرایش شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function destroy(Carrier $carrier)
    {
        try {
            $carrier->delete();
            return redirect()->route('admins.carriers.index')->with('success', 'حامل حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
