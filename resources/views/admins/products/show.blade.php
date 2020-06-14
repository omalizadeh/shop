@extends('layouts.app')
@section('title')
نمایش کلی محصول
@endsection
@section('content')
<div class="col-lg-12">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">محصولات</span>
            <h3 class="page-title">{{ $product->title }}</h3>
        </div>
    </div>
</div>
<!-- End Page Header -->
<div class="col-lg-12 row p-0">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">بازدید کاربران</span>
                        <h6 class="stats-small__value count my-3">{{ $product->Statistic->count() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">تعداد خرید ها</span>
                        <h6 class="stats-small__value count my-3">{{ $product->ItemOrder->sum('count') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">میزان رضایت مشتریان</span>
                        <h6 class="stats-small__value count my-3">
                            {{ $product->reviews->count() > 1 ? floatval($product->reviews->sum('range') / $product->reviews->count()) : '0' }}
                            از <small>{{ $product->reviews->count() . ' رای '}}</small>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">دیدگاه های ثبت شده</span>
                        <h6 class="stats-small__value count my-3">{{ $product->comments->count() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="col-md-3 mb-3">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">
                موجودی ها
            </h6>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item pt-2 pb-2">
                    <span class="d-flex mb-2">
                        <i class="material-icons mr-1">flag</i>
                        <strong class="mr-1">وضعیت:</strong>{{ $product->status_text }}
                    </span>
                    <span class="d-flex mb-2">
                        <i class="material-icons mr-1">visibility</i>
                        <strong class="mr-1">نمایانی:</strong>
                        <strong class="{{ $product->SellStatus['class'] }}">
                            {{ $product->SellStatus['text'] }}
                        </strong>
                    </span>
                    <span class="d-flex mb-2">
                        <i class="material-icons mr-1">calendar_today</i>
                        <strong class="mr-1">تاریخ بروزرسانی موجودی</strong>
                        {{ is_null($product->storeroom) ? 'برای این محصول موجودی ثبت نشده است' : jdate($product->storeroom->updated_at)->ago() }}
                    </span>
                    <span class="d-flex">
                        <i class="material-icons mr-1">score</i>
                        <strong class="mr-1">موجودی سایت:</strong>
                        <strong class="text-danger font-weight-bold">
                            {{ is_null($product->storeroom) ? 'برای این محصول موجودی ثبت نشده است' : $product->storeroom->count .' عدد ' }}</strong>
                    </span>
                </li>
            </ul>
            <button type="button" data-toggle="modal" data-target="#Storeroom"
                class="btn btn-success col-lg-12 rounded-0 rounded-bottom">
                <i class="material-icons">text_rotation_none</i> بروزرسانی موجودی
            </button>
        </div>
    </div>
</div>
<div class="col-md-9 mb-3">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">
                لیست قیمت ها
                <div class="float-right">
                    <button type="button" data-toggle="modal" data-target="#Price" class="btn btn-outline-success">
                        <i class="material-icons">text_rotation_none</i> افزودن قیمت جدید
                    </button>
                </div>
            </h6>
        </div>
        <!-- Modal -->
        <div id="Price" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">افزودن قیمت جدید</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="amountPrice">
                                    قیمت
                                    <small class="text-danger">(به هزارتومان)</small>
                                </label>
                                <input required placeholder="1000000" type="text" value="" class="form-control"
                                    id="amountPrice" name="amount">
                            </div>
                            <div class="col-lg-6">
                                <label for="barcode">
                                    شناسه محصول
                                    <small class="text-danger">({{ $product->title }})</small>
                                </label>
                                <input type="text" disabled="" value="{{ $product->barcode }}" class="form-control"
                                    id="barcode" name="barcode">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <button type="button" class="btn btn-outline-success" onclick="Price()">بروزرسانی قیمت</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="Storeroom" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">موجودی انبار</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <label for="count">
                                        {{ 'موجودی قابل سفارش در سایت' }}
                                        <small class="text-danger"></small>
                                    </label>
                                    <input required placeholder="10" type="number"
                                        value="{{ empty($product->Storeroom) ? 0 : $product->Storeroom->count }}"
                                        class="form-control" id="count" name="count">
                                </div>
                                <div class="col-lg-6">
                                    <label for="barcode">
                                        شناسه محصول
                                        <small class="text-danger">({{ $product->title }})</small>
                                    </label>
                                    <input type="text" disabled="" value="{{ $product->barcode }}" class="form-control"
                                        id="barcode" name="barcode">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <button type="button" class="btn btn-outline-success" onclick="StoreRoom()">بروزرسانی
                            موجودی</button>
                    </div>
                </div>

            </div>
        </div>

        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">شناسه محصول</th>
                    <th scope="col" class="border-0">عنوان محصول</th>
                    <th scope="col" class="border-0">قیمت</th>
                    <th scope="col" class="border-0">وضیعت</th>
                    <th scope="col" class="border-0">تاریخ ثبت قیمت</th>
                    <th scope="col" class="border-0">ویژگی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($product->prices as $price)
                <tr>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $price->amount }}</td>
                    <td><span
                            class="badge badge-{{ $price->StatusText['class'] }}">{{ $price->StatusText['text'] }}</span>
                    </td>
                    <td>{{ jdate($price->created_at)->format('l d S F Y') }}</td>
                    <td>
                        @if($price->status != 'new')
                        <button type="button" title="ثبت پیشفرض"
                            onclick="defaultPrice('{{ $product->id }}','{{ $price->amount }}')"
                            class="btn btn-outline-primary">
                            <i class="material-icons">exit_to_app</i>
                        </button>
                        <button type="button" title="حدف قیمت" onclick="deletePrice('{{ $price->id }}')"
                            class="btn btn-outline-danger">
                            <i class="material-icons">restore_from_trash</i>
                        </button>
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td>هیچ قیمتی ثبت نشده است</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12 mb-3">
    <div class="card card-small">
        <div class="card-header">
            <h6 class="m-0">نمودار رشد قیمت</h6>
        </div>
        <div class="card-body pt-0">
            <div id="morrisLine1" class="ht-200 ht-sm-300"></div>
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="card card-small blog-comments">
        <div class="card-header border-bottom">
            <h6 class="m-0">نظرات کاربران</h6>
        </div>
        <div class="card-body p-0">
            @forelse($product->comments as $comment)
            <div class="blog-comments__item d-flex p-3" id="Comment-{{ $comment }}">
                <div class="blog-comments__avatar mr-3">
                    <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}"> </div>
                <div class="blog-comments__content">
                    <div class="blog-comments__meta text-muted">
                        <a class="text-secondary" href="#">{{ $comment->user->name }}</a>
                        <span class="text-muted">– {{ jdate($comment->created_at)->ago() }}</span> -
                        <span class="text-{{$comment->StatusText['class']}} font-weight-bold"
                            id="Comment-{{$comment->id}}-Status">{{$comment->StatusText['text']}}</span>
                    </div>
                    <p class="m-0 my-1 mb-2 text-muted">
                        {{ $comment->text }}
                    </p>
                    <div class="blog-comments__actions">
                        <div class="btn-group btn-group-sm">
                            <button type="button" onclick="Comment('{{ $comment->id }}','show')" class="btn btn-white">
                                <span class="text-success">
                                    <i class="material-icons">check</i>
                                </span> تایید </button>
                            <button type="button" class="btn btn-white"
                                onclick="Comment('{{ $comment->id }}','delete')">
                                <span class="text-danger">
                                    <i class="material-icons">clear</i>
                                </span> رد / حذف </button>
                            <button type="button" class="btn btn-white"
                                onclick="Comment('{{ $comment->id }}','replay')">
                                <span class="text-warning">
                                    <i class="material-icons">error</i>
                                </span> پاسخ به دیدگاه </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info">هیچ دیدگاهی ثبت نشده است</div>
            @endforelse
        </div>
        <div class="card-footer border-top">
            <div class="row">
                <div class="col text-center view-report">
                    <button type="submit" class="btn btn-white">مشاهده تمام نظرها</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="card card-small blog-comments">
        <div class="card-header border-bottom">
            <h6 class="m-0">بازخورد کاربران</h6>
        </div>
        <div class="card-body p-0">
            @forelse($product->reviews as $review)
            <div class="blog-comments__item d-flex p-3">
                <div class="blog-comments__avatar mr-3">
                    <img src="{{ $review->user->avatar }}" alt="{{ $review->user->name }}"> </div>
                <div class="blog-comments__content">
                    <div class="blog-comments__meta text-muted">
                        <a class="text-secondary" href="#">{{ $review->user->name . ' '.$review->user->last_name }}</a>
                        <span class="text-muted">- {{ jdate($review->created_at)->ago() }}</span>
                        <span
                            class="badge badge-{{ $review->range_text['bg'] }}">{{ $review->range_text['text'] }}</span>
                    </div>
                    <p class="m-0 my-1 mb-2 text-muted">
                        {{ $review->comment }}
                    </p>
                </div>
            </div>
            @empty
            @endforelse
            <div class="card-footer border-top">
                <div class="row">
                    <div class="col text-center view-report">
                        <button type="submit" class="btn btn-white">مشاهده تمام نظرها</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Stats -->

    <!-- End Users Stats -->
    @endsection
    @section('script')
    <div id="CommentModal"></div>
    <script>
        function StoreRoom() {
            $.ajax({
                url:'{{ route('Storeroom') }}',
                type:'post',
                beforeSend:function(){
                    iziToast.info({
                        title:'لطفا کمی صبر کنید.'
                    });
                },
                data:{
                    _token: '{{ csrf_token() }}',
                    count: $('#count').val(),
                    product_id: '{{ $product->id }}'
                },
                success:function (data) {
                    iziToast.success({ title:data.messages });
                    setTimeout(function () {
                        document.location.reload()
                    },2000)
                },error:function (data) {
                    iziToast.success({ title:data.messages });
                }
            });
        }
        function Price() {
            $.ajax({
                url:'{{ route('PriceUpdate') }}',
                type:'post',
                beforeSend:function(){
                    iziToast.info({
                        title:'لطفا کمی صبر کنید.'
                    });
                },
                data:{
                    _token: '{{ csrf_token() }}',
                    amount: $('#amountPrice').val(),
                    product_id: '{{ $product->id }}'
                },
                success:function (data) {
                    iziToast.success({ title:data.messages });
                    setTimeout(function () {
                        document.location.reload()
                    },2000)
                },error:function (data) {
                    iziToast.success({ title:data.messages });
                }
            });
        }
        function defaultPrice(ProductID,PriceAmount) {
            $.ajax({
                url:'{{ route('PriceUpdate') }}',
                type:'post',
                beforeSend:function(){
                    iziToast.info({
                        title:'لطفا کمی صبر کنید.'
                    });
                },
                data:{
                    _token: '{{ csrf_token() }}',
                    amount: PriceAmount,
                    product_id: ProductID
                },
                success:function (data) {
                    iziToast.success({ title:data.messages });
                    setTimeout(function () {
                        document.location.reload()
                    },2000)
                },error:function (data) {
                    iziToast.success({ title:data.messages });
                }
            });
        }
        function deletePrice(priceId) {
           WarningTost('آیا از کاری که میکنید مطمن هستید؟',function () {
               $.ajax({
                   url:'{{ route('PriceDelete') }}',
                   type:'post',
                   beforeSend:function(){
                       iziToast.info({
                           title:'لطفا کمی صبر کنید.'
                       });
                   },
                   data:{
                       _token: '{{ csrf_token() }}',
                       price_id: priceId,
                   },
                   success:function (data) {
                       iziToast.success({ title:data.messages });
                       setTimeout(function () {
                           document.location.reload()
                       },2000)
                   },error:function (data) {
                       iziToast.success({ title:data.messages });
                   }
               });
           })
        }
        function Comment(CommentID,action) {
            if(action === 'delete'){
                WarningTost('آیا مطمن هستید از کاری که میکنید ؟',function () {
                    $.ajax({
                        url: '{{ route('comment.index') }}/' + CommentID,
                        type: 'post',
                        beforeSend:function(){
                            iziToast.info({
                                title:'لطفا کمی صبر کنید.'
                            });
                        },
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success:function (data) {
                            iziToast.success({
                                title: data.messages
                            });
                            $('#Comment-'+ CommentID).remove();
                        },error:function (data) {
                            iziToast.error({
                                title: data.messages
                            });
                        }
                    });
                })
            }
            if (action === 'show'){
                $.ajax({
                    url: '{{ route('comment.index') }}/' + CommentID,
                    type: 'post',
                    beforeSend:function(){
                        iziToast.info({
                            title:'لطفا کمی صبر کنید.'
                        });
                    },
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        status: 'show'
                    },
                    success:function (data) {
                        iziToast.success({
                            title: data.messages
                        });
                        $('#Comment-'+ CommentID + '-Status').empty().append('تایید برای نمایش');
                    },error:function (data) {
                        iziToast.error({
                            title: data.messages
                        });
                    }
                });
            }
            if (action === 'replay'){
                $.ajax({
                    url: '{{ route('comment.index') }}/' + CommentID + '/replay',
                    type: 'get',
                    beforeSend:function(){
                        iziToast.info({
                            title:'لطفا کمی صبر کنید.'
                        });
                    },
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success:function (data) {
                        $('#CommentModal').empty().append(data.view);
                    },error:function (data) {
                        iziToast.error({
                            title: data.messages
                        });
                    }
                });
            }
        }
    </script>
    @if($product->prices->count() > 0)
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function () {
                new Morris.Line({
                    element: 'morrisLine1',
                    data: [@forelse($product->prices as $price) {
                        y: '{{ jdate($price->created_at)->format('Y-m-d') }}',
                        a: '{{ $price->amount }}'
                    }, @empty @endforelse],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['قیمت'],
                    lineColors: ['#007bff'],
                    lineWidth: 2,
                    ymax: 'auto 100',
                    gridTextSize: 11,
                    hideHover: 'auto',
                    smooth: true,
                    resize: true
                });
            });
    </script>
    @else
    <script>
        $(document).ready(function () {
                $('#morrisLine1').append('<div class="alert alert-info">هیچ قیمتی ثبت نشده است</div');
            });
    </script>
    @endif

    @endsection