@extends('layouts.app')

@section('load')

<div class="page-title d-flex" aria-label="Page title"
    style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
    <div class="container text-right align-self-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("index") }}">صفحه اصلی</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route("products.index") }}">فروشگاه</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title-heading">فروشگاه</h1>
    </div>
</div>
<div class="container pb-5 mb-3">
    <div class="row">
        <div class="col-lg-9">
            <!-- Shop Toolbar-->
            <div class="d-flex justify-content-between pb-2">
                {{-- <div class="form-inline pb-4">
                    <label class="text-muted ml-3" for="product-sort">مرتب سازی بر اساس</label>
                    <select class="form-control ml-3" id="product-sort">
                        <option>محبوبیت</option>
                        <option>کمترین - بیشترین قیمت</option>
                        <option>بیشترین - کمترین قیمت</option>
                        <option>میانگین امتیازها</option>
                        <option>حروف الفبا</option>
                    </select>
                </div> --}}
                {{-- <div class="form-inline pb-4">
                    <label class="text-muted ml-3" for="product-show"><span
                            class="d-none d-sm-inline">نمایش&nbsp;</span>محصولات</label>
                    <select class="form-control" id="product-show">
                        <option>۱۲</option>
                        <option>۲۰</option>
                        <option>۳۰</option>
                        <option>۵۰</option>
                        <option>۸۰</option>
                        <option>۱۰۰</option>
                    </select>
                </div> --}}
            </div>
            <!-- Shop Grid-->
            <div class="row">
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

                    .product-card {
                        height: 100%;
                    }
                </style>
                @forelse($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="product-card mx-auto mb-3">
                        <div class="product-head d-flex justify-content-between align-items-center">
                            {{-- <span class="badge badge-success">جدید</span> --}}

                            {{-- <div class="rating-stars"><i class="fe-icon-star active"></i><i
                                    class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i
                                    class="fe-icon-star active"></i><i class="fe-icon-star"></i>
                            </div> --}}
                        </div>
                        <a class="product-thumb" href="{{ route('products.show' , $product->getSlug()) }}">
                            @if($product->hasImages())
                            <img alt="{{  $product->images()->first()->getAlt() }}"
                                src="{{ URL::to($product->images()->first()->getURL()) }}">
                            @else
                            <img alt="{{  $product->getName() }}" src="{{ $product->image }}">
                            @endif
                        </a>
                        <div class="product-card-body">
                            <a class="product-meta" href="#">{{ $product->getDefaultCategoryName() }}</a>
                            <h5 class="product-title max-lines">
                                <a
                                    href="{{ route('products.show' , $product->getSlug()) }}">{{ $product->getName() }}</a>
                            </h5>
                            @if(!$product->isOnSale() || !$product->getStock() >0)
                            <span class="product-price text-danger">ناموجود</span>
                            @else
                            <span
                                class="product-price text-success">{{number_format($product->getPrice()) .' تومان'}}</span>
                            @endif
                        </div>
                        <div class="product-buttons-wrap">
                            <div class="product-buttons">
                                <div class="product-button">
                                    <a class="p-2" data-toast="" data-toast-icon="fe-icon-help-circle"
                                        data-toast-message="به علاقمندی اضافه شد!" data-toast-position="topRight"
                                        data-toast-title="محصول" data-toast-type="info" href="{{  route("index") }}#">
                                        <i class="fe-icon-heart"></i>
                                    </a>
                                </div>
                                {{--                                <div class="product-button">--}}
                                {{--                                    <a data-toast="" data-toast-icon="fe-icon-help-circle" data-toast-message="به جدول مقایسه اضافه شد!" data-toast-position="topRight" data-toast-title="محصول" data-toast-type="info" href="{{  route("index") }}#">--}}
                                {{--                                        <i class="fe-icon-repeat"></i>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                                <div class="product-button">
                                    <a class="p-2" data-toast="" data-toast-icon="fe-icon-check-circle"
                                        data-toast-message="با موفقیت به سبد خرید اضافه شد!"
                                        data-toast-position="topRight" data-toast-title="محصول"
                                        data-toast-type="success" href="{{  route("index") }}#">
                                        <i class="fe-icon-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info col-lg-12">محصولی یافت نشد!</div>

                @endforelse
            </div>
            <div class="pt-3">
                <!-- Pagination-->
                {!! $products->links() !!}
            </div>
        </div>
        <div class="col-lg-3">

            <!-- Shop Sidebar-->
            <!-- Off-Canvas Toggle-->
            <a class="offcanvas-toggle" href="#shop-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
            <!-- Off-Canvas Container-->
            <aside class="offcanvas-container pic" id="shop-sidebar">
                {{-- <div id="sidebarloader">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div> --}}
                @include('sidebar')
            </aside>
        </div>
    </div>
</div>
@endsection

@section('title')
محصولات
@endsection
@section('head')
<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="لیست تمامی محصولات" />
<meta property="og:url" content="{{ route('products.index') }}" />
<meta property="og:site_name" content="پلاس دارو" />
{{-- <script>
    setTimeout(function(){ GetSite() }, 2000);
</script> --}}
@endsection