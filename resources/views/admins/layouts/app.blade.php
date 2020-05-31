<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        پلاس دارو -
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/styles/bootstrap.min.css') }}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
        href="{{ asset('asset/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/styles/extras.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/styles/rtl.css') }}">
    <script async defer src="{{ asset('asset/scripts/buttons.js') }}"></script>
    <script async defer src="{{ asset('asset/node_modules/datepicker/persian-datepicker.min.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/styles/rtl.css') }}">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <style>
        .iziToast-buttons {
            direction: rtl !important;
            float: left !important;
            text-align: justify !important;
            font-family: "Vazir FD", serif !important;
        }

        .iziToast-texts {
            direction: rtl !important;
            text-align: justify !important;
            font-family: "Vazir FD", serif !important;
        }
    </style>
</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            {{-- @if(auth()->check()) --}}
            @include('admins.layouts.sidebar')
            {{-- @endif --}}

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                @include('admins.layouts.navbar')
                <div class="container p-3">
                    <div class="row justify-content-center">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="promo-popup animated">
        <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg">
        <div class="pp-intro-bar"> نیاز به پشتیبانی دارید ؟
            <span class="close">
                <i class="material-icons">close</i>
            </span>
            <span class="up">
                <i class="material-icons">keyboard_arrow_up</i>
            </span>
        </div>
        <div class="pp-inner-content">
            <h2>پشتیبانی</h2>
            <p>کارشناسان جهان آنلاین آماده اراعه خدمات و پشتیبانی میباشند</p>
            <span class="pp-cta extra-action text-justify">02532857853</span>
        </div>
    </div>

    <script src="{{ asset('asset/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/popper.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/Chart.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/shards.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('asset/node_modules/datepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('asset/node_modules/datepicker/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/app/app-blog-overview.1.1.0.js') }}"></script>
    @yield('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>
    @if($errors)
    <script>
        $(document).ready(function () {
            @forelse($errors->all() as $error)
                    iziToast.info({
                        message: '{{ $error }}'
                    });
                @empty
            @endforelse
        });
    </script>
    @endif
    <script>
        function alert(text) {
        iziToast.success({
            title: text,
            timeout: 30000,
            direction: 'rtl',
            message: 'توجه !',
            position: 'bottomCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
        });
    }
    function WarningTost(message,callback) {
        iziToast.show({
            theme: 'warning',
            title: 'توجه !',
            timeout: 30000,
            direction: 'rtl',
            message: message,
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
                ['<button class="btn btn-primary">تایید</button>', function (instance, toast) {
                callback();
                instance.hide({
                        transitionOut: 'fadeOutUp',
                    }, toast, 'buttonName');
                }, true], // true to focus
                ['<button class="btn btn-info">لفو</button>', function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp',
                    }, toast, 'buttonName');
                }]
            ],
        });
    }
    </script>

</body>

</html>