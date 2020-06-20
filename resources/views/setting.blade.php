@extends('page.layouts.app')
@section('load')
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">ناحیه کاربری</h1>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                @include("page.option.sidebar-home")
            </div>
            <!-- Orders Table-->
            <div class="col-lg-8 pb-5">
                <form>
                    <div class="form-row">
                        <div class="col-lg-11 mt-4 mr-4" >
                            <label for="f_name">نام</label>
                            <input type="text" id="f_name" name="name" value="{{ auth()->user()->name }}" class="form-control p-1" placeholder="نام">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 mt-4 mr-4" >
                            <label for="l_name">نام خانوادگی</label>
                            <input type="text" name="last_name" id="l_name" class="form-control p-1" value="{{ auth()->user()->last_name }}" placeholder="نام خانوادگی">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 mt-4 mr-4" >
                            <label for="password">رمز عبور</label>
                            <input type="password" id="password" class="form-control p-1" value="12345678" disabled="" placeholder="رمز عبور">
                            <small><button href="#password" type="button" class="btn btn-sm btn-warning float-left">تغییر رمز عبور</button></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 mt-4 mr-4" >
                            <label for="phone">شماره تلفن همراه</label>
                            <input type="number" id="phone" value="{{ auth()->user()->phone }}" disabled class="form-control p-1" placeholder="شماره تلفن">
                            <small><button href="phone" type="button" class="btn btn-sm btn-info float-left">تغییر تلفن همراه</button></small>
                        </div>
                    </div>
                    @csrf
                    <hr class="mt-2"/>
                    <button type="submit" class="btn btn-dark col-lg-12">ویرایش</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('title')
    داشبرد مدیریت
@endsection
@section('head')
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="{{ route('settingPage') }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection
