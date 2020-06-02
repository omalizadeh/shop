@extends('admins.layouts.app')
@section('title')
ویژگی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">ویژگی ها
                <div class="float-right">
                    <a href="{{route('admins.features.create')}}" class="btn btn-outline-success">افزودن ویژگی</a>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">نام</th>
                    <th scope="col" class="border-0">موقعیت</th>
                    <th scope="col" class="border-0">گروه</th>
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($features as $feature)
                <tr>
                    <td>{{ $feature->id }}</td>
                    <td>{{ $feature->getName() }}</td>
                    <td>{{ $feature->getPosition() }}</td>
                    <td>{{ $feature->getFeatureGroupName() }}</td>
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