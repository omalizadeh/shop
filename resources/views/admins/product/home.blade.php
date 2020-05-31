@extends('layouts.app')
@section('title')
    لیست محصولات
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    محصولات
                   <div class="float-right">
                       <a href="{{ route('product.create') }}" class="btn btn-outline-success">
                           <i class="material-icons">text_rotation_none</i> افزودن محصول جدید
                       </a> &nbsp;
                       <a href="{{ route('product.index') }}?status=delete" class="btn btn-outline-warning">
                           <i class="material-icons">restore_from_trash</i> محصولات حدف شده
                       </a>
                   </div>
                </h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">شناسه محصول</th>
                        <th scope="col" class="border-0">عنوان محصول</th>
                        <th scope="col" class="border-0">تاریخ انتشار</th>
                        <th scope="col" class="border-0">دسته بندی</th>
                        <th scope="col" class="border-0">تولید کننده</th>
                        <th scope="col" class="border-0">ارسال کننده</th>
                        <th scope="col" class="border-0">ویژگی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr id="product-{{ $product->id }}">
                            <td>{{ $product->barcode }}</td>
                            <td class="@php echo $product->status == 'delete' ? 'text-warning' : ' '; @endphp">{{ $product->title }}</td>
                            <td>
                                {{ jdate($product->created_at)->format('l d S F Y') }}
                                @if($product->created_at != $product->updated_at)
                                    <span class="text-danger"><small>
                                        ویرایش : {{ jdate($product->updated_at)->ago() }}
                                        </small>
                                    </span>
                                @endif
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td class="text-success">{{ $product->user->last_name .', '.$product->user->name }}</td>
                            <td>
                                <a href="{{ route('ProductChange' , ['product' => $product->id]) }}" title="ویرایش ویژگی ها" class="btn btn-success btn-sm"><i class="material-icons">insert_chart</i></a>
                                <a href="{{ route('product.edit' , ['product' => $product->id]) }}" title="ویرایش" class="btn btn-info btn-sm"><i class="material-icons">format_indent_decrease</i></a>
                                @if($product->status == 'delete' || $product->status == 'check')
                                    {{--<a href="#" onclick="products('deleted','{{ $product->id }}')" title="حدف" class="btn btn-danger btn-sm">حدف برای همیشه</a>--}}
                                    <a href="#" onclick="products('show','{{ $product->id }}')" title="حدف" class="btn {{ $product->status == 'delete' ?  'btn-warning' : 'btn-success' }} btn-sm">{{ $product->status == 'delete' ?  'بازگردانی محصول' : 'انتشار محصول' }}</a>
                                @else
                                    <a href="#" onclick="products('delete','{{ $product->id }}')" title="حدف" class="btn btn-warning btn-sm"><i class="material-icons">remove_shopping_cart</i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>محصول ای یافت نشد</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <hr/>
            <div class="ml-3 float-right">{!! $products->render() !!}</div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function products(action,product) {
            if (action === 'show'){
                WarningTost('آیا واقعا میخواهید این محصول را به حالت نمایش تغییر بدهید ؟',function () {
                    $.ajax({
                        url: '{{ route('product.index') }}/' + product,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'PUT' }}',
                            status: 'show'
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#product-" + product).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                });
            }
            if (action === 'delete'){
                WarningTost('آیا واقعا میخواهید این محصول را پاک کنید؟',function () {
                    $.ajax({
                        url: '{{ route('product.index') }}/' + product,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'DELETE' }}',
                            status: 'delete'
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#product-" + product).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                });
            }
            if (action === 'deleted'){
                WarningTost('آیا مایلید این محصول را برای همیشه حذف کنید ؟',function () {
                    $.ajax({
                        url: '{{ route('product.index') }}/' + product,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'delete' }}',
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#product-" + product).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                })
            }
        }
    </script>
@endsection