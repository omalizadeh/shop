@extends('layouts.app')

@section('title') ورود به حساب کاربری @endsection
@section('load')
<div class="page-title d-flex" aria-label="Page title"
    style="background-image: url(assets/img/page-title/shop-pattern.jpg);">
    <div class="container text-right align-self-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("index") }}">صفحه اصلی</a>
                </li>
                {{-- <li class="breadcrumb-item"><a href="{{ route("home") }}">حساب کاربری</a>
                </li> --}}
            </ol>
        </nav>
        <h1 class="page-title-heading">ورود / ثبت نام</h1>
    </div>
</div>
<div class="container mb-3">
    <div class="row">

        <div class="col-md-6 pb-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wizard-body">
                    <h3 class="h5 pb-2">ورود به حساب کاربری</h3>
                    <div class="input-group form-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i
                                    class="fe-icon-mail"></i></span></div>
                        <input id="mobile" type="text"
                            class="form-control text-left placeholder-right @error('mobile') is-invalid @enderror"
                            name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="invalid-feedback">لطفا شماره موبایل خود را وارد نمایید!</div>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i
                                    class="fe-icon-lock"></i></span></div>
                        <input id="password" dir="ltr" type="password" class="form-control" name="password" required>
                        <div class="invalid-feedback">لطفا رمز عبور معتبر را وارد کنید</div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="remember-me" type="checkbox" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember-me">مرا به خاطر بسپار</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('رمز عبور خود را فراموش کرده اید ؟') }}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="wizard-footer text-right">
                    <button class="btn btn-primary" type="submit">ورود</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 pb-5">
            <h3 class="h4 pb-1">حساب کاربری ندارید ؟ ثبت نام</h3>
            <p>ثبت نام کمتر از یک دقیقه طول می کشد اما به شما این امکان را می دهد که کنترل کامل بر سفارشات خود داشته
                باشید.</p>
            <form class="needs-validation" method="post" action="{{ route('register') }}" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-fn">نام</label>
                            <input class="form-control" type="text" name="name" required="" id="reg-fn">
                            <div class="invalid-feedback">لطفا نام خود را وارد کنید!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-ln">نام خانوادگی</label>
                            <input class="form-control" type="text" name="last_name" required="" id="reg-ln">
                            <div class="invalid-feedback">لطفا نام خانوادگی خود را وارد کنید!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-email">آدرس ایمیل</label>
                            <input class="form-control" type="email" name="email" required="" id="reg-email">
                            <div class="invalid-feedback">لطفا یک آدرس ایمیل معتبر وارد کنید!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-phone">شماره تلفن</label>
                            <input class="form-control" type="text" name="phone" required="" id="reg-phone">
                            <div class="invalid-feedback">لطفا شماره تلفن خود را وارد کنید!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-password">رمز عبور</label>
                            <input class="form-control" type="password" name="password" required="" id="reg-password">
                            <div class="invalid-feedback">لطفا رمز عبور را وارد کنید!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-password-confirm">تایید رمز عبور</label>
                            <input class="form-control" name="password_confirmation" type="password" required=""
                                id="reg-password-confirm">
                            <div class="invalid-feedback">رمزهای ورود مطابقت ندارند!</div>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <button class="btn btn-primary" type="submit">ثبت نام</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection