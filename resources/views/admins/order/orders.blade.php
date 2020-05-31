@extends('layouts.app')
@section('title') لیست سفارشات @endsection
@section('content')

    <!-- Page Header -->
    <div class="col-lg-12">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">بررسی</span>
                <h3 class="page-title">لیست سفارشات</h3>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                 <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">سفارش های ثبت شده</h6>
                </div>
                <div class='card-body p-0'>

                    <table class="table mb-0" id="Orders">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">شناسه سفارش</th>
                            <th scope="col" class="border-0">نام مشتری</th>
                            <th scope="col" class="border-0">تاریخ ثبت سفارش</th>
                            <th scope="col" class="border-0">هزینه کل</th>
                            <th scope="col" class="border-0">وضیعت پرداخت</th>
                            <th scope="col" class="border-0">ویژگی</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr id="order-{{ $order->id }}">
                                <td>{{ 'PDO-'.$order->id }}</td>
                                <td>{{ $order->user->name.' '.$order->user->last_name }}</td>
                                <td>
                                    {{ jdate($order->created_at)->format('l d S F Y') }}
                                    @if($order->created_at != $order->updated_at)
                                        <span class="text-danger"><small>
                                        ویرایش : {{ jdate($order->updated_at)->ago() }}
                                        </small>
                                    </span>
                                    @endif
                                </td>
                                <td>{{ number_format($order->items->sum('total_price')) .' هزار تومان'}}</td>
                                <td>
                                    @if($order->invoice->payment->where('status', '100')->first())
                                         <span class="badge badge-success">پرداخت شده</span>
                                        @else
                                         <span class="badge badge-{{ $order->status == 'cash_pay' ? 'info' : 'warning'}}"> {{ $order->status == 'cash_pay' ? 'پرداخت در محل' : 'پرداخت نشده'}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('order.show' , ['order' => $order->id]) }}" class="btn btn-success btn-sm">مشاهده سفارش</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>سفارشی یافت نشد</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4 p-2 mr-5">
                            {{ $orders->links() }}
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#Orders').dataTable( {
                "bFilter": false,
                "lengthChange": false,
                "bInfo" : false,
                "paging": false

            } );
        } );
    </script>
    <style>
        table.dataTable.no-footer{
            border:none;
        }
    </style>
@endsection
