@extends('layouts.app')
@section('title')
    @php
        echo isset($article) ? 'ویرایش مقاله' : 'ایجاد مقاله جدید';
    @endphp
@endsection
@section('content')

    <div class="col-md-12">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">
                    <i class="material-icons">local_printshop</i>
                    افزودن مقاله
                </h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-4 text-center">
                <form method="post"
                      action="{{ isset($article) ?  route('article.update' , ['article' => $article->id ]) : route('article.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if(isset($article))
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
                                               value="{{ isset($article) ? $article->title : old('title') }}"
                                               class="form-control form-control-lg mb-3" type="text"
                                               placeholder="عنوان پست جدید">
                                        <textarea style="text-align: right;" placeholder="توضیحات" name="description" id="editor" class="mb-1">{{ isset($article) ? $article->description : old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @if(isset($article) && $article->media->count() > 0)
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
                                            @forelse($article->media as $media)
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
                                              <strong class="mr-1">وضعیت:</strong> {{ isset($article) ? $article->status_text : 'پیش نویس' }}
                                        </span>
                                            <span class="d-flex mb-2">
                                              <i class="material-icons mr-1">visibility</i>
                                              <strong class="mr-1">ارسال کننده</strong>
                                              <strong class="text-success">{{ isset($article) ? $article->user->last_name .','.$article->user->name : auth()->user()->last_name . ', ' .auth()->user()->name }}</strong>
                                        </span>
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
                            <!-- / Post Overview -->
                            <div id="Categories">
                                @include('dashboard.category')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

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
                        model_type: 'App\\Article',
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
    </script>
@endsection
