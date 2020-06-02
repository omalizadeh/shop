@extends('admins.layouts.app')
@section('title')
برندها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش برند
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.brands.update',$brand->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام برند</label>
                                    <input type="text" class="form-control" value="{{$brand->getName()}}" name="name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="slug">نامک (انگلیسی)</label>
                                    <input type="text" class="form-control" value="{{$brand->getSlug()}}" name="slug">
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