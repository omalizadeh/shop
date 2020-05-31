@extends('layouts.app')
@section('title')
 مقالات سایت
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    مقالات و محتوای بلاگ
                   <div class="float-right">
                       <a href="{{ route('article.create') }}" class="btn btn-outline-success">
                           <i class="material-icons">text_rotation_none</i> افزودن مقاله جدید
                       </a> &nbsp;
                       <a href="{{ route('article.index') }}?status=delete" class="btn btn-outline-warning">
                           <i class="material-icons">restore_from_trash</i> مقالات حدف شده
                       </a>
                   </div>
                </h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">عنوان مقاله</th>
                        <th scope="col" class="border-0">تاریخ انتشار</th>
                        <th scope="col" class="border-0">دسته بندی</th>
                        <th scope="col" class="border-0">ارسال کننده</th>
                        <th scope="col" class="border-0">ویژگی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($Articles as $article)
                        <tr id="Article-{{ $article->id }}">
                            <td>1</td>
                            <td class="@php echo $article->status == 'delete' ? 'text-warning' : ' '; @endphp">{{ $article->title }}</td>
                            <td>
                                {{ jdate($article->created_at)->format('l d S F Y') }}
                                @if($article->created_at != $article->updated_at)
                                    <span class="text-danger"><small>
                                        ویرایش : {{ jdate($article->updated_at)->ago() }}
                                        </small>
                                    </span>
                                @endif
                            </td>
                            <td>{{ $article->category->name }}</td>
                            <td class="text-success">{{ $article->user->last_name .', '.$article->user->name }}</td>
                            <td>
                                <a href="{{ route('article.edit' , ['article' => $article->id]) }}" title="ویرایش" class="btn btn-info btn-sm">ویرایش</a>
                                @if($article->status == 'delete' || $article->status == 'check')
                                    <a href="#" onclick="Articles('deleted','{{ $article->id }}')" title="حدف" class="btn btn-danger btn-sm">حدف برای همیشه</a>
                                    <a href="#" onclick="Articles('show','{{ $article->id }}')" title="حدف" class="btn {{ $article->status == 'delete' ?  'btn-warning' : 'btn-success' }} btn-sm">{{ $article->status == 'delete' ?  'بازگردانی مقاله' : 'انتشار مقاله' }}</a>
                                @else
                                    <a href="#" onclick="Articles('delete','{{ $article->id }}')" title="حدف" class="btn btn-warning btn-sm">حدف</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>مقاله ای یافت نشد</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <hr/>
            <div class="ml-3 float-right">{!! $Articles->render() !!}</div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function Articles(action,article) {
            if (action === 'show'){
                WarningTost('آیا واقعا میخواهید این مقاله را به حالت نمایش تغییر بدهید ؟',function () {
                    $.ajax({
                        url: '{{ route('article.index') }}/' + article,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'PUT' }}',
                            status: 'show'
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#Article-" + article).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                });
            }
            if (action === 'delete'){
                WarningTost('آیا واقعا میخواهید این مقاله را پاک کنید؟',function () {
                    $.ajax({
                        url: '{{ route('article.index') }}/' + article,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'PUT' }}',
                            status: 'delete'
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#Article-" + article).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                });
            }
            if (action === 'deleted'){
                WarningTost('آیا مایلید این مقاله را برای همیشه حذف کنید ؟',function () {
                    $.ajax({
                        url: '{{ route('article.index') }}/' + article,
                        type:'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                            _method: '{{ 'delete' }}',
                        },
                        success:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                            $("#Article-" + article).remove();
                        },
                        error:function (data) {
                            data.messages.forEach(function (key) {
                                iziToast.info({
                                    message: key
                                });
                            });
                        }
                    });
                })
            }
        }
    </script>
@endsection