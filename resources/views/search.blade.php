@extends('page.layouts.app')

@section('load')
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset("view/img/page-title/blog-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route("ArticlesPage") }}">جستجو</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">جستجو برای عنوان : {{ $queryText }}</h1>
        </div>
    </div>
    <div class="container pb-5 mb-3">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="page-title-heading text-center p-2 border-bottom">محصولات</h4>
                <div class="isotope-grid cols-2" style="position: relative; height: 1983.63px;">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>

                @forelse($products as $product)
                    <!-- Post-->
                        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                            <div class="card blog-card mb-2">
                                @if($product->media->count() >= 0)
                                    <a class="post-thumb" title="ادامه مطلب {{ $product->title  }}" href="{{ route('ProductShow' , ['slug' => $product->slug ]) }}" >
                                        <img src="{{ $product->image }}" alt="تصویر  {{ $product->title }}">
                                    </a>
                                @endif
                                <div class="card-body">
                                    <h5 class="post-title"><a title=" ادامه مطلب{{ $product->title  }}" href="{{ route('ProductShow' , ['slug' => $product->slug ]) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h5>
                                    <p class="text-muted text-justify">
                                        {!! $product->limit_text  !!}
                                    </p>
                                    دسته بندی : <a class="tag-link" href="#">{{ $product->category->name }}</a>
                                </div>
                                <div class="card-footer">
                                        <span class="post-author">
                                            <span class="post-author-name">
                                               نویسنده :   {{ $product->user->name }}
                                            </span>
                                        </span>
                                    <div class="post-meta">
                                            <span><i class="fe-icon-clock"></i>
                                               {{ jdate($product->created_at)->format('l d S F Y') }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="alert alert-primary">محصول با عنوان درج شده یافت نشد</div>
                    @endforelse
                </div>
                <div class="pt-2">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="isotope-grid cols-2" style="position: relative; height: 1983.63px;">
                    <h4 class="page-title-heading text-center p-2 border-bottom">مقالات</h4>
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
                            <div class="alert alert-primary">مقاله ای با عنوان درج شده یافت نشد</div>
                    @endforelse
                </div>
                <div class="pt-2">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
جستجو برای عنوان : {{ $queryText }}
@endsection
@section('head')
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=""@yield('title')"" />
    <meta property="og:description" content="جستجو برای عنوان : {{ $queryText }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection