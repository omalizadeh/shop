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
                افزودن محصول
            </h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4 text-center">
            <div class="alert alert-warning">برای درج تصاویر و ویژگی های محصول، پس از ثبت، از قسمت ویرایش محصول استفاده
                کنید.</div>
            <form method="post" action="{{ route('admins.products.store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <!-- Add New Post Form -->
                        <div class="card card-small mb-3">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">
                                    <span class="float-left">نام و توضیحات</span>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="name">نام محصول</label>
                                        <input name="name" value="{{old('name')}}"
                                            class="form-control form-control-lg mb-3" type="text"
                                            placeholder="نام محصول">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="description">توضیحات</label>
                                        <textarea style="text-align: right;" placeholder="توضیحات" name="description"
                                            id="editor" class="mb-1">{{old('description')}}</textarea>
                                    </div>
                                </div>
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
                                        <label for="meta_title">عنوان</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            placeholder="عنوان مطلب برای موتور های جستجوگر">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="meta_description">توضیحات</label>
                                        <input type="text" class="form-control" name="meta_description"
                                            placeholder="توضیحات مختصر برای موتور های جستجوگر">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="tags">برچسب ها</label>
                                        <input type="text" class="form-control" name="tags" value="{{old('tags')}}"
                                            placeholder="با , جدا شود">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="insta_link">لینک محصول در اینستاگرام</label>
                                        <input type="url" class="form-control" name="insta_link"
                                            value="{{old('insta_link')}}" placeholder="https://instagram.com/post">
                                    </div>
                                </div>
                            </div><!-- card -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <!-- Post Overview -->
                        <div class='card card-small mb-3'>
                            <div class="card-header border-bottom">
                                <h6 class="m-0">شناسه داخلی محصول</h6>
                            </div>
                            <div class='card-body p-2'>
                                <label for="barcode">شناسه داخلی محصول را وارد کنید</label>
                                <input type="text" class="form-control" name="barcode">
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
                <button type="submit" class="btn btn-lg btn-primary float-left">ثبت محصول</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace('editor', {contentsLangDirection: 'rtl'});

    //     function Media(method, media) {
    //         if (method === 'delete') {
    //             WarningTost('آیا واقعا میخواهید این تصویر را پاک کنید؟', function () {
    //                 $.ajax({
    //                     url: '{{ route('media.index') }}/' + media,
// type: 'post',
// data: {
// _token: '{{ csrf_token() }}',
// _method: '{{ 'delete' }}',
// media: media
// },
// success: function (data) {
// data.messages.forEach(function (key) {
// iziToast.info({
// message: key
// });
// });
// $("#Media-" + media).remove();
// },
// error: function (data) {
// data.messages.forEach(function (key) {
// iziToast.info({
// message: key
// });
// });
// }
// });
// });
// }
// }

// function AddCategory() {
// var name, parent_id;
// name = $('#CategoryName').val();
// parent_id = $('#CategoryParent').val();
// if (name === "") {
// iziToast.error({
// message: 'لطفا مقدار ارسالی خود را چک کنید'
// });
// } else {
// $.ajax({
// url: '{{ route('category.store') }}',
// type: 'post',
// data: {
// _token: '{{ csrf_token() }}',
// name: name,
// model_type: 'App\\Product',
// parent_id: parent_id,
// },
// success: function (data) {
// $('#Categories').empty();
// $('#Categories').append(data.view);
// console.log([$('#Categories'), data.view]);
// data.messages.forEach(function (key) {
// iziToast.info({
// message: key
// });
// });
// }
// });
// }
// }

// function AddBrand() {
// var name = $('#BrandName').val();
// if (name === "") {
// iziToast.error({
// message: 'لطفا مقدار ارسالی خود را چک کنید'
// });
// } else {
// $.ajax({
// url: '{{ route('brand.store') }}',
// type: 'post',
// data: {
// _token: '{{ csrf_token() }}',
// name: name,
// model_type: 'App\\Product',
// },
// success: function (data) {
// $('#Brands').empty();
// $('#Brands').append(data.view);
// console.log([$('#Brands'), data.view]);
// data.messages.forEach(function (key) {
// iziToast.info({
// message: key
// });
// });
// }
// });
// }
// }

// function BarcodeCheck() {
// $.ajax({
// url: '{{ route('UniqueBarcode') }}',
// type: 'post',
// data: {
// _token: '{{ csrf_token() }}',
// barcode: $('#barcode').val()
// },
// success: function (data) {
// if (data.result === true) {
// $('#barcode').empty();
// iziToast.error({
// message: data.message
// });
// }
// },
// });
// }

// var optionsCount = 1;

// function deleteInput(id) {
// $('#input-type-' + id).remove();
// }

// function RemoveInput(row) {
// $('#input-row-' + row).remove();
// }

// function AddInput(row) {
// var Inputlength = $('#row-' + row).find('input').length;
// var InputNumber = Inputlength / 2;
// $('#row-' + row).append('<div class="form-row" id="input-row-' + InputNumber + '">' +
    // '<div class="col-lg-6 form-group">' +
        // '<label for="property">ویژگی</label>' +
        // '<input class="form-control" id="property"
            name="property[options][' + row + '][data][' + InputNumber + '][foo]" required="" type="text">' +
        // '</div>' +
    // '<div class="col-lg-6 form-group">' +
        // '<label for="property">توضیحات</label>' +
        // '<input class="form-control" id="property"
            name="property[options][' + row + '][data][' + InputNumber + '][bar]" required="" type="text">' +
        // '<span class="text-warning" onclick="RemoveInput(' + InputNumber + ')"><i class="fa fa-remove"></i>
            <small>حدف کردن</small></span>' +
        // '</div>');
    // }

    // function RemoveGroup(option) {
    // $('#Option-' + option).remove();
    // }

    // function duplicator() {
    // optionsCount = optionsCount + 1;
    // $('#OptionsBox').append('<div class="row p-0" id="Option-' + optionsCount + '" parent_id="' + optionsCount + '">'
        +
        // ' <div class="col-lg-12 row">' +
            // ' <div class="col-lg-12">' +
                // ' <label for="property">' +
                    // ' عنوان ویژگی' +
                    // '<a onclick="RemoveGroup(' + optionsCount + ')" id="add"> [ - ] </a>' +
                    // ' </label>' +
                // ' <input required type="text" id="property" name="property[options][\'+optionsCount+\'][title]"
                    class="form-control">' +
                // ' </div>' +
            // ' <div id="row-' + optionsCount + '" class="col-lg-12">' +
                // ' <div class="row">' +
                    // ' <div class="col-lg-6 form-group">' +
                        // ' <label for="property">' +
                            // ' ویژگی' +
                            // ' </label>' +
                        // ' <input required type="text" id="property"
                            name="property[options][' + optionsCount + '][data][1][foo]" class="form-control">' +
                        // ' </div>' +
                    // ' <div class="col-lg-6 form-group">' +
                        // ' <label for="property">توضیحات</label>' +
                        // ' <input required type="text" id="property"
                            name="property[options][' + optionsCount + '][data][1][bar]" class="form-control">' +
                        // ' </div>' +
                    // ' </div>' +
                // ' </div>' +
            // ' </div>' +
        // ' <div class="col-lg-12">' +
            // ' <button type="button" class="btn btn-sm btn-outline-accent rounded p-1 float-left"
                onclick="AddInput(' + optionsCount + ')"><i class="fa fa-plus"></i> افزودن ویژگی </button>' +
            // ' </div>' +
        // '</div>');
    // }
    </script>
    --}}
    @endsection