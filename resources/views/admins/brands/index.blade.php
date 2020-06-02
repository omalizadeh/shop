@extends('admins.layouts.app')
@section('title')
برندها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">برندها
                <div class="float-right">
                    <a href="{{route('admins.brands.create')}}" class="btn btn-outline-success">افزودن برند</a>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">نام برند</th>
                    <th scope="col" class="border-0">نامک</th>
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->getName() }}</td>
                    <td>{{ $brand->getSlug() }}</td>
                    <td>
                        <div class="d-inline-flex">
                            <div>
                                <a href="{{route('admins.brands.edit',$brand->id)}}"
                                    class="btn btn-outline-warning">ویرایش</a>
                            </div>
                            <div>
                                <form action="{{route('admins.brands.destroy',$brand->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger mr-1" type="submit"
                                        onclick="return confirm('آیا از حذف مطمئن هستید؟');">حذف</button>
                                </form>
                            </div>
                        </div>
                        {{-- <button type="button" title="حذف" class="btn btn-outline-danger">
                            حذف
                        </button> --}}
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection