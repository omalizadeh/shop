@extends('admins.layouts.app')
@section('title')
کاربران
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویرایش کاربر
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning">پر کردن موارد ستاره دار * الزامی است.</div>
                        <form action="{{route('admins.users.update',$user->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="first_name">نام *</label>
                                    <input type="text" class="form-control" value="{{$user->getFirstName()}}"
                                        name="first_name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="last_name">نام خانوادگی *</label>
                                    <input type="text" class="form-control" value="{{$user->getLastName()}}"
                                        name="last_name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="national_id">کد ملی</label>
                                    <input type="text" class="form-control" value="{{$user->getNationalId()}}"
                                        name="national_id">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="birth_date">تاریخ تولد</label>
                                    <input type="text" class="form-control" value="{{$user->getBirthDate()}}"
                                        name="birth_date">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="mobile">تلفن همراه *</label>
                                    <input type="text" class="form-control" value="{{$user->getMobile()}}" name="mobile"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="gender">جنسیت</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="1">نامشخص</option>
                                        <option value="2" @if($user->isMale()) selected @endif>مرد</option>
                                        <option value="3" @if($user->isFemale()) selected @endif>زن</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="role_id">نقش کاربری *</label>
                                    <select name="role_id" class="form-control" required>
                                        <option value="">انتخاب...</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if($user->hasRole($role->getName())) selected
                                            @endif>{{$role->getFarsiName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="password">رمز عبور *</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password_confirmation">تایید رمز عبور *</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ثبت نام</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection