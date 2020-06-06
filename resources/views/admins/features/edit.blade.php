@extends('admins.layouts.app')
@section('title')
ویژگی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش ویژگی
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.features.update',$feature->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام ویژگی</label>
                                    <input type="text" class="form-control" value="{{$feature->getName()}}" name="name"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="feature_group">گروه</label>
                                    <select name="feature_group_id" class="form-control" required>
                                        <option value="">انتخاب...</option>
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}" @if($feature->getFeatureGroupId() == $group->id)
                                            selected @endif>{{$group->getName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="position">موقعیت</label>
                                    <input type="number" min="1" class="form-control"
                                        value="{{$feature->getPosition()}}" name="position">
                                    <div class="alert alert-warning mt-1">در صورت اشغال بودن موقعیت جدید، دو ویژگی با هم
                                        جابه
                                        جا
                                        خواهند شد.</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ویرایش</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection