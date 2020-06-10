<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeUpdateRequest;
use App\Repositories\Interfaces\AttributeGroupRepositoryInterface;
use App\Repositories\Interfaces\AttributeRepositoryInterface;

class AttributeController extends Controller
{
    private $attributeRepository;
    private $attributeGroupRepository;

    public function __construct(
        AttributeRepositoryInterface $attributeRepository,
        AttributeGroupRepositoryInterface $attributeGroupRepository
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->attributeGroupRepository = $attributeGroupRepository;
    }

    public function edit(Attribute $attribute)
    {
        $groups = $this->attributeGroupRepository->all();
        return view('admins.attributes.edit', compact('groups', 'attribute'));
    }

    public function update(AttributeUpdateRequest $request, Attribute $attribute)
    {
        if ($request->input('attribute_group_id') !== $attribute->getAttributeGroupId()) {
            $newAttributeGroup = $this->attributeGroupRepository->findById($request->input('attribute_group_id'));
            if (!$newAttributeGroup->isColor()) {
                $request->merge(['color' => null]);
            } else {
                $request->validate(['color' => 'required|regex:/#[a-fA-F0-9]{6}/']);
            }
        }
        try {
            $this->attributeRepository->update($request->only(['attribute_group_id', 'value', 'color']), $attribute->id);
            return redirect()->route('admins.attribute-groups.show', $request->input('attribute_group_id'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }

    public function destroy(Attribute $attribute)
    {
        try {
            $this->attributeRepository->delete($attribute->id);
            return redirect()->back()->with('success', 'مقدار حذف شد.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', $ex->getMessage());
        }
    }
}
