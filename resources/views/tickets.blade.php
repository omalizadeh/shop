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
                <form method="post" action="{{ route('TicketStore') }}">
                    {{ csrf_field() }}
                    <div class="form-row" >
                        <div class="col-lg-6 mt-4">
                            <label for="name"></label>
                            <input type="text" name="sender[name]" value="{{ auth()->user()->name.auth()->user()->last_name }}" disabled="" class="form-control p-3" placeholder="نام"  id="name" style="border-radius: 50px">
                        </div>
                        <div class="col-lg-6 mt-4">
                            <label for="email"></label>
                            <input type="email" name="sender[email]" class="form-control p-3" value="{{ auth()->user()->email }}" disabled="" id="email" placeholder="آدرس ایمیل"  style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mt-4">
                            <label for="phone"></label>
                            <input type="text"name="sender[phone]" class="form-control p-3" value="{{ auth()->user()->phone }}" disabled placeholder="شماره تماس"  id="phone" style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mt-4">
                            <label for="title"></label>
                            <input type="text" name="title" class="form-control p-3" placeholder="عنوان پیام" id="title" style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="text"></label>
                        <textarea id='text' style="min-height:200px;border-radius: 10px" name="text" rows="" cols="" placeholder="توضیحات پیام" class="form-control p-3"></textarea>
                        <input type="hidden" value="0" name="parent_id">
                    </div>
                    <p class="float-left" >
                        <input type="submit" class="btn btn-success" value="ارسال تیکت" data-automation-id="subscribe-submit-button">
                    </p>
                    <div class="clearfix"></div>
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
    <meta property="og:url" content="{{ route('tickets') }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection