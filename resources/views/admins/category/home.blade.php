@extends('layouts.app')
@section('title')
  دسته بندی ها
@endsection
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">دسته بندی مقالات</h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">عنوان دسته بندی</th>
                    <th scope="col" class="border-0">زیر مجموعه</th>
                    <th scope="col" class="border-0">نوع دسته</th>
                    <th scope="col" class="border-0">ویژگی</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories->where('model_type' , 'App\\Article') as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent == 0 ? 'ندارد' : 'ندارد' }}</td>
                        <td>{{ 'مقالات' }}</td>
                        <td>
                            <button type="button" title="ویرایش دسته" onclick="deletePrice('{{ $category->id }}')" class="btn btn-outline-info">
                                ویرایش دسته
                            </button>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">دسته بندی محصولات</h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">عنوان دسته بندی</th>
                    <th scope="col" class="border-0">زیر مجموعه</th>
                    <th scope="col" class="border-0">نوع دسته</th>
                    <th scope="col" class="border-0">ویژگی</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories->where('model_type' , 'App\\Product') as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent == 0 ? 'ندارد' : 'ندارد' }}</td>
                        <td>{{ 'محصولات' }}</td>
                        <td>
                            <button type="button" title="ویرایش دسته" onclick="ChangeCategory()" class="btn btn-outline-info">
                                ویرایش دسته
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
        function ChangeCategory() {
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
