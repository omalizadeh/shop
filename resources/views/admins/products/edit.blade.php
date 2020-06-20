@extends('admins.layouts.app')
@section('title')
محصولات
@endsection
@section('content')
<div class="col-md-12">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">
                <i class="material-icons">local_printshop</i>
                ویرایش محصول
            </h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4 text-center">
            <form method="post" action="{{ route('admins.products.update',$product->id)}}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <!-- Add New Post Form -->
                        <div class="card card-small mb-3">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">
                                    <span class="float-left">مشخصات محصول</span>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="name">نام محصول</label>
                                        <input name="name" value="{{$product->getName()}}"
                                            class="form-control form-control-lg mb-3" type="text"
                                            placeholder="نام محصول">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="description">توضیحات</label>
                                        <textarea style="text-align: right;" placeholder="توضیحات" name="description"
                                            id="editor" class="mb-1">{{$product->getDescription()}}</textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-4">
                                        <label for="price">قیمت پایه</label>
                                        <input name="price" value="{{$product->getPrice()}}"
                                            class="form-control form-control-lg mb-3" type="number" min="0"
                                            placeholder="150000">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="weight">وزن (کیلوگرم)</label>
                                        <input name="weight" value="{{$product->getWeight()}}"
                                            class="form-control form-control-lg mb-3" type="text" placeholder="1.250">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="stock">موجودی در انبار</label>
                                        <input name="stock" value="{{$product->getStock()}}"
                                            class="form-control form-control-lg mb-3" type="number" min="0"
                                            placeholder="5">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-4">
                                        <label for="on_sale">وضعیت</label>
                                        <select name="on_sale" class="form-control">
                                            <option value="0">ناموجود</option>
                                            <option value="1" @if($product->isOnSale()) selected @endif>موجود برای فروش
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($product) && $product->images->count() > 0)
                        <div class="page-header row no-gutters py-4">
                            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                <h3 class="page-title">
                                    <i class="material-icons">perm_media</i>
                                    تصاویر
                                </h3>
                            </div>
                        </div>
                        <div class="card card-small mb-3">
                            <div class="card-body">
                                <div class="row p-2">
                                    @forelse($product->images as $image)
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4" id="Media-{{ $image->id }}">
                                        <div class="card card-small card-post card-post--1">
                                            <div class="card-post__image"
                                                style="background-image: url('{{ URL::to($image->getURL()) }}');">
                                                <button class="card-post__category badge badge-pill badge-danger"
                                                    onclick="event.preventDefault(); deleteImage('{{$image->id}}');"><i
                                                        class="material-icons">remove_circle</i> حذف کردن </button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- / Add New Post Form -->
                        @endif
                        <div class="card card-small mb-3">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">
                                    <span class="float-left">ویژگی ها</span>
                                </h6>
                            </div>
                            <div class="card-body">
                                @foreach ($features as $feature)
                                @php
                                if(isset($product)){
                                $productFeatures = $product->features;
                                }
                                @endphp
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="{{$feature->id}}">{{$feature->getName()}}</label>
                                        <input type="text" class="form-control" name="features[{{$feature->id}}]"
                                            id="{{$feature->id}}"
                                            value="@if(isset($productFeatures) && $productFeatures->contains('id',$feature->id)) {{$productFeatures->firstWhere('id',$feature->id)->pivot->value}} @endif">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card card-small mb-3">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">
                                    <span class="float-left">تنظیمات سئو</span>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="slug">نامک</label>
                                        <input type="text" class="form-control" name="slug" placeholder="نامک (انگلیسی)"
                                            value="{{$product->getSlug()}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="meta_title">عنوان</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            placeholder="عنوان مطلب برای موتور های جستجوگر"
                                            value="{{$product->getMetaTitle()}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="meta_description">توضیحات</label>
                                        <input type="text" class="form-control" name="meta_description"
                                            placeholder="توضیحات مختصر برای موتور های جستجوگر"
                                            value="{{$product->getMetaDescription()}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="insta_link">لینک محصول در اینستاگرام</label>
                                        <input type="url" class="form-control" name="insta_link"
                                            value="{{$product->getInstaLink()}}"
                                            placeholder="https://instagram.com/post">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- Post Overview -->
                        <div class='card card-small mb-3'>
                            <div class="card-header border-bottom">
                                <h6 class="m-0">شناسه</h6>
                            </div>
                            <div class='card-body p-2'>
                                <label for="barcode">شناسه داخلی محصول</label>
                                <input type="text" class="form-control" name="barcode"
                                    value="{{$product->getBarcode()}}">
                            </div>
                        </div>
                        <div class='card card-small mb-3'>
                            <div class="card-header border-bottom">
                                <h6 class="m-0">تصویر پیشفرض</h6>
                                <small>( قابلیت انتخاب چند تصویر)</small>
                            </div>
                            <div class='card-body p-2'>
                                <label for="images"></label>
                                <input accept="image/jpeg,image/jpg,image/png,image/gif" type="file" id="images"
                                    multiple name="images[]">
                            </div>
                        </div>
                        <!-- / Post Overview -->
                        <div id="Categories">
                            @include('admins.products.categories')
                        </div>
                        <div id="Brands">
                            @include('admins.products.brands')
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary float-left">بروزرسانی</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('panel-assets/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('panel-assets/tinymce/editor.js')}}"></script>
<script>
    function deleteImage(image) {
                WarningTost('آیا واقعا میخواهید این تصویر را پاک کنید؟', function () {
                    $.ajax({
                        url: '{{ route('admins.images.index') }}/' + image,
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'delete' }}',
                            image: image
                        },
                        success: function (res) {
                                iziToast.success({
                                    message: res.message
                                });
                            $("#Media-" + image).remove();
                        },
                        error: function (res) {
                                iziToast.error({
                                    message: res.message
                                });
                            }
                    });
                });
        }
</script>
@endsection