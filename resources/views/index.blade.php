@extends('layouts.app')

@section('load')
<section class="featured-posts-slider d-lg-flex">
    <div class="column">
        <div class="owl-carousel post-preview-img-carousel owl-rtl owl-loaded"
            data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;mouseDrag&quot;: false, &quot;touchDrag&quot;: false, &quot;pullDrag&quot;: false }">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(2698px, 0px, 0px); transition: all 0.35s ease 0s; width: 4722px;">
                    {{-- @forelse($slider as $slide)

                    <div class="owl-item cloned" style="width: 674.5px;">
                        <a class="post-preview-img" href="{{ $slide->url }}"
                    style="background-image: url({{ $slide->image }});"></a>
                </div>
                @empty
                @endforelse --}}
            </div>
        </div>
        <div class="owl-nav disabled">
            <button class="owl-prev" role="presentation" type="button"></button>
            <button class="owl-next" role="presentation" type="button"></button>
        </div>
        <div class="owl-dots disabled"></div>
    </div>
    </div>

    <div class="column">
        <div class="owl-carousel post-cards-carousel owl-rtl owl-loaded owl-drag"
            data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoHeight&quot;: true }">


            <div class="owl-stage-outer owl-height" style="height: 372px;">
                <div class="owl-stage"
                    style="transform: translate3d(2458px, 0px, 0px); transition: all 0.45s ease 0s; width: 4302px;">
                    {{-- @forelse($slider as $slide)
                    <div class="owl-item " style="width: 614.5px;">
                        <div class="card-body">
                            <h2 class="block-title pb-4 mb-3">{{ $slide->text }}</h2>
                    <p class="lead text-muted pb-3">{{ $slide->title }}</p>
                    <a class="btn btn-style-5 btn-primary" href="{{ $slide->url }}">ادامه&nbsp;<i
                            class="fe-icon-arrow-left"></i>
                    </a>
                </div>
            </div>
            @empty

            @endforelse --}}
        </div>
    </div>
    <div class="owl-nav">
        <button class="owl-prev" role="presentation" type="button"></button>
        <button class="owl-next" role="presentation" type="button"></button>
    </div>
    <div class="owl-dots disabled"></div>
    </div>
    </div>
</section>
<!-- Featured Products-->
<section class="container pt-5 pb-4 mt-5">
    <h2 class="h4 block-title text-center pt-4 mt-2">محصولات پرفروش</h2>
    <div class="row">
        {{-- @forelse($products as $product)
        @if($loop->index > 2)
        @break
        @endif
        <div class="col-lg-4 mt-2 col-md-6 grid-item branding mb-30">
            <div class="portfolio-card">
                <a class="portfolio-thumb" href="{{ $product->url }}">
        <span class="badge badge-primary text-md p-2 font-weight-normal m-0 col-6">
            {{ $product->price == null || $product->status == 'catalog' ?  'قیمت درج نشده است' :  number_format($product->price->amount) .' هزار تومان ' }}
        </span>
        <img src="{{ $product->image }}" alt="{{ $product->title }}">
        </a>
        <div class="portfolio-card-body">
            <h5 class="portfolio-title max-lines">
                <a title="ادامه {{ $product->title }} " href="{{ $product->url }}">{{ $product->title }}</a>
            </h5>
        </div>
    </div>
    </div>
    @empty

    @endforelse --}}
    </div>
    <!--<div class="text-center"><a class="btn btn-style-5 btn-primary" href="shop-categories.html">مشاهده همه</a></div>-->
</section>
<style>
    .max-lines {
        display: block;
        /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }
</style>
<!-- Top Categories-->
<section class="container-fluid pt-1">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 mb-30">
            <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">پیشنهاد
                    محدود</span>
                <div class="text-center pt-4">
                    <h3 class="font-family-body font-weight-light mb-2">محصولات جدید</h3>
                    <h2 class="mb-2 pb-1">مکمل ورزشی هَی دَی</h2>
                    <h5 class="font-family-body font-weight-light mb-5">قیمت با تخفیف. عجله کن!</h5>
                    <div class="countdown countdown-style-2 h4 mb-3 direction-ltr" data-date-time="10/10/2019 12:00"
                        data-labels="{&quot;label-day&quot;: &quot;روز&quot;, &quot;label-hour&quot;: &quot;ساعت&quot;, &quot;label-minute&quot;: &quot;دقیقه&quot;, &quot;label-second&quot;: &quot;ثانیه&quot;}">
                        <div class="countdown-item">
                            <div class="countdown-value">440</div>
                            <div class="countdown-label">روز</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value">23</div>
                            <div class="countdown-label">ساعت</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value">50</div>
                            <div class="countdown-label">دقیقه</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value">01</div>
                            <div class="countdown-label">ثانیه</div>
                        </div>
                    </div>
                    <br><a class="btn btn-style-5 btn-gradient mb-3" href="{{  route("index") }}#">مشاهده پیشنهادات</a>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-6 d-none d-lg-block mb-30"><a class="img-cover" href="{{  route("index") }}#"
                style="background-image: url({{ asset("assets/img/banner01.jpg") }});"></a>
        </div>
    </div>
</section>
<!-- Promo #2-->
<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 bg-center bg-no-repeat"><a class="d-block" href="#"><img class="d-block"
                    src="{{ asset("assets/img/homepages/shop-v1/banner02.jpg") }}" alt="Surface Studio"></a></div>
    </div>
</section>
<section class="container py-5 mb-4">
    <h2 class="h4 block-title text-center pt-3">محصولات</h2>
    <div class="row pt-4">
        <!-- Product-->
        {{-- @forelse($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
            <div class="product-card mx-auto mb-3">
                <div class="product-head d-flex justify-content-between align-items-center">
                    <span class="badge badge-success">جدید</span>

                    <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                            class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                            class="fe-icon-star"></i>
                    </div>
                </div>
                @if($product->media->count() >= 0)
                <a class="product-thumb" href="{{ $product->url }}">
        <img alt="{{  $product->slug }}" src="{{ $product->image }}">
        </a>
        @endif
        <div class="product-card-body">
            <a class="product-meta" href="shop-categories.html">{{ $product->category->name }}</a>
            <h5 class="product-title max-lines">
                <a href="{{ $product->url }}">{{ $product->title }}</a>
            </h5>
            <span
                class="product-price">{{ $product->price == null || $product->status == 'catalog' ?  'قیمت درج نشده است' :  number_format($product->price->amount) .' هزار تومان ' }}</span>
        </div>
        <div class="product-buttons-wrap">
            <div class="product-buttons">
                <div class="product-button">
                    <a class="p-2" data-toast="" data-toast-icon="fe-icon-help-circle"
                        data-toast-message="به علاقمندی اضافه شد!" data-toast-position="topRight"
                        data-toast-title="محصول" data-toast-type="info" href="{{  route("index") }}#">
                        <i class="fe-icon-heart"></i>
                    </a>
                </div> --}}
                {{--                                <div class="product-button">--}}
                {{--                                    <a data-toast="" data-toast-icon="fe-icon-help-circle" data-toast-message="به جدول مقایسه اضافه شد!" data-toast-position="topRight" data-toast-title="محصول" data-toast-type="info" href="{{  route("index") }}#">--}}
                {{--                                        <i class="fe-icon-repeat"></i>--}}
                {{--                                    </a>--}}
                {{--                                </div>
                <div class="product-button">
                    <a class="p-2" href="{{ $product->url }}">
                <i class="fe-icon-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>
    @empty

    @endforelse --}}
    </div>
    <div class="text-center pt-3"><a class="btn btn-style-5 btn-primary" href="{{ route("products.index") }}">مشاهده
            تمام
            محصولات</a></div>
</section>
<!-- Product Widgets-->
<section class="container-fluid bg-secondary">
    <div class="container">
        <div class="row p-3 pt-5 pb-1">
            <!-- Top Sellers-->
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-featured-products">
                    <h3 class="widget-title">پرفروسش ترین ها</h3>
                    {{-- @forelse($products as $product)
                    @if($loop->index == 4)
                    @break
                    @endif
                    <a class="featured-product" href="{{ $product->url }}">
                    <div class="featured-product-thumb"><img alt="{{ $product->title }} تصویر"
                            src="{{ $product->image }}">
                    </div>
                    <div class="featured-product-info">
                        <h5 class="featured-product-title max-lines">{{ $product->title }}</h5>
                        <div class="rating-stars"><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i>
                        </div>
                        <span class="featured-product-price">
                            {{ $product->price == null || $product->status == 'catalog' ?  'قیمت درج نشده است' :  number_format($product->price->amount) .' هزار تومان ' }}
                        </span>
                    </div>
                    </a>
                    @empty

                    @endforelse --}}
                </div>
            </div>
            <!-- New Arrivals-->
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-featured-products">
                    <h3 class="widget-title">تازه رسیده ها</h3>
                    {{-- @forelse($products as $product)
                    @if($loop->index == 4)
                    @break
                    @endif
                    <a class="featured-product" href="{{ $product->url }}">
                    <div class="featured-product-thumb"><img alt="{{ $product->title }} تصویر"
                            src="{{ $product->image }}">
                    </div>
                    <div class="featured-product-info">
                        <h5 class="featured-product-title max-lines">{{ $product->title }}</h5>
                        <div class="rating-stars"><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i>
                        </div>
                        <span class="featured-product-price">
                            {{ $product->price == null || $product->status == 'catalog' ?  'قیمت درج نشده است' :  number_format($product->price->amount) .' هزار تومان ' }}
                        </span>
                    </div>
                    </a>
                    @empty

                    @endforelse --}}
                </div>
            </div>
            <!-- Best Rated-->
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-featured-products">
                    <h3 class="widget-title">بهترین امتیاز</h3>
                    {{-- @forelse($products as $product)
                    @if($loop->index == 4)
                    @break
                    @endif
                    <a class="featured-product" href="{{ $product->url }}">
                    <div class="featured-product-thumb"><img alt="{{ $product->title }} تصویر"
                            src="{{ $product->image }}">
                    </div>
                    <div class="featured-product-info">
                        <h5 class="featured-product-title max-lines">{{ $product->title }}</h5>
                        <div class="rating-stars"><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                                class="fe-icon-star active"></i><i class="fe-icon-star active"></i>
                        </div>
                        <span class="featured-product-price">
                            {{ $product->price == null || $product->status == 'catalog' ?  'قیمت درج نشده است' :  number_format($product->price->amount) .' هزار تومان ' }}
                        </span>
                    </div>
                    </a>
                    @empty

                    @endforelse --}}
                </div>
            </div>
        </div>
    </div>
</section>
{{--    <!-- Popular Brands-->--}}
{{--    <section class="bg-secondary pt-5 pb-4">--}}
{{--        <div class="container pt-3 pb-2">--}}
{{--            <h2 class="h4 block-title text-center">برند های محبوب</h2>--}}
{{--            <div class="owl-carousel carousel-flush pt-3 owl-rtl owl-loaded owl-drag"--}}
{{--                 data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3500, &quot;loop&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}}
}">--}}
{{--                <div class="owl-stage-outer owl-height" style="height: 170px;">--}}
{{--                    <div class="owl-stage"--}}
{{--                         style="transform: translate3d(2565px, 0px, 0px); transition: all 0.45s ease 0s; width: 4560px;">--}}
{{--                        <div class="owl-item cloned" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/12.png") }}" style="width: 165px;"></a>--}}
{{--                        </div> <div class="owl-item cloned" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/13.png") }}" style="width: 165px;"></a>--}}
{{--                        </div> <div class="owl-item cloned" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/14.png") }}" style="width: 165px;"></a>--}}
{{--                        </div> <div class="owl-item cloned" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/15.png") }}" style="width: 165px;"></a>--}}
{{--                        </div> <div class="owl-item active" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/16.png") }}" style="width: 165px;"></a>--}}
{{--                        </div><div class="owl-item active" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/17.png") }}" style="width: 165px;"></a>--}}
{{--                        </div><div class="owl-item active" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/15.png") }}" style="width: 165px;"></a>--}}
{{--                        </div><div class="owl-item active" style="width: 285px;">--}}
{{--                            <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30"--}}
{{--                                    href="{{  route("index") }}#"><img alt="Partner" class="d-block mx-auto" --}}
    {{--                                    src="{{ asset("assets/img/14.png") }}" style="width: 165px;"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Shop Services-->--}}
<section class="container py-5">
    <div class="row pt-3">
        <div class="col-md-3 col-sm-6 text-center mb-30"><img alt="Free Worldwide Shipping" class="mx-auto mb-4"
                src="{{ asset("assets/img/01.png") }}" width="90">
            <h3 class="text-lg mb-2 text-body">حمل و نقل در سراسر ایران</h3>
            <p class="text-sm text-muted mb-0">حمل و نقل به تمامی نقاط کشود</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img alt="Money Back Guarantee" class="mx-auto mb-4"
                src="{{ asset("assets/img/02.png") }}" width="90">
            <h3 class="text-lg mb-2 text-body">تضمین بازگشت پول</h3>
            <p class="text-sm text-muted mb-0">ما پول را در عرض ۳۰ روز برمی گردانیم.</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img alt="24/7 Customer Support" class="mx-auto mb-4"
                src="{{ asset("assets/img/03.png") }}" width="90">
            <h3 class="text-lg mb-2 text-body">پشتیبانی مشتری 24/7</h3>
            <p class="text-sm text-muted mb-0">پشتیبانی دوستانه</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img alt="Secure Online Payment" class="mx-auto mb-4"
                src="{{ asset("assets/img/04.png") }}" width="90">
            <h3 class="text-lg mb-2 text-body">پرداخت آنلاین ایمن</h3>
            <p class="text-sm text-muted mb-0">ما دارای گواهی SSL / Secure هستیم</p>
        </div>
    </div>
</section>
<section class="bg-secondary pt-3">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center text-md-left pb-4">
                <h2 class="h3 mt-2 py-3 py-lg-0 text-right">شبکه های اجتماعی</h2>
                <p class="text-muted d-none d-lg-block pb-3 text-right">
                    پلاس دارو مرجع داروی کشور با قابلیت جستجو در بین هزاران دارو با امکان خرید انواع مکمل های داروی و
                    وردشی
                </p>
                <style>
                    .my-btn-insta img {
                        width: 50px;
                        height: auto;
                    }
                </style>
                <a href="https://www.instagram.com/amirebrahimipharmacy/" target="_blank" class="my-btn-insta">
                    <img src="https://i.pinimg.com/originals/5b/d2/13/5bd213107c10d84528c20b5e825cdc9a.png">
                </a>
                <!--<a class="market-btn apple-btn mr-3 mb-3" href="#">
                        <span class="mb-subtitle">Download on the</span>
                        <span class="mb-title">App Store</span></a>
                    <a class="market-btn google-btn mr-3 mb-3" href="#">
                        <span class="mb-subtitle">Download on the</span>
                        <span class="mb-title">Google Play</span>
                    </a>-->
            </div>
            <div class="col-md-6"><img class="d-block mx-auto"
                    src="{{ asset("assets/img/homepages/corporate-blog/mobile-app.jpg") }}" alt="Mobile App"></div>
        </div>
    </div>
</section>
@endsection

@section('title')
صفحه اصلی
@endsection
@section('head')
<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="صفحه اصلی" />
<meta property="og:description" content="مرجع معتبر ، مکمل دارو ، لوازم بهداشتی" />
<meta property="og:url" content="{{ route('index') }}" />
<meta property="og:site_name" content="پلاس دارو" />
@endsection