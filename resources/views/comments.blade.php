@extends('page.layouts.app')

@section('load')
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route("ProductsPage") }}">فروشگاه</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ $product->url }}">{{ $product->title }}</a>
                    </li>
                </ol>
            </nav>
            <h4 class="page-title-heading" style="font-size: 28px;">دیدگاه ها و بازخورد ها</h4>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row pt-2">
            <div class="col-md-4 pb-5 mb-3">
                <div class="card border-default">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-inline align-baseline display-5 mr-1">امتیاز محصول از 5</div>/
                            <div class="d-inline align-baseline display-4 mr-1">{{ $average }}</div>
                            <div class="d-inline align-baseline text-sm text-warning mr-2">
                                <div class="rating-stars">
                                    @for($i = 0 ; $i < round($average, 0, PHP_ROUND_HALF_ODD);$i++)
                                        <i class="fe-icon-star active"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="pt-3"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">به این محصول امتیاز بدهید</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pb-5 mb-3">
                <div class="d-flex flex-wrap justify-content-between pb-2">
                    <h3 class="h4">بازخورد های اخیر</h3>
{{--                    <a class="btn btn-primary btn-sm" href="#">مشاهده همه بازخورد ها</a>--}}
                </div>
                <!-- Review-->
                <hr/>

                @forelse($reviews as $review)
                    <div class="blockquote comment mb-4">
                        <div class="d-sm-flex mb-2">
                            <h6 class="text-lg mb-0 text-{{ $review->RangeText["bg"] }}">
                                {{ $review->RangeText["text"] }}
                            </h6>
                            <span class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                            <div class="rating-stars"><i class="fe-icon-star active"></i>
                                @for($i = 0; $i < $review->range ; $i++)
                                    <i class="fe-icon-star active"></i>
                                @endfor
                            </div>
                        </div>
                        <p>
                            {{ $review->comment }}
                        </p>
                        <footer class="testimonial-footer">

                            <div class="d-table-cell align-middle pl-2">
                                <div class="blockquote-footer">{{ $review->user->name . ' '.$review->user->last_name }}
                                    <cite>{{ jdate($review->created_at)->format("l d F Y - H:i") }}</cite>
                                </div>
                            </div>
                        </footer>
                    </div>
                @empty
                    <div class="blockquote comment mb-4">
                        <div class="alert alert-info">هیچ بازخوردی ثبت نشده است</div>
                    </div>
                @endforelse
                {{ $reviews ->links() }}
            </div>
        </div>
    </div>
    <div class="needs-validation modal fade show" id="leaveReview" tabindex="-1" novalidate="" aria-modal="true">
        @if(auth()->guest())
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ارسال بازخورد</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">برای ارسال دیدگاه باید <a href="{{ route('login') }}"> وارد </a>شوید </div>
                    </div>
                </div>
            </div>
        @else
            <form style="padding-right: 15px; display: block;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ارسال بازخورد</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-name">نام شما</label>
                                        <input class="form-control" value="{{ auth()->user()->name }}" type="text" id="review-name" required="">
                                        <div class="invalid-tooltip">نام خود را وارد کنید</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review-rating">میزان امتیاز</label>
                                        <select class="form-control" id="review-rating" required="">
                                            <option value="5">5 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="2">2 Stars</option>
                                            <option value="1">1 Star</option>
                                        </select>
                                        <small class="m-2 badge badge-success">لطفا یک مقدار از ۱ تا ۵ انتخاب کنید</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review-message"> متن بازخورد</label>
                                <textarea class="form-control" id="review-message" rows="8" required=""></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">ارسال بازخورد</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection

@section('title')
    دیدگاه های ثبت شده برای {{ $product->title }}
@endsection
@section('head')
    <meta name=description content="{{ $product->limit_text }}">
    @if($product->propertySeo)
        @forelse($product->propertySeo['Tags'] as $tag)
            <meta name=keywords itemprop=keywords content="{{ $tag }}">
        @empty
        @endforelse
    @else
        <meta name=keywords itemprop=keywords content="{{ $product->brand->name }}">
        <meta name=keywords itemprop=keywords content="{{ $product->category->name }}">
    @endif
    <link rel=canonical href="{{ $product->url }}/comments">
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $product->title }} دیدگاه های ثبت شده برای"/>
    <meta property="og:description" content="{{ $product->limit_text }}"/>
    <meta property="og:url" content="{{ $product->url }}/comments"/>
    <meta property="og:site_name" content="پلاس دارو"/>
    @if($product->media->count() > 0)
        @forelse($product->media as $item)
            <meta property="og:image" content="{{ $item->url }}"/>
        @empty
        @endforelse
    @endif
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Product",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "{{ floatval($average) }}",
                "reviewCount": "{{ $product->reviews->count() }}"
            },
            "description": "{{ $product->limit_text }}",
            "name": "{{ $product->title }}",
            @if($product->media->count() > 0)
            "image": "{{ $product->image }}",
            @endif
        "brand": "{{ $product->brand->name }}",
            "sku": "{{ $product->barcode }}",
            "mpn": "gtin13",
            "productID": "{{ $product->id }}",
            @if($product->price != null)
            "offers": {
                "@type": "Offer",
                "availability": "http://schema.org/OnlineOnly",
                "price": "{{ $product->price->amount }}",
                "priceCurrency": "USD",
                "priceValidUntil": "{{ $product->created_at->format('Y-m-d') }}",
                "url": "{{ $product->url}}"
            },
            @endif
        @if($reviews != null) "review": [  @forelse($product->reviews as $review)
            {
            "@type": "Review",
            "author": "{{ $review->user->name . ' '.$review->user->last_name }}" ,
            "datePublished": "{{ $review->created_at }}",
            "name": "{{ $review->range_text['text'] }}",
            "description": "{{ $review->comment }}",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "{{ $review->range }}"
              }
           } @if($loop->count > 1 && !$loop->last) , @endif @empty @endforelse ]
       @endif
        }
    </script>

@endsection