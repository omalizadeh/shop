<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="fa-IR">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head profile="http://gmpg.org/xfn/11">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>@yield('title') | پلاس دارو </title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- Favicon and Touch Icons-->
    {{--    <link href="favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">--}}
    {{--    <link href="favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">--}}
    <meta content="#603cba" name="msapplication-TileColor">
    <meta content="#ffffff" name="theme-color">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link href="{{ asset("assets/css/feather.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/iziToast.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/fancybox.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/noUISlider.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/socicon.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/feather.css") }}" rel="stylesheet">
    <!-- Main Theme Styles + Bootstrap-->
    <link href="{{ asset("assets/css/theme.css") }}" media="screen" rel="stylesheet">
    <!-- Modernizr-->
    <script src="{{ asset("assets/js/modernizr.min.js") }}"></script>
    <meta name="google" content="nositelinkssearchbox" />

    @yield('head')
    <meta name="google-site-verification" content="RxO2_HK3sEDsk-FWhWCNRdpShQ9oRQd-IIjc0d1h-D8" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142589929-1"></script>--}}
    {{--    <script>--}}
    {{--        window.dataLayer = window.dataLayer || [];--}}
    {{--        function gtag(){dataLayer.push(arguments);}--}}
    {{--        gtag('js', new Date());--}}

    {{--        gtag('config', 'UA-142589929-1');--}}
    {{--    </script>--}}
    <!-- Google Tag Manager -->
    {{--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
    {{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
    {{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
    {{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
    {{--        })(window,document,'script','dataLayer','GTM-PXK28BC');</script>--}}
    <!-- End Google Tag Manager -->
</head>

<body style="padding-top: 0px;">
    <!-- Google Tag Manager (noscript) -->
    {{--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXK28BC"--}}
    {{--                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>--}}
    <div class="wrapper">
        <!-- Off-Canvas Menu-->
        <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu"><span
                class="offcanvas-close"><i class="fe-icon-x"></i></span>
            <div class="px-4 pb-4">
                <h6>منو</h6>
                <div class="d-flex justify-content-between pt-2">
                    <div class="btn-group w-100 ml-2">
                        @if(auth()->guest())
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route("login") }}"><i
                                class="fe-icon-user"></i>&nbsp;ورود</a>
                        @else
                        <a class="btn btn-primary btn-sm" href="{{ route('home') }}"><i
                                class="fe-icon-user"></i>&nbsp;ناحیه کاربری</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('LogoutPage') }}"><i
                                class="fe-icon-user"></i>&nbsp;خروج</a>

                        @endif
                    </div>
                </div>
            </div>
            <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
                <!-- Mobile Menu-->
                <div class="accordion mobile-menu" id="accordion-menu">
                    <!-- Home-->

                    <div class="card">
                        <div class="card-header">
                            <a class="mobile-menu-link active" href="{{  route("index") }}">صفحه اصلی</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="mobile-menu-link active" href="{{ route("articles.index") }}">اخبار و مقالات</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="mobile-menu-link active" href="{{ route("products.index") }}">فروشگاه</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="mobile-menu-link active" href="#">ارتباط با ما</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="mobile-menu-link active" href="#">درباره ما</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="offcanvas-footer px-4 pt-3 pb-2 text-center"><a class="social-btn sb-style-3 sb-twitter"
                    href="{{  route("index") }}#"><i class="socicon-twitter"></i></a><a
                    class="social-btn sb-style-3 sb-facebook" href="{{  route("index") }}#"><i
                        class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest"
                    href="{{  route("index") }}#"><i class="socicon-pinterest"></i></a><a
                    class="social-btn sb-style-3 sb-instagram" href="{{  route("index") }}#"><i
                        class="socicon-instagram"></i></a>
            </div>
        </div>
        <!-- Navbar: Default-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="navbar-wrapper navbar-sticky">
            <div class="d-table-cell align-middle pl-md-3"><a class="navbar-brand ml-1"
                    href="{{  route("index") }}"><img alt="پلاس دارو" src="{{ asset("assets/img/logo-dark.png") }}"></a>
            </div>
            <div class="d-table-cell w-100 align-middle pl-md-3">
                <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
                    <div><a class="navbar-link ml-3" href="tel:+982537779885"><i
                                class="fe-icon-phone"></i>025-37779885</a><a class="navbar-link ml-3"
                            href="mailto:support@example.com"><i class="fe-icon-mail"></i>info@plusdaru.com</a><a
                            class="social-btn sb-style-3 sb-twitter" href="{{  route("index") }}#"><i
                                class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook"
                            href="{{  route("index") }}#"><i class="socicon-facebook"></i></a><a
                            class="social-btn sb-style-3 sb-pinterest" href="{{  route("index") }}#"><i
                                class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram"
                            href="{{  route("index") }}#"><i class="socicon-instagram"></i></a></div>
                    <div>
                        <ul class="list-inline mb-0">
                            @if(auth()->guest())
                            <li class="dropdown-toggle mr-2"><a class="navbar-link" href="{{ route("login") }}"><i
                                        class="fe-icon-user"></i>ورود یا ایجاد حساب کاربری</a>
                                <div class="dropdown-menu left-aligned p-3 text-center" style="min-width: 200px;">
                                    <p class="text-sm opacity-70">به حساب خود وارد شوید یا ثبت نام کنید تا بتوانید کنترل
                                        کامل سفارشات خود را دریافت کنید، پاداش ها و موارد دیگر را دریافت کنید.</p><a
                                        class="btn btn-primary btn-sm btn-block" href="{{ route("login") }}">ورود</a>
                                </div>
                            </li>
                            @else
                            <li class="dropdown-toggle mr-2"><a class="navbar-link" href="{{ route("index") }}"><i
                                        class="fe-icon-user"></i>{{ "ناحیه کاربری" }}</a>
                                <div class="dropdown-menu left-aligned p-3 text-center" style="min-width: 200px;">
                                    <p class="text-sm opacity-70">
                                        {{ auth()->user()->name.' '.auth()->user()->last_name }}

                                    </p>
                                    <a class="btn btn-warning btn-sm btn-block"
                                        href="{{ route('LogoutPage') }}">خروج</a>
                                </div>
                            </li>
                            @endif
                            <li class="dropdown-toggle"><a class="navbar-link" href="{{  route("index") }}#"><img
                                        alt="English" src="{{ asset("assets/img/ir.png") }}">فارسی / تومان</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="navbar justify-content-end justify-content-lg-between">
                    <!-- Search-->
                    <form class="search-box" action="#" method="get">
                        <input id="site-search" name="q" placeholder="جستجو کنید.دنبال چی هستید؟" type="text"><span
                            class="search-close"><i class="fe-icon-x"></i></span>
                    </form>
                    <!-- Main Menu-->
                    <ul class="navbar-nav d-none d-lg-block">
                        <!-- Home-->
                        <li class="nav-item mega-dropdown-toggle active"><a class="nav-link"
                                href="{{ route("index") }}">صفحه اصلی</a> </li>

                        <!-- Blog-->
                        <li class="nav-item"><a class="nav-link" href="{{ route("articles.index") }}">اخبار و مقالات</a>
                        </li>
                        <!-- Shop-->
                        <li class="nav-item"><a class="nav-link" href="{{ route("products.index") }}">فروشگاه</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">ارتباط با ما</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">درباره ما</a></li>
                    </ul>
                    <div>
                        <ul class="navbar-buttons d-inline-block align-middle mr-lg-2">
                            <li class="d-block d-lg-none"><a data-toggle="offcanvas" class="p-2" href="#mobile-menu"><i
                                        class="fe-icon-menu"></i></a></li>
                            <li><a data-toggle="search" class="p-2" href="#"><i class="fe-icon-search"></i></a></li>
                            <li><a data-toggle="offcanvas" class="p-2" href="{{ url("cart") }}"><i
                                        class="fe-icon-shopping-cart"></i></a><span class="badge badge-danger"
                                    id="CartBadge"></span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        @yield('load')


        @yield('script')
        <!-- Footer-->
        <footer class="bg-dark pt-5">
            <!-- Second Row-->
            <div class="pt-5" style="background-color: #30363d;">
                <div class="container">
                    <div class="row">
                        <!-- Contacts-->
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget-contacts widget-light-skin mb-4">
                                <h4 class="widget-title">با ما در تماس باشید</h4>
                                <ul>
                                    <li><i class="fe-icon-map-pin"></i><span>ما رو پیدا کن</span><a
                                            href="https://goo.gl/maps/hgA8iywugmMhE7vT7">ایران - قم بلوار ۱۵ خرداد روبه
                                            رو دانشگاه قران </a></li>
                                    <li><i class="fe-icon-phone"></i><span>با ما تماس بگیرید</span><a
                                            href="tel:02111111111">025-3777-6012</a></li>
                                    <li><i class="fe-icon-mail"></i><span>ایمیل</span><a
                                            href="mailto:info@plusdaru.com">info@plusdaru.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile App-->
                        <div class="col-lg-3 col-sm-6 disabled">
                            <div class="widget widget-light-skin">
                                <h4 class="widget-title">برنامه موبایل ما</h4><a
                                    class="market-btn apple-btn market-btn-light-skin ml-3 mb-3 disabled"
                                    href="{{  route("index") }}#"><span class="mb-subtitle">Download on the</span><span
                                        class="mb-title">App Store</span></a><a
                                    class="market-btn google-btn market-btn-light-skin ml-3 mb-3 disabled"
                                    href="{{  route("index") }}#"><span class="mb-subtitle">Download on the</span><span
                                        class="mb-title">Google Play</span></a><a
                                    class="market-btn windows-btn market-btn-light-skin ml-3 mb-3 disabled"
                                    href="{{  route("index") }}#"><span class="mb-subtitle">Download on the</span><span
                                        class="mb-title">Windows Store</span></a>
                            </div>
                        </div>
                        <!-- Subscription-->
                        <div class="col-lg-6">
                            <div class="widget widget-light-skin">
                                <h4 class="widget-title">خبرنامه</h4>
                                <form action="{{  route("index") }}" method="post" novalidate="" target="_blank">
                                    <div class="input-group">
                                        <input class="form-control form-control-light-skin text-left placeholder-right"
                                            name="EMAIL" placeholder="آدرس ایمیل" type="email">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">ثبت نام</button>
                                        </div>
                                    </div>
                                    <small class="form-text text-white opacity-50 pt-1">برای دریافت آخرین بروز رسانی ها
                                        و
                                        محصولات جدید ایمیل خود را وارد نمایید.
                                    </small>
                                </form>
                                <div class="pt-4 mt-2"><img alt="PlusDaru" class="d-block"
                                        src="{{ asset("assets/img/credit-cards-footer.png") }}" style="width: 324px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-light">
                    <div class="d-md-flex justify-content-between align-items-center py-4 text-center text-md-left">
                        <div class="order-2"><a class="footer-link text-white" href="{{  route("index") }}#">درباره
                                ما</a><a class="footer-link text-white mr-3" href="{{  route("index") }}#">کمک و
                                اطلاعات</a><a class="footer-link text-white mr-3" href="{{  route("index") }}#">حریم
                                خصوصی</a></div>
                        <p class="m-0 text-sm text-white order-1"><span class="opacity-60">همه حقوق محفوظ به داروخانه
                                داروخانه شبانه روزی دکتر امیرابراهیمی میباشد.© طراحی و توسعه </span>
                            <i class="d-inline-block align-middle fe-icon-heart text-danger"></i> <a
                                class="d-inline-block nav-link text-white opacity-60 p-0"
                                href="https://www.jahaneonline.com/" target="_blank">جهان آنلاین</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <span class="scroll-to-top-btn">
        <i class="fe-icon-chevron-up"></i>
    </span>
    <div class="site-backdrop"></div>
    <script type="text/javascript">
    function alert(text) {
        iziToast.success({
            title: "توجه !",
            timeout: 30000,
            direction: 'rtl',
            message: text,
            position: 'bottomCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
        });
    }
    function danger(text) {
        iziToast.info({
            title: "توجه !",
            timeout: 30000,
            direction: 'rtl',
            message: text,
            position: 'bottomCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
        });
    }
    </script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/popper.min.js") }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="{{ asset("assets/js/imagesloaded.min.js") }}"></script>
    <script src="{{ asset("assets/js/isotope.min.js") }}"></script>
    <script src="{{ asset("assets/js/iziToast.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.animateNumber.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.countdown.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.fancybox.min.js") }}"></script>
    <script src="{{ asset("assets/js/nouislider.min.js") }}"></script>
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/theme.js") }}"></script>
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

</body>

</html>