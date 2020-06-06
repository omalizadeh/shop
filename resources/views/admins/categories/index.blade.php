@extends('admins.layouts.app')
@section('title')
دسته بندی ها
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">دسته بندی مطالب</h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">نام</th>
                        <th scope="col" class="border-0">دسته بندی مادر</th>
                        <th scope="col" class="border-0">نامک</th>
                        <th scope="col" class="border-0">دسترسی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articleCategories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td>{{ $category->parent === null ? '-' : $category->parent->getName() }}</td>
                        <td>{{ $category->getSlug() }}</td>
                        <td> - </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row pt-3">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">دسته بندی محصولات</h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">نام</th>
                        <th scope="col" class="border-0">دسته بندی مادر</th>
                        <th scope="col" class="border-0">نامک</th>
                        <th scope="col" class="border-0">دسترسی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productCategories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td>{{ $category->parent === null ? '-' : $category->parent->getName() }}</td>
                        <td>{{ $category->getSlug() }}</td>
                        <td> - </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
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