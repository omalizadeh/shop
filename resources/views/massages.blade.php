@extends('page.layouts.app')

@section('load')
  <!--being content-->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <section class="dke-rdkd-rk3">
          <div class="sys-container fdlt-cont">
            <div class="kdsf-spc f-parent">
              @include('page.option.sidebar-home')
              <div class="ndk-cont">
                <div class="fldfd-spc">
                  <div class="fksd-t-img">
                    <div class="ddkf-sccp">
                      <div class="fkd-tf">
                        <h2 class="fkmd-iggg"><i class="icon-menu"></i> حساب کاربری</h2>
                      </div>
                    </div>
                  </div>
                  <div class="fle-ds-spc">
                    <div class="fkrf-sc-cls">
                    <div class="dashboard-widget dokan-announcement-widget">
                      <div class="title-ba clearfix"><i class="icon-notification"></i>
                        <div class="title-ba"><p>جدیدترین اطلاعیه ها</p></div>
                      </div>
                      <ul class="list-unstyled">
                        <li class="announce-read">
                          <div class="dokan-dashboard-announce-img">
                            <i class="icon-notification-1 speaker-img"><span
                                class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span
                                class="path5"></span><span class="path6"></span></i></div>
                          <div class="dokan-dashboard-announce-content">
                            <h3>
                              <a href="massage.html">تست اطلاعیه یک </a>
                            </h3>
                            لورم ایپسوم متن ساختگی با تولید سادگی
                            نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و ...
                          </div>
                        </li>
                        <li class="announce-read">
                          <div class="dokan-dashboard-announce-img"><i
                              class="icon-notification-1 speaker-img"><span
                                class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span
                                class="path5"></span><span class="path6"></span></i></div>
                          <div class="dokan-dashboard-announce-content">
                            <h3>
                              <a href="massage.html">اطلاعیه تست</a>
                            </h3>
                            متن تست اطلاعیه یک متن تست اطلاعیه یک متن تست
                            اطلاعیه یک متن تست اطلاعیه یک متن تست اطلاعیه یک
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--end content-->
@endsection

@section('title')
  داشبرد مدیریت
@endsection
@section('head')
  <meta property="og:locale" content="fa_IR" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="@yield('title')" />
  <meta property="og:url" content="{{ route('massages') }}" />
  <meta property="og:site_name" content="پلاس دارو" />
@endsection
