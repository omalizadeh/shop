@extends('admins.layouts.app')
@section('title')
گروه ویژگی ها
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">گروه ویژگی ها
                <div class="float-right">
                    <button type="button" class="btn btn-outline-success">افزودن گروه</button>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">نام گروه</th>
                    <th scope="col" class="border-0">موقعیت</th>
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($featureGroups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->getName() }}</td>
                    <td>{{ $group->getPosition() }}</td>
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