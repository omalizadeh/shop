@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش مقدار
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.attributes.update',$attribute->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="value">مقدار</label>
                                    <input type="text" class="form-control" value="{{$attribute->getValue()}}"
                                        name="value" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="attribute_group_id">گروه ترکیبات</label>
                                    <select name="attribute_group_id" class="form-control">
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}" @if($group->id ===
                                            $attribute->getAttributeGroupId()) selected @endif>{{$group->getName()}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="color">رنگ (برای ترکیبات رنگ)</label>
                                    <input type="color" class="form-control" name="color"
                                        value="{{$attribute->getColor()}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">بروزرسانی</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection