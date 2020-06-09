@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش گروه
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admins.attribute-groups.update',$group->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">نام گروه</label>
                                    <input type="text" class="form-control" value="{{$group->getName()}}" name="name"
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
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="position">موقعیت</label>
                                    <input type="number" min="1" class="form-control" value="{{$group->getPosition()}}"
                                        name="position">
                                    <div class="alert alert-warning mt-1">در صورت اشغال بودن موقعیت جدید، دو گروه با هم
                                        جابه
                                        جا
                                        خواهند شد.</div>
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