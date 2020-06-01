@extends('admins.layouts.app')
@section('title')
تولید کنندگان
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">برندها
                <div class="float-right">
                    <button type="button" class="btn btn-outline-success">افزودن برند</button>
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
                        <button type="button" title="ویرایش" class="btn btn-outline-info">
                            ویرایش
                        </button>
                        <button type="button" title="حذف" class="btn btn-outline-danger">
                            حذف
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