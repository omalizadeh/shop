@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">افزودن مقدار | {{$group->getName()}}
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.attribute-groups.store_attribute',$group->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="value">مقدار</label>
                                    <input type="text" class="form-control" value="{{old('value')}}" name="value"
                                        required>
                                </div>
                                @if($group->isColor())
                                <div class="form-group col-lg-6">
                                    <label for="color">نوع</label>
                                    <input type="color" class="form-control" name="color">
                                </div>
                                @endif
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