@extends('admins.layouts.app')
@section('title')
کاربران
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">کاربران
                <div class="float-right">
                    <a href="{{route('admins.users.create')}}" class="btn btn-outline-success">افزودن کاربر</a>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">نام</th>
                    <th scope="col" class="border-0">نام خانوادگی</th>
                    <th scope="col" class="border-0">شماره همراه</th>
                    <th scope="col" class="border-0">وضعیت</th>
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->getFirstName() }}</td>
                    <td>{{ $user->getLastName() }}</td>
                    <td>{{ $user->getMobile() }}</td>
                    @if($user->isOnline())
                    <td class="text-success">آنلاین</td>
                    @else
                    <td class="text-danger">آفلاین</td>
                    @endif
                    <td>
                        <div class="d-inline-flex">
                            <div>
                                <a href="{{route('admins.users.edit',$user->id)}}"
                                    class="btn btn-outline-warning">ویرایش</a>
                            </div>
                            <div>
                                <form action="{{route('admins.users.destroy',$user->id)}}" method="post">
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
@endsection