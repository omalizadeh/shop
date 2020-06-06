<?php

namespace App\Http\Controllers\Admin\Feature;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureStoreRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Repositories\Interfaces\FeatureGroupRepositoryInterface;
use App\Repositories\Interfaces\FeatureRepositoryInterface;

class FeatureController extends Controller
{
    private $featureRepository;
    private $featureGroupRepository;

    public function __construct(
        FeatureRepositoryInterface $featureRepository,
        FeatureGroupRepositoryInterface $featureGroupRepository
    ) {
        $this->featureGroupRepository = $featureGroupRepository;
        $this->featureRepository = $featureRepository;
    }

    public function index()
    {
        $features = $this->featureRepository->allOrderBy('position');
        return view('admins.features.index', compact('features'));
    }

    public function create()
    {
        $groups = $this->featureGroupRepository->allOrderBy('position');
        return view('admins.features.create', compact('groups'));
    }

    public function store(FeatureStoreRequest $request)
    {
        $request->merge(['position' => $this->featureRepository->nextPosition()]);
        try {
            $this->featureRepository->create($request->only(['feature_group_id', 'name', 'position']));
            return redirect()->route('admins.features.index')->with('success', 'ویژگی ایجاد شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function show(Feature $feature)
    {
        //
    }

    public function edit(Feature $feature)
    {
        $groups = $this->featureGroupRepository->allOrderBy('position');
        return view('admins.features.edit', compact('groups', 'feature'));
    }

    public function update(FeatureUpdateRequest $request, Feature $feature)
    {
        if (
            $request->input('position') === $feature->getPosition() ||
            ($request->input('position') !== $feature->getPosition() && $this->featureRepository->findByPosition($request->input('position')) === null)
        ) {
            try {
                $this->featureRepository->update($request->only(['feature_group_id', 'name', 'position']), $feature->id);
                return redirect()->route('admins.features.index')->with('success', 'ویژگی ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        } else {
            try {
                $this->featureRepository->updateAndSwapPosition($feature, $request->only(['feature_group_id', 'name', 'position']));
                return redirect()->route('admins.features.index')->with('success', 'ویژگی ویرایش شد.');
            } catch (\Exception $ex) {
                return redirect()->back()->with('fail', $ex->getMessage());
            }
        }
    }

    public function destroy(Feature $feature)
    {
        try {
            $this->featureRepository->delete($feature->id);
            return redirect()->route('admins.features.index')->with('success', 'ویژگی حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
