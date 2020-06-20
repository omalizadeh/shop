@extends('page.layouts.app')
@section('title')
    {{ $article->title }}
@endsection
@section('load')
    <!--being content-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/blog-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route("ArticlesPage") }}">اخبار و مقالات</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">{{ $article->title }}</h1>
            <div class="page-title-subheading">تاریخ انتشار: <strong>{{ jdate($article->created_at)->format('l d S F Y') }}</strong></div>
        </div>
    </div>
    <div class="container pb-5 mb-3">
        <div class="row">
            <!-- Post Content-->
            <div class="col-lg-9">
                <!-- Single Post Meta-->
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <div>
                        <a class="scroll-to post-author" href="#author">
                            <div class="post-author-avatar"><img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }} تصویر کاربری">
                            </div>
                            <div class="post-author-name">{{ $article->user->name }}</div>
                        </a>
                    </div>
                    <div class="post-meta">
                        <a class="scroll-to text-sm" href="#comments">
                            <i class="fe-icon-message-square"></i>{{ count($article->comments) }}
                        </a>
                        <span class="text-sm"><i class="fe-icon-clock"></i>{{ jdate($article->created_at)->ago() }}</span>
                    </div>
                </div>
                <hr class="mb-4">
                <!-- Link-->

                <div class="card blog-card mb-4">
                    <img src="{{ $article->image }}" alt="Card image">
                    <div class="card-body">
                        <h5 class="post-title post-title-link lead">
                            <a title="{{ $article->title }}" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p>
                            {!! $article->limit_text !!}
                        </p>
                    </div>
                </div>
                <div class="text-justify">
                    {!! $article->description !!}
                </div>

                <div class="d-sm-flex justify-content-between align-items-center border-top border-bottom mb-5 py-2">
                    <div class="py-2">
                        دسته بندی مطالب :
                        <a class="tag-link" href="#">
                            {{ $article->category->name }}
                        </a>
                    </div>
                    <div class="py-2">
                        <span class="dinline-block align-middle py-2 mr-2">
                            <strong>انتشار:</strong>
                        </span>
                        <a class="social-btn sb-style-3 sb-facebook mb-0 p-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                            <i class="socicon-facebook"></i>
                        </a>
                        <a class="social-btn sb-style-3 sb-twitter mb-0 p-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                            <i class="socicon-twitter"></i>
                        </a>
                        <a class="social-btn sb-style-3 sb-pinterest mb-0 p-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                            <i class="socicon-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Single Post Sidebar-->
                <!-- Off-Canvas Toggle--><a class="offcanvas-toggle" href="#blog-single-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
                <!-- Off-Canvas Container-->
                <aside class="offcanvas-container" id="blog-single-sidebar">
                    <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
                        <!-- Categories-->
                        <div class="widget widget-categories">
                            <h4 class="widget-title">دسته بندی ها</h4>
                            <ul>
                                @forelse($categories as $category)
                                    <li><a href="#categoryItem-{{ $loop->index }}" @if($category->Child->count() > 0) data-toggle="collapse" @endif>{{ $category->name }}</a>
                                        @if($category->Child->count() > 0)
                                            <div class="collapse @if($loop->first) show @endif" id="categoryItem-{{ $loop->index }}">
                                                <ul>
                                                    @forelse($category->child as $child)
                                                        <li><a href="#">{{ $child->name }}</a></li>
                                                    @empty

                                                    @endforelse
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>
                        <div class="widget widget-featured-posts">
                            <h4 class="widget-title">مقالات مرتبط</h4>
                        @forelse($articles as $article)
                            <div class="card mb-30">
                                <a title="{{ $article->title }}" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
                                <img src="{{ $article->image }}" alt="تصویر {{ $article->title }}">
                                </a>
                                <div class="card-body">
                                    <a title="{{ $article->title }}" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
                                    <h4 class="card-title">{{ $article->title }}</h4>
                                    </a>
                                    <p class="card-text">
                                        {!!  $article->limit_text !!}
                                    </p>
                                    <span class="text-muted text-sm opacity-75">
                                        {{ jdate($article->updated_at)->ago() }}
                                    </span>
                                </div>
                            </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="bg-secondary py-5" id="comments">
        <div class="container pb-4">
            <div class="row">
                <div class="col-lg-12">
                   @if($article->comments->count() > 0)
                        <h4 class="text-center pb-3">{{ count($article->comments) }} دیدگاه </h4>
                        <div class="row">
                            @forelse($article->comments as $comment)
                                <div class="col-6">
                                    <div class="blockquote comment">
                                        <p>
                                            {{ $comment->text }}
                                        </p>
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <div class="testimonial-footer">
                                                <div class="testimonial-avatar"><img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }} تصویر کاربری">
                                                </div>
                                                <div class="d-table-cell align-middle pl-2">
                                                    <div class="blockquote-footer">{{ $comment->user->name }}
                                                        <cite>
                                                            {{ jdate($article->created_at)->ago() }}
                                                        </cite>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                       @else
                        <h4 class="text-center pb-3">هیچ دیدگاهی ثبت نشده است</h4>
                    @endif
                    <hr/>
                       @if(auth()->check())
                         <div class="card mt-3">
                             <form action="{{ route("AddComment") }}" method="post">
                                 @csrf
                                 <input type="hidden" value="App\\Article" name="model[type]">
                                 <input type="hidden" value="{{ $article->id }}" name="model[id]">
                             <div class="card-header">
                                 <h5 class="p-2">
                                     ارسال دیدگاه
                                 </h5>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="review-name">نام شما</label>
                                             <input disabled class="form-control" type="text" id="review-name" value="{{ auth()->user()->name }}" required="">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="review-email">شماده تماس</label>
                                             <input disabled class="form-control" type="email" id="review-email" value="{{ auth()->user()->phone }}" required="">
                                             <div class="invalid-tooltip">مشخصات تماس شما صرفا جهت اطلاع رسانی دارد و در سایت انتشار نمیابد</div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="review-message">متن دیدگاه</label>
                                     <textarea class="form-control" name="text" id="review-message" rows="8" required=""></textarea>
                                     <div class="invalid-tooltip">
                                         متن دیدگاه
                                     </div>
                                 </div>
                             </div>
                             <div class="card-footer">
                                 <button type="submit" class="btn btn-success float-left">ثبت دیدگاه</button>
                             </div>
                             </form>
                         </div>
                       @else
                           <div class="alert alert-info">برای ارسال دیدگاه باید <a href="{{ route('login') }}"> وارد </a>شوید </div>

                       @endif
                </div>
            </div>
        </div>
    </div>



@endsection


@section('head')
    <meta name=description content="{{ $article->limit_text }}">
{{--    <meta name=keywords itemprop=keywords content="{{ }}">--}}
    <link rel=canonical href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:url" content="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}"/>
    <meta property="og:site_name" content="پلاس دارو"/>
    @if($article->media->count() > 0)
        @forelse($article->media as $item)
            <meta property="og:image" content="{{ env('APP_URL').asset($item->patch.$item->name) }}"/>
        @empty
        @endforelse
    @endif
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
     "@type": "Article",
     "headline": "{{ $article->title }}",
      "image": [
        @forelse($article->media as $item)
            "{{ env('APP_URL').asset($item->patch.$item->name) }}"@if(!$loop->last) , @endif
        @empty
        @endforelse
        ],
       "publisher": {
              "@type": "Organization",
              "name": "{{ env('WebPageName') }}",
                "logo": {
                    "@type": "ImageObject",
                    "name": "{{ env('APP_NAME') }} Logo",
                    "width": "60",
                    "height": "600",
                    "url": "{{ env('LogoPatch') }}"
                }
     },
     "url": "{{ route('ArticleShow' , ['slug' => $article->slug]) }}",
     "datePublished": "{{ $article->created_at }}",
     "dateCreated": "{{ $article->created_at }}",
     "dateModified": "{{ $article->updated_at }}",
     "description": "{{ $article->limit_text }}",
     "articleBody": "{{ $article->description }}",
     "author": "{{ env('WebPageName') }}"
 }

    </script>
@endsection