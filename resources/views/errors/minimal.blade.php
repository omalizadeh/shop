@extends('page.layouts.app')
@section('load')
    <div class="card m-4 bg-transparent">
        <div class="card-body bg-transparent p-0">
            <div class="error p-5" style="height: auto">
                <div class="error__content p-0 center-side">
                    <h2 class="text-center">@yield('code')</h2>
                    <h3 class="text-center">
                        @yield('message')
                    </h3>
                    <p class="text-center">کارها طبق انتظار پیش نرفت!</p>
{{--                    <a href="{{ url('/') }}" class="btn btn-accent btn-pill">&larr; برگشت</a>--}}
                </div>
                <!-- / .error_content -->
            </div>
        </div>
    </div>
@endsection