@extends('layouts.app')
@section('title') پنل مدیریت @endsection
@section('content')

    <!-- Page Header -->
    <div class="col-lg-12">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">بررسی</span>
                <h3 class="page-title">پروفایل کاربر</h3>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                        <div class="mb-3 mx-auto">
                            <img class="rounded-circle" src="{{ $user->avatar }}" alt="User Avatar" width="110"></div>
                        <h4 class="mb-0">{{ $user->name , $user->last_name }}</h4>
                        <span class="text-muted d-block mb-2">{{ $user->role == 'admin' ? 'مدیریت' : 'مشتری'}}</span>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-4">
                            <strong class="text-muted d-block mb-2">تاریخ عضویت</strong>
                            <span>
                                {{ jdate($user->created_at)->format('l d S F Y') }}
                                @if($user->created_at != $user->updated_at)
                                    <span class="text-danger"><small>
                                        ویرایش : {{ jdate($user->updated_at)->ago() }}
                                        </small>
                                    </span>
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">جزئیات پروفایل</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('DashboardProfileUpdate' , ['user' => $user->id]) }}" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="feFirstName">نام</label>
                                                <input type="text" class="form-control" id="feFirstName"
                                                       placeholder="نام" name="name" value="{{ $user->name }}"></div>
                                            <div class="form-group col-md-6">
                                                <label for="feLastName">فامیلی</label>
                                                <input type="text" name="last_name" class="form-control" id="feLastName"
                                                       placeholder="فامیلی" value="{{ $user->last_name }}"></div>
                                        </div>
                                        @csrf
                                        {{--{{ method_field('PUT') }}--}}
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="feEmailAddress">ایمیل</label>
                                                <input type="email" name="email" class="form-control" id="feEmailAddress"
                                                       placeholder="ایمیل" value="{{ $user->email }}"></div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">
                                                    تلفن همراه
                                                    <span class="{{ is_array($user->phone) ? 'text-danger' : 'text-success'}}">
                                                        {{ is_array($user->phone) ? 'تلفن همراه شما تایید نشده است !' : 'تلفن همراه تایید شده است' }}
                                                    </span>
                                                </label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                       value="{{ is_array($user->phone) ? $user->phone->number : $user->phone }}">
                                                {{--<button type="button" class="btn btn-sm btn-outline-success float-right" data-toggle="modal" data-target="#VerifyModal">--}}
                                                {{--ثبت تلفن همراه--}}
                                                {{--</button>--}}
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-accent float-right">بروزرسانی پروفایل</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
@endsection
@section('script')
    {{--<div id="VerifyModal" class="modal fade" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title text-right">تغییر تلفن همراه</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<label for="phone">--}}
                        {{--تلفن همراه ثبت شده در سیستم--}}
                    {{--</label>--}}
                    {{--<input type="text" disabled class="form-control" id="phone"--}}
                           {{--value="{{ is_array($user->phone) ? $user->phone->number : $user->phone }}">--}}
                    {{--<form class="mt-2">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="PHONE_NUMBER">جهت ثبت تلفن همراه جدید لطفا شماره خود را وارد کنید</label>--}}
                            {{--<input placeholder="مثال : 09191234567" autocomplete="off" type="text" class="form-control form-control-lg" max="11" min="10" name="phone" id="PHONE_NUMBER">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">بستن پنجره شناور</button>--}}
                    {{--<button type="button" onclick="Verify()" class="btn btn-success float-left">تایید</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<script>--}}
        {{--function Verify() {--}}
            {{--$.ajax({--}}

            {{--});--}}
        {{--}--}}
    {{--</script>--}}
@endsection
