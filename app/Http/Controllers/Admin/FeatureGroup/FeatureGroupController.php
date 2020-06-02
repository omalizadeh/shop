<?php

namespace App\Http\Controllers\Admin\FeatureGroup;

use App\FeatureGroup;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FeatureGroupRepositoryInterface;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeatureGroup  $featureGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FeatureGroup $featureGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeatureGroup  $featureGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FeatureGroup $featureGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeatureGroup  $featureGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeatureGroup $featureGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeatureGroup  $featureGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeatureGroup $featureGroup)
    {
        //
    }
}
