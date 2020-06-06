@extends('admins.layouts.app')
@section('title')
دسته بندی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">افزودن دسته بندی
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.categories.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام دسته بندی</label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="slug">نامک (سئو)</label>
                                    <input type="text" class="form-control" value="{{old('slug')}}" name="slug">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="type">نوع</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">انتخاب...</option>
                                        <option value="0">مطالب</option>
                                        <option value="1">محصولات</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="parent_id">دسته بندی مادر</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">انتخاب...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->getName()}}</option>
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