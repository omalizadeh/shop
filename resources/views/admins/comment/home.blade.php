@extends('layouts.app')

@section('content')
    <div class="col-lg-12 p-0">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">کاربران</span>
                <h3 class="page-title">دیدگاه ها</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-12 row p-0">
        @forelse($comments as $comment)

            @php
                $model = 'محصول';
                if ($comment->model_type == 'App\\Product'){
                     $model_text = 'محصول';
                     $model = \App\Product::with('Media')->where('id',$comment->model_id)->first();
                  }
                elseif ($comment->model_type == 'App\\Article'){
                     $model_text = 'مقاله';
                     $model = \App\Article::with('Media')->where('id',$comment->model_id)->first();
                }
            @endphp
            <div class="col-lg-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--aside card-post--1">
                    <div class="card-post__image"
                         style="background-image: url('{{ asset($model->media[0]->patch.$model->media[0]->name) }}');">
                        <a href="#"
                           class="card-post__category badge badge-pill badge-{{$comment->StatusText['class']}}">{{ $comment->statusText['text'] }}</a>
                        <div class="card-post__author d-flex">
                            <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                               style="background-image: url('{{ $comment->user->avatar }}');"> {{ $comment->user->name }} </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-fiord-blue" href="">{{ $model->title }}
                                <small>({{ $model_text }})</small>
                            </a>
                        </h5>
                        <p class="card-text d-inline-block mb-3">
                            {{ $comment->text }}
                        </p>
                        <span class="text-muted">{{ jdate($comment->created_at)->format('l d S F Y') }}</span>
                        <hr/>
                        <div class="blog-comments__actionsmt float-right">
                            <div class="btn-group btn-group-sm">
                                @if($comment->status == 'show')
                                    <button type="button" onclick="Comment('{{ $comment->id }}','check')"
                                            class="btn btn-white">
                              <span class="text-info">
                                <i class="material-icons">check</i>
                              </span> نیاز به بازبینی
                                    </button>
                                @else
                                    <button type="button" onclick="Comment('{{ $comment->id }}','show')"
                                            class="btn btn-white">
                              <span class="text-success">
                                <i class="material-icons">check</i>
                              </span> تایید
                                    </button>
                                @endif
                                <button type="button" class="btn btn-white"
                                        onclick="Comment('{{ $comment->id }}','delete')">
                              <span class="text-danger">
                                <i class="material-icons">clear</i>
                              </span> رد / حذف
                                </button>
                                <button type="button" class="btn btn-white"
                                        onclick="Comment('{{ $comment->id }}','replay')">
                              <span class="text-warning">
                                <i class="material-icons">error</i>
                              </span> پاسخ به دیدگاه
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-info col-lg-12">هیچ دیدگاهی ثبت نشده است !</div>
                @endforelse
            </div>
    {{ $comments->render() }}
@endsection
@section('script')
    <div id="CommentModal"></div>
    <script>
        function Comment(CommentID,action) {
            if(action === 'delete'){
                WarningTost('آیا مطمن هستید از کاری که میکنید ؟',function () {
                    $.ajax({
                        url: '{{ route('comment.index') }}/' + CommentID,
                        type: 'post',
                        beforeSend:function(){
                            iziToast.info({
                                title:'لطفا کمی صبر کنید.'
                            });
                        },
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success:function (data) {
                            iziToast.success({
                                title: data.messages
                            });
                            $('#Comment-'+ CommentID).remove();
                            setTimeout(function () {
                                document.location.reload()
                            },2000)
                        },error:function (data) {
                            iziToast.error({
                                title: data.messages
                            });
                        }
                    });
                })
            }
            if (action === 'show' || action === 'check'){
                $.ajax({
                    url: '{{ route('comment.index') }}/' + CommentID,
                    type: 'post',
                    beforeSend:function(){
                        iziToast.info({
                            title:'لطفا کمی صبر کنید.'
                        });
                    },
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        status:  action
                    },
                    success:function (data) {
                        iziToast.success({
                            title: data.messages
                        });
                        setTimeout(function () {
                            document.location.reload()
                        },2000)
                    },error:function (data) {
                        iziToast.error({
                            title: data.messages
                        });
                    }
                });
            }
            if (action === 'replay'){
                $.ajax({
                    url: '{{ route('comment.index') }}/' + CommentID + '/replay',
                    type: 'get',
                    beforeSend:function(){
                        iziToast.info({
                            title:'لطفا کمی صبر کنید.'
                        });
                    },
                    success:function (data) {
                        $('#CommentModal').empty().append(data);
                        $('#comment-modal-'+CommentID).modal('show');
                    },error:function (data) {
                        iziToast.error({
                            title: data.messages
                        });
                    }
                });
            }
            if (action === 'SendReplay'){
                if ($('#ReplayText-'+CommentID).val() != ''){
                    $.ajax({
                        url: '{{ route('comment.index') }}/' + CommentID + '/replay',
                        type: 'post',
                        beforeSend:function(){
                            iziToast.info({
                                title:'لطفا کمی صبر کنید.'
                            });
                        },
                        data:{
                            text: $('#ReplayText-'+CommentID).val(),
                            _token: '{{ csrf_token() }}',
                        },
                        success:function (data) {
                            iziToast.success({
                                title: data.messages
                            });
                            setTimeout(function () {
                                document.location.reload()
                            },2000)
                        },error:function (data) {
                            iziToast.error({
                                title: data.messages
                            });
                        }
                    });
                }else{
                    iziToast.error({
                        title:'مقدار ورودی خود را چک کنید'
                    });

                }
            }
            // else {
            //     iziToast.error({
            //         title:'درخواست تعریف نشده!'
            //     });
            // }
        }
    </script>
@endsection
