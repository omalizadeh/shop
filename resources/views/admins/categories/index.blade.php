@extends('admins.layouts.app')
@section('title')
دسته بندی ها
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">دسته بندی مطالب
                    <div class="float-right">
                        <a href="{{route('admins.categories.create')}}" class="btn btn-outline-success">افزودن دسته
                            بندی</a>
                    </div>
                </h6>
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
                        <td>
                            <div class="d-inline-flex">
                                <div>
                                    <a href="{{route('admins.categories.edit',$category->id)}}"
                                        class="btn btn-outline-warning">ویرایش</a>
                                </div>
                                <div>
                                    <form action="{{route('admins.categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger mr-1" type="submit"
                                            onclick="return confirm('آیا از حذف مطمئن هستید؟');">حذف</button>
                                    </form>
                                </div>
                            </div>
                        </td>
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
                <h6 class="m-0">دسته بندی محصولات
                    <div class="float-right">
                        <a href="{{route('admins.categories.create')}}" class="btn btn-outline-success">افزودن دسته
                            بندی</a>
                    </div>
                </h6>
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
                        <td>
                            <div class="d-inline-flex">
                                <div>
                                    <a href="{{route('admins.categories.edit',$category->id)}}"
                                        class="btn btn-outline-warning">ویرایش</a>
                                </div>
                                <div>
                                    <form action="{{route('admins.categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger mr-1" type="submit"
                                            onclick="return confirm('آیا از حذف مطمئن هستید؟');">حذف</button>
                                    </form>
                                </div>
                            </div>
                        </td>
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