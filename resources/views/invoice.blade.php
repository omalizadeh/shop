@extends('page.layouts.app')

@section('load')
    <style>
        li{
            list-style-type:none !important;
        }
    </style>
    <div class="page-title d-flex" aria-label="Page title"
         style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route("ProductsPage") }}">فروشکاه</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">خلاصه فاکتور</h1>
        </div>
    </div>
    @php
        $payment = $invoice->payment->where('status' , '100')->first();
    @endphp
    @if($payment)
        <div class="alert alert-success">
            پرداخت شده است
            <br>شماره تراکنش :{{ $payment->traceNumber }}<br> تاریخ پرداخت
            :{!! ' <b>'.jdate($payment->updated_at)->format('l d S F Y ساعت : H:i').'</b>' !!}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-info">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container pb-4 mb-2">
        <div class="row">
            <div class="col-xl-8 col-lg-8 pb-5">
                @forelse($invoice->Order->Items as $item)
                    <div class="cart-item d-md-flex justify-content-between pr-2">
                        <div class="px-3 my-3"><a class="cart-item-product"
                                                  href="{{ route('ProductShow' , ['slug' => $item->product->slug]) }}">
                                <div class="cart-item-product-thumb"><img src="{{ $item->product->image }}"
                                                                          alt="Product"></div>
                                <div class="cart-item-product-info">
                                    <h4 class="cart-item-product-title">
                                        {{ $item->product->title }}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">تعداد</div>
                            <span class="text-xl font-weight-medium">{{ $item->count }}</span>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">هزینه کل</div>
                            <span class="text-xl font-weight-medium">{!!  number_format($item->price * $item->count) .' تومان '  !!}</span>
                        </div>
                        <div class="px-3 my-3 text-center align-self-center"><a class="btn btn-secondary btn-sm">ویرایش</a>
                        </div>
                    </div>
                @empty
                @endforelse
                <form action="{{ route('InvoicePay' , ['invoice' => $invoice->id]) }}" method="post" class="setting_form">
                    @csrf
                    <div class="wizard">
                        <input name="order_id" type="hidden" value="{{ $invoice->Order->id }}">
                        <div class="wizard-body">
                            @if(!$payment)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">نام
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" required id="first_name" class="form-control"
                                                   name="name" placeholder="نام"
                                                   value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">تلفن تماس
                                                <sup>*</sup>
                                            </label>
                                            <input required type="text" id="phone" required class="form-control"
                                                   name="phone" placeholder="شماره تماس"
                                                   value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.row -->
                                <div class="form-group">
                                    <label for="email">ایمیل
                                        <sup>بدون WWW وارد شود</sup>
                                    </label>
                                    <input type="text" required id="email" name="email" class="form-control"
                                           placeholder="آدرس ایمیل" value="{{ auth()->user()->email }}">
                                </div>
                                <div>
                                    @if(!$payment)
                                        <div class="p-3">
                                            <b>محل دریافت</b>
                                        </div>
                                        <ul id="AddressList">
                                            @include('page.user.addressList' , $addresses)
                                            <li>
                                                <a href="#" data-target="#myModal2" data-toggle="modal">
                                                    افزودن آدرس جدید
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            @else
                                محل تحویل : {{ $invoice->Order->Delivery->address->address }}
                                <br>
                                شماره تماس تحویل گیرنده :  <strong>{{ $invoice->Order->Delivery->phone }}</strong>
                            @endif
                            <div class="form-group">
                                <label for="information mb-3 bold">توضیحات</label>
                                <textarea @if($payment) disabled @endif name="information" required id="information"
                                          class="form-control form-control-lg"
                                          placeholder="توضیحات">@if($payment) {{$payment->description }} @endif</textarea>
                            </div>

                        </div>
                        @if(!$payment)
                            <div class="p-1 card">
                                <div class="card-header">
                                    <h5>نحوه پرداخت</h5>
                                </div>
                                <ul class="card-body">
                                    <li>
                                        <div class="custom-radio">
                                            <input required type="radio" id="payment_1" value="online" class=""
                                                   name="payment">
                                            <label for="payment_1">
                                                <span class="circle"></span>کارت اعتباری</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="payment_2" value="in_plase" class=""
                                                   name="payment">
                                            <label for="payment_2">
                                                <span class="circle"></span>پرداخت در محل</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <div class="wizard-footer d-flex justify-content-between">
                            @if(!$payment)
                                <button type="button" disabled="" class="btn btn-dark my-2 float-left">بازگشت</button>
                                <button type="submit" class="btn btn-primary my-2 float-left">تایید نهایی و پرداخت</button>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
            <!-- Sidebar-->
            <aside class="col-xl-4 col-lg-4 pb-4 mb-2">
                <div class="widget">
                    <h4 class="widget-title">هزینه ها</h4>
                    <div class="d-flex justify-content-between pb-2">
                        <div>مجموع اقلام فاکتود</div>
                        <div class="font-weight-medium">{{ $invoice->Order->Items->count() }} عدد</div>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <div>هزینه فاکتور</div>
                        <div class="font-weight-medium">{{ number_format($invoice->payment_amount) }} هزار تومان</div>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <div>هزینه بسته بندی و ارسال</div>
                        <div class="font-weight-medium">$9.72</div>
                    </div>
                    <hr>
                    <div class="pt-3 text-right text-lg font-weight-medium">$2,584.72</div>
                </div>
            </aside>
            <div class="col-lg-12">

                <div class="card p-3">
                        <div class="card-header">
                            <h4>تراکنش های ثبت شده</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">تاریخ ثبت :</th>
                                    <th scope="col">میزان پرداختی</th>
                                    <th scope="col">توضیحات تراکنش</th>
                                    <th scope="col">شماره تراکنش</th>
                                    <th scope="col">وضیعت پرداخت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($invoice->payment as $item)

                                    <tr class="@if($item->status == 100) table-success @else table-warning @endif">
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{!! ' <b>'.jdate($item->updated_at)->format('l d S F Y ساعت : H:i').'</b>' !!}
                                        </td>
                                        <td>{!!  number_format($item->amount) .' تومان '  !!}</td>
                                        <td>{!! $item->message !!}</td>
                                        <td>{{ $item->traceNumber }}</td>
                                        <td>{!!  $item->status_text  !!}</td>
                                    </tr>
                                @empty
                                @endforelse

                                </tbody>

                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal fade rating_modal rtl" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title">افزودن آدرس جدید</h3>
                    </div>
                    <!-- end /.modal-header -->
                    <div class="modal-body">
                        <form id="AddressAdd" dir="rtl" style="text-align: justify">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="title">عنوان</label>
                                    <input required type="text" id="title" name="title" value="{{ old('title') }}"
                                           placeholder="مثال : خانه" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="city">استان</label>
                                    <select required id="city" name="city_id" class="form-control form-control-lg">
                                        @forelse($cities as $id => $city)
                                            <option value="{{ $id }}">{{ $city }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="zip_code">کدپستی</label>
                                    <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                           placeholder="123456789" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="phone_c">تلفن تماس</label>
                                    <input type="text" id="phone_c" name="phone" value="{{ old('phone') }}"
                                           placeholder="09912345678" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address">آدرس دقیق</label>
                                <textarea id="Address" class="form-control" required name="address"
                                          placeholder="مثال : قم - شهرک قدس "></textarea>
                            </div>
                            <button type="button" onclick="AddressAdd('')" class="btn btn-success btn-md">ثبت</button>
                            <button class="btn btn-primary btn-md" type="reset" data-dismiss="modal">لغو</button>
                        </form>
                    </div>
                    <!-- end /.modal-body -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    مدیریت فاکتور
@endsection
@section('script')
    <script>
        function AddressAdd() {
            var form = $('#AddressAdd').serialize();
            $.ajax({
                url: '{{ route('AddAddress') }}',
                type: 'post',
                data: form,
                success: function (data) {
                    $('#AddressAdd')[0].reset();
                    $('#myModal2').modal('hide');
                    $('#AddressList').empty().append(data);
                    alert('آدرس با موفقیت افزود شد');
                }
            });
        }
    </script>
@endsection
