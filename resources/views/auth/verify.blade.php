@extends('layouts.gust)
@section('title') فعال سازی حساب کاربری @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('احراز هویت شناسه کاربری') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('پیوند تأیید تازه به آدرس ایمیل شما ارسال شده است.') }}
                        </div>
                    @endif

                    {{ __('قبل از ادامه، لطفا ایمیل خود را برای پیوند تأیید بررسی کنید.') }}
                    {{ __('اگر ایمیل دریافت نکردید') }}, <a href="{{ route('verification.resend') }}">{{ __('برای درخواست دیگری اینجا را کلیک کنید') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
