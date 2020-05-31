@extends('layouts.app')
@section('title')
تولید کنندگان
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">تولید کننده
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-success">افزودن تولید کننده جدید</button>
                    </div>
                </h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">عنوان تولید کننده</th>
                    <th scope="col" class="border-0">ویژگی</th>
                </tr>
                </thead>
                <tbody>
                @forelse($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <button type="button" title="ویرایش تولید کننده " onclick="Changebrand('{{ $brand->id }}')" class="btn btn-outline-info">
                                ویرایش تولید کننده
                            </button>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function Changebrand() {
            iziToast.info({
                title:'به زودی'
            });
            // $.ajax({
            //     url: '',
            //     type: 'post',
            //     data: {
                    {{--_token: '{{ csrf_token() }}',--}}
                // },
                // success:function (data) {
                //
                // }
            // });
        }
    </script>
@endsection
