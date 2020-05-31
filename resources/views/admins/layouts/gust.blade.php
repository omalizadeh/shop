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
    <meta name="google-site-verification" content="RxO2_HK3sEDsk-FWhWCNRdpShQ9oRQd-IIjc0d1h-D8" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142589929-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-142589929-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PXK28BC');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="h-100">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXK28BC"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="container-fluid">
    <div class="row">
        <header class="col-lg-12 col-md-12 col-sm-12 p-0">
            @include('layouts.navbar')
        </header>
        <main class="main-content col-lg-12 col-md-12 col-sm-12 p-5">
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('asset/scripts/popper.min.js') }}"></script>
<script src="{{ asset('asset/scripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/scripts/Chart.min.js') }}"></script>
<script src="{{ asset('asset/scripts/shards.min.js') }}"></script>
<script src="{{ asset('asset/scripts/jquery.sharrre.min.js') }}"></script>

<script src="{{ asset('asset/scripts/extras.1.1.0.min.js') }}"></script>
<script src="{{ asset('asset/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
<script src="{{ asset('asset/scripts/app/app-blog-overview.1.1.0.js') }}"></script>
</body>
</html>
