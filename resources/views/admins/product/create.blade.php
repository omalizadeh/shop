@extends('layouts.app')
@section('title')
 ایجاد محصول جدید
@endsection
@section('content')
    <div class="col-md-12">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">
                    <i class="material-icons">local_printshop</i>
                    افزودن محصول
                </h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-4 text-center">
                <form method="post"
                      action="{{ isset($product) ?  route('product.update' , ['product' => $product->id ]) : route('product.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                        <input type="hidden" value="refresh" name="redirect">
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <!-- Add New Post Form -->
                            <div class="card card-small mb-3">
                                <div class="card-body">
                                    <div class="add-new-post">
                                        <input name="title"
                                               value="{{ isset($product) ? $product->title : old('title') }}"
                                               class="form-control form-control-lg mb-3" type="text"
                                               placeholder="عنوان پست جدید">
                                        <textarea style="text-align: right;" placeholder="توضیحات" name="description"
                                                  id="editor"
                                                  class="mb-1">{{ isset($product) ? $product->description : old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @if(isset($product) && $product->media->count() > 0)
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
                                            @forelse($product->media as $media)
                                                <div class="col-lg-6 col-md-6 col-sm-12 mb-4"
                                                     id="Media-{{ $media->id }}">
                                                    <div class="card card-small card-post card-post--1">
                                                        <div class="card-post__image"
                                                             style="background-image: url('{{ asset($media->patch.$media->name) }}');">
    <span onclick="Media('delete','{{ $media->id }}')"
          class="card-post__category badge badge-pill badge-danger"><i
                class="material-icons">remove_circle</i> حذف کردن </span>
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
                                <div class="card-header">
                                    <h6>
                                        <span class="float-left">ویژگی ها</span>
                                        {{--<small>--}}
                                            {{--<button type="button" onclick="duplicator()"--}}
                                                    {{--class="btn btn-sm btn-outline-warning rounded p-1 float-right"--}}
                                                    {{--id="add">--}}
                                                {{--<i class="fa fa-plus"></i>--}}
                                                {{--افزودن لیست ویژگی--}}
                                            {{--</button>--}}
                                        {{--</small>--}}
                                    </h6>
                                </div>
                                <div class="card-body" id="OptionsBox">
                                    <div class="row p-0" id="Option-1" parent_id="1">
                                        <div class="col-lg-12 row">
                                            <div class="col-lg-12">
                                                <label for="property">
                                                    عنوان ویژگی
                                                </label>
                                                <input required type="text" id="property"
                                                       name="property[options][1][title]"
                                                       class="form-control">
                                            </div>
                                            <div id="row-1" class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6 form-group">
                                                        <label for="property">
                                                            ویژگی
                                                        </label>
                                                        <input required type="text" id="property"
                                                               name="property[options][1][data][1][foo]"
                                                               class="form-control">
                                                    </div>
                                                    <div class="col-lg-6 form-group">
                                                        <label for="property">توضیحات</label>
                                                        <input required type="text" id="property"
                                                               name="property[options][1][data][1][bar]"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-accent rounded p-1 float-left"
                                                    onclick="AddInput(1)"><i class="fa fa-plus"></i> افزودن ویژگی
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- card -->
                            </div>

                            <div class="card card-small mb-3">
                                <div class="card-header">
                                    <h6>
                                        <span class="float-left">تنظیمات سئو</span>
                                    </h6>
                                </div>
                                <div class="card-body" id="SeoBox">
                                    <div class="form-group">
                                        <label for="SeoDescription">توضیحات سئو</label>
                                        <textarea class="form-control" id="SeoDescription" name="property[Seo][description]" placeholder="توضیحات مختصر برای موتور های جستجوگر"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label for="SeoTag">برچسب ها</label>
                                            <input required type="text" class="form-control" id="SeoTag" name="property[Seo][tags]" value="" placeholder="با , جدا شود">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="InstagramTag">لینک اشتراک اینستاگرام</label>
                                            <input type="url" class="form-control" id="InstagramTag" name="property[Seo][social][instagram]" value="" placeholder="https://instagram.com">
                                        </div>
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <!-- Post Overview -->
                            <div class='card card-small mb-3'>
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">ابزارها</h6>
                                </div>
                                <div class='card-body p-0'>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
     <span class="d-flex mb-2">
    <i class="material-icons mr-1">flag</i>
    <strong class="mr-1">وضعیت:</strong> {{ isset($product) ? $product->status_text : 'پیش نویس' }}
     </span>
                                            <span class="d-flex mb-2">
    <i class="material-icons mr-1">visibility</i>
    <strong class="mr-1">ارسال کننده</strong>
    <strong class="text-success">{{ isset($product) ? $product->user->last_name .','.$product->user->name : auth()->user()->last_name . ', ' .auth()->user()->name }}</strong>
     </span>
                                        </li>
                                        <li class="list-group-item p-3">
                                            <label for="ProductStatus">وضیعت انتشار</label>
                                            {{--'show', 'catalog', 'check', 'delete--}}
                                            <select name="status" id="ProductStatus" class="form-control">
                                                <option value="show">نمایش و فروش در سایت</option>
                                                <option value="catalog">حالت کاتالوگ</option>
                                                <option value="check">پیشنویس</option>
                                            </select>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <button class="btn btn-sm btn-accent ml-auto" type="submit">
                                                <i class="material-icons">file_copy</i> انتشار
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / Post Overview -->
                            <!-- Post Overview -->
                            <div class='card card-small mb-3'>
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">تصویر پیشفرض</h6>
                                    <small>( قابلیت انتخاب چند تصویر)</small>
                                </div>
                                <div class='card-body p-2'>
                                    <label for="photo"></label>
                                    <input accept="image/jpeg,image/jpg,image/png,image/gif" type="file" id="photo"
                                           multiple name="file[]">
                                </div>
                            </div>
                            <div class='card card-small mb-3'>
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">شناسه محصول</h6>
                                </div>
                                <div class='card-body p-2'>
                                    <label for="barcode">شناسه محصول را وارد کنید</label>
                                    <input type="text" required class="form-control" placeholder="مثال : 123456789"
                                           name="barcode" onchange="BarcodeCheck()" id="barcode">
                                </div>
                            </div>
                            <!-- / Post Overview -->
                            <div id="Categories">
                                @include('dashboard.category')
                            </div>
                            <div id="Brands">
                                @include('dashboard.brand')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {contentsLangDirection: 'rtl'});

        function Media(method, media) {
            if (method === 'delete') {
                WarningTost('آیا واقعا میخواهید این تصویر را پاک کنید؟', function () {
                    $.ajax({
                        url: '{{ route('media.index') }}/' + media,
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'delete' }}',
                            media: media
                        },
                        success: function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#Media-" + media).remove();
                        },
                        error: function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                });
            }
        }

        function AddCategory() {
            var name, parent_id;
            name = $('#CategoryName').val();
            parent_id = $('#CategoryParent').val();
            if (name === "") {
                iziToast.error({
                    message: 'لطفا مقدار ارسالی خود را چک کنید'
                });
            } else {
                $.ajax({
                    url: '{{ route('category.store') }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        model_type: 'App\\Product',
                        parent_id: parent_id,
                    },
                    success: function (data) {
                        $('#Categories').empty();
                        $('#Categories').append(data.view);
                        console.log([$('#Categories'), data.view]);
                        data.messages.forEach(function (key) {
                            iziToast.info({
                                message: key
                            });
                        });
                    }
                });
            }
        }

        function AddBrand() {
            var name = $('#BrandName').val();
            if (name === "") {
                iziToast.error({
                    message: 'لطفا مقدار ارسالی خود را چک کنید'
                });
            } else {
                $.ajax({
                    url: '{{ route('brand.store') }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        model_type: 'App\\Product',
                    },
                    success: function (data) {
                        $('#Brands').empty();
                        $('#Brands').append(data.view);
                        console.log([$('#Brands'), data.view]);
                        data.messages.forEach(function (key) {
                            iziToast.info({
                                message: key
                            });
                        });
                    }
                });
            }
        }

        function BarcodeCheck() {
            $.ajax({
                url: '{{ route('UniqueBarcode') }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    barcode: $('#barcode').val()
                },
                success: function (data) {
                    if (data.result === true) {
                        $('#barcode').empty();
                        iziToast.error({
                            message: data.message
                        });
                    }
                },
            });
        }

        var optionsCount = 1;

        function deleteInput(id) {
            $('#input-type-' + id).remove();
        }

        function RemoveInput(row) {
            $('#input-row-' + row).remove();
        }

        function AddInput(row) {
            var Inputlength = $('#row-' + row).find('input').length;
            var InputNumber = Inputlength / 2;
            $('#row-' + row).append('<div class="form-row" id="input-row-' + InputNumber + '">' +
                '<div class="col-lg-6 form-group">' +
                '<label for="property">ویژگی</label>' +
                '<input class="form-control" id="property" name="property[options][' + row + '][data][' + InputNumber + '][foo]" required="" type="text">' +
                '</div>' +
                '<div class="col-lg-6 form-group">' +
                '<label for="property">توضیحات</label>' +
                '<input class="form-control" id="property" name="property[options][' + row + '][data][' + InputNumber + '][bar]" required="" type="text">' +
                '<span class="text-warning" onclick="RemoveInput(' + InputNumber + ')"><i class="fa fa-remove"></i> <small>حدف کردن</small></span>' +
                '</div>');
        }

        function RemoveGroup(option) {
            $('#Option-' + option).remove();
        }

        function duplicator() {
            optionsCount = optionsCount + 1;
            $('#OptionsBox').append('<div class="row p-0" id="Option-' + optionsCount + '" parent_id="' + optionsCount + '">' +
                '  <div class="col-lg-12 row">' +
                '    <div class="col-lg-12">' +
                '      <label for="property">' +
                ' عنوان ویژگی' +
                '<a onclick="RemoveGroup(' + optionsCount + ')" id="add"> [ - ] </a>' +
                '      </label>' +
                '      <input required type="text" id="property" name="property[options][\'+optionsCount+\'][title]" class="form-control">' +
                '    </div>' +
                '    <div id="row-' + optionsCount + '" class="col-lg-12">' +
                '      <div class="row">' +
                ' <div class="col-lg-6 form-group">' +
                '   <label for="property">' +
                '     ویژگی' +
                '   </label>' +
                '   <input required type="text" id="property" name="property[options][' + optionsCount + '][data][1][foo]" class="form-control">' +
                ' </div>' +
                ' <div class="col-lg-6 form-group">' +
                '   <label for="property">توضیحات</label>' +
                '   <input required type="text" id="property" name="property[options][' + optionsCount + '][data][1][bar]" class="form-control">' +
                ' </div>' +
                '      </div>' +
                '    </div>' +
                '  </div>' +
                '  <div class="col-lg-12">' +
                '    <button type="button" class="btn btn-sm btn-outline-accent rounded p-1 float-left" onclick="AddInput(' + optionsCount + ')"><i class="fa fa-plus"></i> افزودن ویژگی </button>' +
                '  </div>' +
                '</div>');
        }
    </script>
@endsection
