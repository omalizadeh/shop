@extends('page.layouts.app')

@section('load')
    <div class="page-title d-flex" aria-label="Page title"
         style="background-image: url({{ asset("view/img/page-title/shop-pattern.jpg") }});">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("Index") }}">صفحه اصلی</a>
                    </li>

                </ol>
            </nav>
            <h1 class="page-title-heading">ارتباط با ما</h1>
        </div>
    </div>
    <!--being content-->
    <section class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 border-right py-2 border-bottom">
                <a class="scroll-to icon-box text-center mx-auto box-shadow-none px-0" href="https://www.google.com/maps/place/%D8%AF%D8%A7%D8%B1%D9%88%D8%AE%D8%A7%D9%86%D9%87+%D8%B4%D8%A8%D8%A7%D9%86%D9%87+%D8%B1%D9%88%D8%B2%DB%8C+%D8%AF%DA%A9%D8%AA%D8%B1+%D8%A7%D9%85%DB%8C%D8%B1+%D8%A7%D8%A8%D8%B1%D8%A7%D9%87%DB%8C%D9%85%DB%8C%E2%80%AD/@34.6412763,50.9097784,15z/data=!4m5!3m4!1s0x0:0x93a85f5e4cb11c72!8m2!3d34.6412763!4d50.9097784?sa=X&ved=2ahUKEwjon_2X3uTjAhWQjVkKHdprAQwQ_BIwCnoECA0QCA&shorturl=1">
                    <div class="icon-box-icon p-3"><i class="fe-icon-map-pin"></i></div>
                    <h3 class="icon-box-title">ما رو پیدا کن</h3>
                    <p class="icon-box-text font-weight-medium">ایران - قم بلوار ۱۵ خرداد روبه رو دانشگاه قران</p></a></div>
            <div class="col-md-4 col-sm-6 py-2 border-right border-bottom">
                <a class="icon-box text-center mx-auto box-shadow-none px-0" href="tel:02537776012">
                    <div class="icon-box-icon p-3"><i class="fe-icon-phone"></i></div>
                    <h3 class="icon-box-title">با ما تماس بگیرید</h3>
                    <p class="icon-box-text font-weight-medium">025-3777-6012</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 py-2 border-right border-bottom">
                <a class="icon-box text-center mx-auto box-shadow-none px-0" href="mailto:info@plusdaru.com">
                    <div class="icon-box-icon p-3"><i class="fe-icon-mail"></i></div>
                    <h3 class="icon-box-title">ایمیل </h3>
                    <p class="icon-box-text font-weight-medium">info@plusdaru.com</p>
                </a>
            </div>
        </div>
    </section>
    <section class="container mb-5 pb-3">
        <div class="wizard">
            <div class="wizard-body pt-3">
                <h3 class="h4 text-center pb-3 pt-3">ارتباط با ما</h3>
                <form method="post" action="{{ route('TicketStore') }}">
                    {{ csrf_field() }}
                    <div class="form-row" >
                        <div class="col-lg-6 mt-4">
                            <label for="name"></label>
                            <input type="text" name="sender[name]" class="form-control p-3" placeholder="نام"  id="name" style="border-radius: 50px">
                        </div>
                        <div class="col-lg-6 mt-4">
                            <label for="email"></label>
                            <input type="email" name="sender[email]" class="form-control p-3" id="email" placeholder="آدرس ایمیل"  style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mt-4">
                            <label for="phone"></label>
                            <input type="text"name="sender[phone]" class="form-control p-3" placeholder="شماره تماس"  id="phone" style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 mt-4">
                            <label for="title"></label>
                            <input type="text" name="title" class="form-control p-3" placeholder="عنوان پیام" id="title" style="border-radius: 50px">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="text"></label>
                        <textarea id='text' style="min-height:200px;border-radius: 10px" name="text" rows="" cols="" placeholder="توضیحات پیام" class="form-control p-3"></textarea>
                        <input type="hidden" value="0" name="parent_id">
                    </div>
                    <p class="float-left" >
                        <input type="submit" class="btn btn-success" value="ارسال تیکت" data-automation-id="subscribe-submit-button">
                    </p>
                    <div class="clearfix"></div>
                </form>

            </div>
        </div>
    </section>

    <!--end content-->
@endsection

@section('title')
    ارتباط
@endsection
@section('head')
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="جهت ارتباط باما و و انتقادات و پیشنهادات از طریق فرم زیر با ما در ارتباط باشید." />
    <meta property="og:url" content="{{ route('contactUs') }}" />
    <meta property="og:site_name" content="پلاس دارو" />
@endsection