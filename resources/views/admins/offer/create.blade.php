@extends('layouts.app')
@section('title')
ایجاد  پیشنهاد های ویژه
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    پیشنهاد های ویژه
                </h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
            <form action="{{ route("offer.store") }}" method="post" class="p-4">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="title">عنوان پیشنهاد</label>
                        <input type="text" name="title" required class="form-control" id="title">
                    </div>
                    <div class="form-group col-6">
                        <label for="model_type">نوع پیشنهاد</label>
                        <select name="model_type" onchange="getDetail()" required id="model_type" class="form-control">
                            <option value="App\Product">محصول</option>
                            <option value="App\Brand">تولید کننده</option>
                            <option value="App\Category">دسته بندی محصولات</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="model_id">شناسه</label>
{{--                        <input type="text" disabled name="model_id" required class="form-control" id="model_id">--}}
                    <select id="model_id" name="model_id" class="form-control">

                    </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="date">تاریخ اتمام پیشنهاد</label>
                       <input type="text" id="date" class="form-control">
                       <input type="hidden" name="screen_end" required id="date-orgin">
                    </div>

                </div>
            </form>
            </div>
            <hr/>
        </div>
    </div>
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#date").pDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#date-orgin'
            });
        });
        function getDetail() {
            $.ajax({
                url:"{{ url("dashboard/offer-option") }}",
                type:"post",
                data:{
                    _token: "{{ csrf_token() }}",
                    model: $("#model_type").val()
                },
                beforeSend:function () { alert("لطفا کمی صبر کنید"); },
                success:function (data) {
                    $("#model_id").empty();
                    data.forEach(function (item) {
                        $("#model_id").append("<option id='" + item.id + "'>" + item.name + "</option>");
                    })
                }
            });
        }
    </script>
@endsection