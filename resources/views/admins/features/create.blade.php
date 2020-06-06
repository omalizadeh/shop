@extends('admins.layouts.app')
@section('title')
ویژگی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">افزودن ویژگی
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.features.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام ویژگی</label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="feature_group">گروه</label>
                                    <select name="feature_group_id" class="form-control" required>
                                        <option value="">انتخاب...</option>
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->getName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ایجاد</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection