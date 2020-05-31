@extends('layouts.app')
@section('title') {{ 'PDO-'.$order->id }}@endsection
@section('content')

    <!-- Page Header -->
    <div class="col-lg-12">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">سفارشات</span>
                <h3 class="page-title">مدیریت سفارش</h3>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class='card card-small mb-3'>
                    <div class="card-header">
                        <button type="button" data-toggle="modal" href="#SendSMS" class="btn btn-info">مدیریت وضیعت سفارش</button>
                        <div id="SendSMS" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title float-left">وضیعت سفارش</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="ResponseForm">
                                            <div class="form-group">
                                                <label for="status">
                                                    وضیعت سفارش
                                                </label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="waiting">سفارش معلق</option>
                                                    <option value="cancelled">سفارش لغو شده است</option>
                                                    <option value="posted">سفارش ارسال شده است</option>
                                                </select>
                                                <input type="hidden" value="{{ $order->user->name }}" name="sender[name]">
                                                <input type="hidden" value="{{ $order->user->phone }}" name="sender[phone]">
                                                <input type="hidden" value="{{ $order->user->email }}" name="sender[email]">
                                                {{ csrf_field() }}
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                                                    <input type="checkbox" id="customToggle1" name="send[mail]" class="custom-control-input">
                                                    <label class="custom-control-label" for="customToggle1">
                                                        ارسال فاکتور به ایمیل کاربر
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                                                    <input type="checkbox" id="customToggle2" name="send[sms]" class="custom-control-input">
                                                    <label class="custom-control-label" for="customToggle2">
                                                        اطلاع رسانی از طریق پیام کوتاه
                                                    </label>
                                                </div>
                                            </div>
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="UpdateOrder()" class="btn btn-success" data-dismiss="modal">تایید</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class='card-body p-5'>
                        <div class="row">

                            <div class="col-md-4 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                                <!--REVIEW ORDER-->
                                <div class="panel panel-default">
                                    <h4>هزینه سفارش</h4>

                                    <div class="panel-body">

                                        <div class="col-md-12">
                                            <strong>هزینه کل سفارش</strong>
                                            <div class="pull-right">
                                                <span>{{ number_format($order->items->sum('total_price')) }}</span>
                                                <small>هزارتومان</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <strong>هزینه بسته بندی و ارسال</strong>
                                            <div class="pull-right"><span>{{ '20,000' }}</span>
                                                <small>{{ ' هزارتومان' }}</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--REVIEW ORDER END-->
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                                <!--SHIPPING METHOD-->
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center"><h4>اقلام فاکتور </h4></div>
                                    <div class="panel-body">
                                        <table class="table borderless">
                                            <thead>
                                            <tr>
                                                <td>عنوان محصول</td>
                                                <td>قیمت محصول</td>
                                                <td>تعداد</td>
                                                <td>هزینه کل</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($order->Items as $item)
                                                <tr>
                                                    <td class="col-md-3">
                                                        <div class="media">
                                                            <a class="thumbnail pull-left"
                                                               href="{{ route('ProductShow' , ['slug' => $item->product->slug]) }}">
                                                                <img class="media-object"
                                                                     src="{{ $item->product->image }}"
                                                                     style="width: 72px; height: 72px;"> </a>
                                                            <div class="media-body mr-1">
                                                                <span class="media-heading"> {{ $item->product->title }}</span>
                                                                <br>
                                                                <small class="media-heading">شماره
                                                                    سریال: {{ $item->product->barcode }}</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{ number_format($item->price).'T' }}</td>
                                                    <td class="text-center">{{ $item->count }}</td>
                                                    <td class="text-right">{{ number_format($item->total_price).'T' }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--SHIPPING METHOD END-->
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 border-top pt-3 mt-3">
                                <h4>آدرس محل دریافت</h4>
                                <p>{{ $order->Delivery->Address->address }}</p>
                                <h4>توضیحات</h4>
                                <p>{{ $order->Delivery->information }}</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 border-top pt-3 mt-3">
                                <h4>وضیعت سفارش</h4>
                                <div class="col-md-12">
                                    <strong>زمان ثبت سفارش</strong>
                                    <div class="pull-right">
                                        {{ jdate($order->created_at)->format('l d S F Y') }}
                                        @if($order->created_at != $order->updated_at)
                                            <span class="badge badge-info"><small>
                                        ویرایش : {{ jdate($order->updated_at)->ago() }}
                                        </small>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <strong>وضیعت پرداخت</strong>
                                    <div class="pull-right">
                                    @php $pays = $order->invoice->payment->where('status', '100')->first() @endphp
                                        @if($pays)
                                            <span class="badge badge-success">پرداخت شده است</span>
                                            <p class="p-2 text-justify pull-right">
                                                هزینه واریزی: {{ number_format($pays->amount) . 'تومان' }}<br>
                                                شماره تراکنش:  {{ $pays->traceNumber }}<br>
                                                پاسخ بانک : {{ $pays->message }}<br>
                                                تاریخ پرداخت : {{ jdate($pays->updated_at)->format('l d S F Y') .' ساعت ' . jdate($pays->updated_at)->format('H:i')}}</p>

                                        @else
                                            <span class="badge badge-{{ $order->status == 'cash_pay' ? 'info' : 'danger'}}"> {{ $order->status == 'cash_pay' ? 'پرداخت در محل' : 'پرداخت نشده'}}</span>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function UpdateOrder() {
            $.ajax({
                url: '{{ route('order.update' , ['order' => $order->id]) }}',
                type:'post',
                data: $('#ResponseForm').serialize(),
                success:function (data) {
                    alert('پاسخ شما با موفقیت ثبت شد !');
                    setTimeout(function () {
                        document.location.reload()
                    },2000)
                }
            });
        }
    </script>
@endsection
