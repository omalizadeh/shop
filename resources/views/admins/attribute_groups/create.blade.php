@extends('admins.layouts.app')
@section('title')
گروه ویژگی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">افزودن گروه ویژگی
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.feature-groups.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="name">نام گروه</label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                        required>
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