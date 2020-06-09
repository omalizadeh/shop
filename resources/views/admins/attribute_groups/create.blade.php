@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">افزودن گروه
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.attribute-groups.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام گروه</label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="name">نوع</label>
                                    <select name="type" class="form-control">
                                        <option value="1">لیست کشویی</option>
                                        <option value="2">رنگ</option>
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