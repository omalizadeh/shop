@extends('page.layouts.app')

@section('load')
    <!--being content-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/blog-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">درباره ما</h1>
        </div>
    </div>
    <div class="container pb-5 mb-3">
        <!-- Buy Online-->
        <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
            <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="{{ asset("view/img/pages/about-icons/01.png") }}" alt="Buy Online"></div>
            <div class="d-md-table-cell align-middle pr-md-4 pl-lg-5 text-center text-md-right">
                <h3 class="h4">پلاس دارو</h3>
                <p class="text-muted">
                    با پیشرفت فناوری و توسعه اینترنت و تجارت الکترونیک کسب و کارها ی اینترنتی به فضای مجازی راه یافتند.و به این ترتیب کسب و کارهای اینترنتی وارد بازار کاردر کلان شهرها شد و اخیرا شهر قم مانند کلان شهرهای دیگر از کسب و کار اینترنتی برخوردار است داروخانه آنلاین پلاس دارو در استان قم ازین قاعده مستثنی نیست و نسخه ی اینترنتی آن برای راحتی شما طراحی شد. 
                </p>
            </div>
        </div>
        <!-- Delivery Worldwide-->
        <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
            <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="{{ asset("view/img/pages/about-icons/02.png") }}" alt="Delivery Worldwide"></div>
            <div class="d-md-table-cell align-middle pr-md-4 pl-lg-5 text-center text-md-right">
                <h3 class="h4">داروخانه شبانه روزی دکتر امیرابراهیمی</h3>
                <p class="text-muted">
داروخانه آنلاین پلاس دارو یکی از داروخانه های معتبر در استان قم است داروخانه آنلاین پلاس دارو شامل محصولات آرایشی بهداشتی مکمل های رژیمی غذایی غذای کودک و .. میباشد. محصولات مورد نظر در داروخانه آنلاین پلاس دارو نیز به شکلی طراحی شده است که کاربران با کمترین زمان به محصول مورد نظرخود دسترسی پیدا می کنند. 
                </p>
             </div>
        </div>

        <!-- Team-->
    </div>
    <!--end content-->
@endsection

@section('title')
    درباره ما
@endsection
@section('head')
    <meta name=description content="پلاس دارو مرجع آنلاین دارو ، مکمل های ورزشی ، لوازم بهداشتی و درمانی. به صورت انلاین و مطمن خرید کنید !">
    <meta name=keywords itemprop=keywords content="درباره پلاس دارو ، داروخانه انلاین">
    <link rel=canonical href="{{ route('aboutMe') }}">
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="{{ route('aboutMe') }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection