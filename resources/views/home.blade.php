@extends('page.layouts.app')

@section('load')
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">ناحیه کاربری</h1>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                @include("page.option.sidebar-home")
            </div>
            <!-- Orders Table-->
            <div class="col-lg-8 pb-5">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>شناسه صورتحساب</th>
                            <th>تاریخ ثبت سفارش</th>
                            <th>وضیعت</th>
                            <th>هزینه کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td><a class="navi-link" href="#order-details" data-toggle="modal">PDO-{{ $order->id }}</a></td>
                                <td>
                                    {{ jdate($order->updated_at)->format('l d S F Y ساعت : H:i') }}
                                </td>
                                <td>
                                    <span class="badge badge-{{ $order->status == 'cash_pay' ? 'info' : 'danger'}}"> {{ $order->status == 'cash_pay' ? 'پرداخت در محل' : 'پرداخت نشده'}}</span>

                                </td>
                                <td><span>{{ number_format($order->items->sum('total_price')) .' هزار تومان'}}</span></td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection

@section('title')
    ناحیه کاربری
@endsection
