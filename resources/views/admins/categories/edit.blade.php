@extends('admins.layouts.app')
@section('title')
دسته بندی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش دسته بندی
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.categories.update',$category->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام دسته بندی</label>
                                    <input type="text" class="form-control" value="{{$category->getName()}}" name="name"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="slug">نامک (سئو)</label>
                                    <input type="text" class="form-control" value="{{$category->getSlug()}}" name="slug"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="parent_id">دسته بندی مادر</label>
                                    <select name="parent_id" class="form-control" required>
                                        <option value="">انتخاب...</option>
                                        @foreach ($categories as $parentCategory)
                                        <option value="{{$parentCategory->id}}" @if($parentCategory->id ===
                                            $category->getParentId()) selected @endif>{{$parentCategory->getName()}}
                                        </option>
                                        @endforeach
                                    </select>
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