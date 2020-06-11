@extends('layouts.app')
@section('title')
محصولات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">
                لیست محصولات
                <div class="float-right">
                    <a href="{{ route('admins.products.create') }}" class="btn btn-outline-success">
                        <i class="material-icons">text_rotation_none</i> افزودن محصول جدید
                    </a>
                    {{-- <a href="{{ route('product.index') }}?status=delete" class="btn btn-outline-warning">
                    <i class="material-icons">restore_from_trash</i> محصولات حدف شده
                    </a> --}}
                </div>
            </h6>
        </div>
        <div class="card-body p-0 pb-3 text-center">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">نام</th>
                        <th scope="col" class="border-0">برند</th>
                        <th scope="col" class="border-0">کد داخلی</th>
                        <th scope="col" class="border-0">دسته بندی</th>
                        <th scope="col" class="border-0">فعال</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0">دسترسی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>{{ $product->getBrandName() }}</td>
                        <td>{{ $product->getBarcode() }}</td>
                        <td>{{ $product->getDefaultCategoryName() }}</td>
                        @if($product->isActive())
                        <td class="text-success">فعال</td>
                        @else
                        <td class="text-danger">غیرفعال</td>
                        @endif
                        <td>{{ $product->getFarsiCreatedAtDateTime()}}</td>
                        <td>
                            <div class="d-inline-flex">
                                <div>
                                    <a href="{{route('admins.attribute-groups.show',$group->id)}}"
                                        class="btn btn-outline-success">مشاهده</a>
                                </div>
                                <div>
                                    <a href="{{route('admins.attribute-groups.edit',$group->id)}}"
                                        class="btn btn-outline-warning mr-2">ویرایش</a>
                                </div>
                                <div>
                                    <form action="{{route('admins.attribute-groups.destroy',$group->id)}}"
                                        method="post">
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
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>محصول ای یافت نشد</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <hr />
        <div class="ml-3 float-right">{!! $products->links() !!}</div>
    </div>
</div>
@endsection