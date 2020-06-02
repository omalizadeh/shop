<?php

namespace App\Http\Controllers\Admin\FeatureGroup;

use App\FeatureGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureGroupRequest;
use App\Http\Requests\FeatureGroupStoreRequest;
use App\Repositories\Interfaces\FeatureGroupRepositoryInterface;

class FeatureGroupController extends Controller
{
    private $featureGroupRepository;

    public function __construct(FeatureGroupRepositoryInterface $featureGroupRepository)
    {
        $this->featureGroupRepository = $featureGroupRepository;
    }

    public function index()
    {
        $featureGroups = $this->featureGroupRepository->all();
        return view('admins.feature_groups.index', compact('featureGroups'));
    }

    public function create()
    {
        return view('admins.feature_groups.create');
    }

    public function store(FeatureGroupStoreRequest $request)
    {
        $request->merge(['position' => $this->featureGroupRepository->nextPosition()]);
        try {
            $this->featureGroupRepository->create($request->only(['name', 'position']));
            return redirect()->route('admins.feature-groups.index')->with('success', 'گروه ویژگی ایجاد شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(FeatureGroup $featureGroup)
    {
        //
    }

    public function edit(FeatureGroup $feature_group)
    {
        return view('admins.feature_groups.edit', ['group' => $feature_group]);
    }

    public function update(FeatureGroupRequest $request, FeatureGroup $featureGroup)
    {
        dd($request->all());
    }

    public function destroy(FeatureGroup $featureGroup)
    {
        //
    }
}
