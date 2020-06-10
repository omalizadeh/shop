@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">مقادیر ترکیب | {{$group->getName()}}
                <div class="float-right">
                    <a href="{{route('admins.attribute-groups.add_attribute',$group->id)}}"
                        class="btn btn-outline-success">افزودن
                        مقدار</a>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">مقدار</th>
                    @if($group->isColor())
                    <th scope="col" class="border-0">رنگ</th>
                    @endif
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attributes as $attribute)
                <tr>
                    <td>{{ $attribute->id }}</td>
                    <td>{{ $attribute->getValue() }}</td>
                    @if($group->isColor())
                    <td>
                        <button class="btn btn-circle" style="background-color: {{ $attribute->getColor() }}"></button>
                    </td>
                    @endif
                    <td>
                        <div class="d-inline-flex">
                            <div>
                                <a href="{{route('admins.attributes.edit',$attribute->id)}}"
                                    class="btn btn-outline-warning mr-2">ویرایش</a>
                            </div>
                            <div>
                                <form action="{{route('admins.attributes.destroy',$attribute->id)}}" method="post">
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