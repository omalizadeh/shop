@extends('page.layouts.app')

@section('load')
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/blog-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route("ArticlesPage") }}">وبلاگ</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">اخبار و مقالات</h1>
        </div>
    </div>
    <div class="container pb-5 mb-3">
        <div class="row">
            <div class="col-lg-3">
                <!-- Blog Sidebar-->
                <!-- Off-Canvas Toggle--><a class="offcanvas-toggle" href="#blog-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
                <!-- Off-Canvas Container-->
                <aside class="offcanvas-container" id="blog-sidebar">
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
                            <h4 class="widget-title">مطالب محبوب</h4>
                            @forelse($articles as $article)
                            <a class="featured-post" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
                                <div class="featured-post-thumb">
                                    <img src="{{ $article->image }}" alt="تصویر {{ $article->title }}">
                                </div>
                                <div class="featured-post-info">
                                    <div class="featured-post-meta">
                                        <span class="text-primary opacity-70">
                                            <i class="fe-icon-clock"></i>
                                         {{ jdate($article->created_at)->format('l d S F Y') }}
                                        </span>
                                    </div>
                                    <div class="featured-post-title">{{ $article->title }}</div>
                                </div>
                            </a>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
            <!-- Blog Grid-->
            <div class="col-lg-9">
                <div class="isotope-grid cols-2" style="position: relative; height: 1983.63px;">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>

                    @forelse($articles as $article)
                        <!-- Post-->
                            <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                                <div class="card blog-card mb-2">
                                    @if($article->media->count() >= 0)
                                    <a class="post-thumb" title="ادامه مطلب {{ $article->title  }}" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}" >
                                        <img src="{{ $article->image }}" alt="تصویر  {{ $article->title }}">
                                    </a>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="post-title"><a title=" ادامه مطلب{{ $article->title  }}" href="{{ route('ArticleShow' , ['slug' => $article->slug ]) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h5>
                                        <p class="text-muted text-justify">
                                            {!! $article->limit_text  !!}
                                        </p>
                                        دسته بندی : <a class="tag-link" href="#">{{ $article->category->name }}</a>
                                    </div>
                                    <div class="card-footer">
                                        <span class="post-author">
                                            <span class="post-author-name">
                                               نویسنده :   {{ $article->user->name }}
                                            </span>
                                        </span>
                                        <div class="post-meta">
                                            <span><i class="fe-icon-clock"></i>
                                               {{ jdate($article->created_at)->format('l d S F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @empty

                    @endforelse
                </div>
                <div class="pt-2">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
    مقالات
@endsection
@section('head')
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=""@yield('title')"" />
    <meta property="og:description" content="لیست تمامی مقالات" />
    <meta property="og:url" content="{{ route('ArticlesPage') }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection