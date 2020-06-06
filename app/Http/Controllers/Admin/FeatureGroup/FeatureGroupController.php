<?php

namespace App\Http\Controllers\Admin\FeatureGroup;

use App\FeatureGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureGroupStoreRequest;
use App\Http\Requests\FeatureGroupUpdateRequest;
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
        $featureGroups = $this->featureGroupRepository->allOrderBy('position');
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

    public function update(FeatureGroupUpdateRequest $request, FeatureGroup $feature_group)
    {
        $featureGroup = $feature_group;
        if (
            $request->input('position') === $featureGroup->getPosition() ||
            ($request->input('position') !== $featureGroup->getPosition() && $this->featureGroupRepository->findByPosition($request->input('position')) === null)
        ) {
            try {
                $this->featureGroupRepository->update($request->only(['name', 'position']), $featureGroup->id);
                return redirect()->route('admins.feature-groups.index')->with('success', 'گروه ویژگی ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        } else {
            try {
                $this->featureGroupRepository->updateAndSwapPosition($featureGroup, $request->only(['name', 'position']));
                return redirect()->route('admins.feature-groups.index')->with('success', 'گروه ویژگی ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        }
    }

    public function destroy(FeatureGroup $feature_group)
    {
        try {
            $this->featureGroupRepository->delete($feature_group->id);
            return redirect()->route('admins.feature-groups.index')->with('success', 'گروه ویژگی حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
