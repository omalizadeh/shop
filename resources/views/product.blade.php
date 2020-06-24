@extends('layouts.app')

@section('load')
<div class="page-title d-flex" aria-label="Page title"
    style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }}); max-height: 30px;">
    <div class="container text-right align-self-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("index") }}">صفحه اصلی</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route("products.index") }}">فروشگاه</a>
                </li>
            </ol>
        </nav>
        {{--            <h4 class="page-title-heading" style="font-size: 28px;">{{ $product->title }}</h4>--}}
    </div>
</div>
<!-- Page Content-->
<div class="container mb-2">
    <div class="row">
        <!-- Product Gallery-->
        <div class="col-md-6 pb-5">
            <div class="product-gallery">
                <span
                    class="badge badge-{{ $product->isOnSale() && $product->getStock() > 0 ? "success" : "danger" }} text-md font-weight-normal">
                    {{ $product->isOnSale() && $product->getStock() > 0 ? "موجود" : 'ناموجود' }}
                </span>
                <div class="product-carousel owl-carousel">
                    @forelse($product->images as $image)
                    <a class="gallery-item" data-fancybox="gallery{{ $loop->index }}" data-hash="four">
                        <img src="{{ URL::to($image->getURL()) }}" alt="{{ $product->getName() }}"></a>
                    @empty
                    @endforelse
                </div>
                <ul class="product-thumbnails">
                    @forelse($product->images as $image)
                    <li><a href="#{{ $loop->index }}"><img src="{{ URL::to($image->getURL()) }}"
                                alt="{{ $product->getName() }}"></a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <!-- Product Info-->
        <div class="col-md-6 pb-5">
            {{-- <div class="product-meta"><i class="fe-icon-bookmark"></i>
                @if($product->propertySeo)
                @forelse($product->propertySeo['Tags'] as $tag)
                <a href="#" rel="tag">{{ $tag }}</a>
            @empty
            @endforelse
            @else
            <a href="#" rel="tag">{{ $product->brand->name }}</a>
            <a href="#" rel="tag">{{ $product->category->name }}</a>
            @endif
        </div> --}}
        <h3 class="h3 font-weight-bold">{{ $product->getName() }}</h3>
        @if($product->isOnSale() && $product->getStock() > 0)
        <h4 class="h4 font-weight-light text-success">{{number_format($product->getPrice())}}</h4>
        @else
        <h4 class="h4 font-weight-light text-danger">ناموجود</h4>
        @endif
        <ul class="list-unstyled mb-4 pb-2">
            @if($product->brand != null)
            <li><strong>برند: </strong> <a href="{{ route('brands.show',$product->brand->getSlug()) }}"
                    target="_blank">{{ $product->brand->getName() }}</a></li>
            @endif
            <li><strong>دسته بندی: </strong><a
                    href="{{ route('categories.show',$product->getDefaultCategory()->getSlug()) }}"
                    target="_blank">{{ $product->getDefaultCategoryName() }}</a></li>
        </ul>
        <div class="row mt-4">
            {{-- <div class="col-sm-6">
                <span class="fild-value"> <img style="height: 55px;width: 100%;"
                        alt="Barcoded value {{ $product->getBarcode() }}"
            src="http://bwipjs-api.metafloor.com/?bcid=code128&text={{ $product->getBarcode() }}"> </span>
        </div> --}}
        <div class="col-sm-6">
            @if($product->isOnSale() && $product->getStock() > 0)
            <button class="btn btn-primary btn-block m-0" onclick="addToCart({{ $product->id }})">
                <i class="fe-icon-shopping-cart"></i> خرید
            </button>
            @else
            <button class="btn btn-dark btn-block m-0" disabled>
                <i class="fe-icon-shopping-cart"></i> خرید
            </button>
            @endif
        </div>
    </div>
    <div class="pt-1 mb-4"><span class="text-medium">شناسه محصول:</span> {{ $product->getBarcode() }}</div>
    <hr class="mb-2">
    {{-- <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="mt-2 mb-2">
                <button class="btn btn-danger btn-sm my-2 mr-1" onclick="AddToFavorite()"><i
                        class="fe-icon-heart"></i>&nbsp;افزودن به لیست علاقه مندی</button>
                <button class="btn btn-info btn-sm my-2" data-toast data-toast-type="info"
                    data-toast-position="topRight" data-toast-icon="fe-icon-info" data-toast-title="Product"
                    data-toast-message="added to comparison table!"><i class="fe-icon-repeat"></i>&nbsp;مقایسه</button>
            </div>
            <div class="mt-2 mb-2"><span class="text-muted d-inline-block align-middle mb-2"></span>
                <div class="d-inline-block"><a class="social-btn sb-style-3 sb-facebook my-1" href="#"
                        data-toggle="tooltip" data-placement="top" title="Facebook"><i
                            class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-twitter my-1" href="#"
                        data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a
                        class="social-btn sb-style-3 sb-instagram my-1" href="#" data-toggle="tooltip"
                        data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a
                        class="social-btn sb-style-3 sb-google-plus my-1 mr-0" href="#" data-toggle="tooltip"
                        data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
            </div>
        </div> --}}
    {{-- @if($product->price == null || $product->status == 'catalog')
        <div class="alert alert-warning">
            <i class="fa fa-power-off"></i>
            <p class="text-justify">
                این محصول را در سایت موجودی نداریم جهت خرید یا دریافت مشاوره در مورد دارو مدنظر با
                کارشناسان ما تماس بگیرید
                <b>
                    <span style="direction: ltr;float: left;text-align: justify;">(025) 37 77 98 85</span>
                    <span style="direction: rtl;float: left;text-align: right;">&nbsp; تلفن تماس
                        :&nbsp;</span>&nbsp;
                </b>
            </p>
        </div>
        @endif --}}
</div>
</div>
</div>
<!-- Product Details-->
<div class="bg-secondary pt-5 pb-4" id="details">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6">
                <h5 class="h6">معرفی</h5>
                <p class="mb-4 pb-2">
                    {!! $product->getDescription() !!}
                </p>
            </div>
            <div class="col-md-6">
                <h5>ویژگی ها</h5>
                @php
                $features = $product->features;
                @endphp
                @foreach ($featureGroups as $group)
                @if($features->contains('feature_group_id',$group->id))
                <h6>{{$group->getName()}}</h6>
                <ul class="list-unstyled mb-4 pb-2">
                    @foreach ($features as $feature)
                    @if($feature->getFeatureGroupId() == $group->id)
                    <li><strong>{{ $feature->getName() }}: </strong> {{$feature->pivot->value}}</li>
                    @endif
                    @endforeach
                </ul>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Reviews-->
<div class="container pt-5">
    <div class="row pt-2">
        <div class="col-md-4 pb-5 mb-3">
            <div class="card border-default">
                <div class="card-body">
                    <div class="text-center">
                        <div class="d-inline align-baseline display-5 mr-1">امتیاز محصول از 5</div>/
                        <div class="d-inline align-baseline display-4 mr-1">{{ $product->getAvgRate() }}</div>
                        <div class="d-inline align-baseline text-sm text-warning mr-2">
                            <div class="rating-stars">
                                @for($i = 0 ; $i < round($product->getAvgRate(), 0, PHP_ROUND_HALF_ODD);$i++) <i
                                        class="fe-icon-star active"></i>
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <div class="pt-3"><a class="btn btn-warning btn-block" href="#" data-toggle="modal"
                            data-target="#leaveReview">به این محصول امتیاز بدهید</a></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-8 pb-5 mb-3">
            <div class="d-flex flex-wrap justify-content-between pb-2">
                <h3 class="h4">بازخورد های اخیر</h3><a class="btn btn-primary btn-sm"
                    href="{{ route("ProductComments" , ["slug" => $product->slug]) }}">مشاهده همه بازخورد ها</a>
    </div>
    <!-- Review-->
    <hr />

    @forelse($product->reviews as $review)
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
</div> --}}
</div>
</div>
<div class="needs-validation modal fade show" id="leaveReview" tabindex="-1" novalidate="" aria-modal="true">
    {{-- @if(auth()->guest())
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ارسال بازخورد</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">برای ارسال دیدگاه باید <a href="{{ route('login') }}"> وارد </a>شوید
</div>
</div>
</div>
</div>
@else
<form style="padding-right: 15px; display: block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ارسال بازخورد</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-name">نام شما</label>
                            <input class="form-control" value="{{ auth()->user()->name }}" type="text" id="review-name"
                                required="">
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
@endif --}}
</div>
@endsection

@section('title')
{{ $product->getName() }}
@endsection
@section('head')
<meta name=description content="{{ $product->getMetaDescription() }}">
<script>
    function addToCart(id) {
            $.ajax({
                url: '{{ route('carts.add_product') }}',
                type: '{{ 'Post' }}',
                data: { _token: '{{ csrf_token() }}', product_id: id },
                success:function (data) {
                   alert(data.message);
                   $('#CartBadge').empty().append(data.data.count);
                },
                error:function (data) {
                    console.log(data);
                    danger(data.responseJSON.message);
                }
            });
        }
</script>
{{-- @if($product->propertySeo)
@forelse($product->propertySeo['Tags'] as $tag)
<meta name=keywords itemprop=keywords content="{{ $tag }}">
@empty
@endforelse
@else
<meta name=keywords itemprop=keywords content="{{ $product->brand->name }}">
<meta name=keywords itemprop=keywords content="{{ $product->category->name }}">
@endif
<link rel=canonical href="{{ route('ProductShow' , ['slug' => $product->slug ]) }}">
<meta property="og:locale" content="fa_IR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $product->title }}" />
<meta property="og:description" content="{{ $product->limit_text }}" />
<meta property="og:url" content="{{ route('ProductShow' , ['slug' => $product->slug]) }}" />
<meta property="og:site_name" content="پلاس دارو" />
@if($product->media->count() > 0)
@forelse($product->media as $item)
<meta property="og:image" content="{{ env('APP_URL').asset($item->patch.$item->name) }}" />
@empty
@endforelse
@endif --}}
{{-- <script type="application/ld+json">
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
"image": "{{ env('APP_URL').asset($product->media[0]->patch.$product->media[0]->name) }}",
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
"url": "{{ route('ProductShow' , ['slug' , $product->slug]) }}"
},
@endif
@if($product->reviews != null) "review": [ @forelse($product->reviews as $review)
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
<script>
    $(document).ready(function () {
        setTimeout(function(){$.ajax({url: '{{ route('Statistic') }}', type: 'post',  data: { _token: '{{ csrf_token() }}' , model_type: 'App\\Product', model_id: '{{ $product->id }}' } });}, 5000);
    });
</script>
<script>
    function AddToFavorite() {
            @if(auth()->guest())
                alert("برای این کار باید وارد شوید!");
            @else
            $.ajax({
                url: "{{ route("AddFavorite",["product" => $product->id]) }}",
                type: "post",
                data: { _token: "{{ csrf_token() }}", },
                success:function (data) {
                    alert(data.message);
                }
            });
            @endif
        }
</script> --}}
@endsection