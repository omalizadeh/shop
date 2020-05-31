@extends('layouts.app')
@section('title')
    مشتریان
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    لیست {{ isset($title) ? $title.'ان' : 'کاربران' }}
                    <div class="float-right">
                        <form class="p-0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" value="{{ old('search') }}" name="search"
                                           id="search" placeholder=" جستجو کنید">
                                </div>
                                <div class="col-lg-4">
                                    <input type="submit" class="btn btn-success" value="جستجو">
                                </div>
                            </div>
                        </form>
                    </div>
                </h6>

            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">نام {{ isset($title) ? $title : ' ' }}</th>
                        <th scope="col" class="border-0">تاریخ عضویت</th>
                        <th scope="col" class="border-0">آدرس ایمیل</th>
                        <th scope="col" class="border-0">تلفن تماس</th>
                        <th scope="col" class="border-0">ویژگی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr id="$customer-{{ $customer->id }}">
                            <td>1</td>
                            <td>
                                {{ $customer->last_name . ' ' .$customer->name }}
                            </td>
                            <td>
                                {{ jdate($customer->created_at)->format('l d S F Y') }}
                                @if($customer->created_at != $customer->updated_at)
                                    <span class="text-danger"><small>
                                        ویرایش : {{ jdate($customer->updated_at)->ago() }}
                                        </small>
                                    </span>
                                @endif
                            </td>
                            <td>{{ $customer->email }}</td>
                            <td class="text-success">
                                {{ $customer->phone }}
                            </td>
                            <td>
                                <a href="{{ route('DashboardProfile' , ['user' => $customer->id]) }}" title="حدف"
                                   class="btn btn-warning btn-sm">مشاهده {{ isset($title) ? $title : ' ' }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>{{ $title }} یافت نشد</td>
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
            <hr/>
            <div class="ml-3 float-right">{!! $customers->render() !!}</div>
        </div>
    </div>
@endsection
