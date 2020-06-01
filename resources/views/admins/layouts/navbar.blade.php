<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
            <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <input class="navbar-search form-control disabled" type="text" placeholder="پلاس داو"
                    aria-label="جستجو">
            </div>
        </div>
        <ul class="navbar-nav border-left flex-row ">
            <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                        <i class="material-icons">&#xE7F4;</i>
                        <span class="badge badge-pill badge-danger">2</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                                <i class="material-icons">&#xE6E1;</i>
                            </div>
                        </div>
                        <div class="notification__content">
                            <span class="notification__category">آمار</span>
                            <p>تعداد کاربران فعال وب سایت شما طی هفته گذشته
                                <span class="text-success text-semibold">28%</span> افزایش پیدا کرده است. آفرین!</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                                <i class="material-icons">&#xE8D1;</i>
                            </div>
                        </div>
                        <div class="notification__content">
                            <span class="notification__category">فروش</span>
                            <p>هفته اخیر تعداد فروش های شما
                                <span class="text-danger text-semibold">5.52%</span>. کاهش داشته است. کمی بیشتر تلاش
                                کنید!</p>
                        </div>
                    </a>
                    <a class="dropdown-item notification__all text-center" href="#"> مشاهده همه اعلانات </a>
                </div>
            </li>
            <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuOrder"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                        <i class="material-icons">table_chart</i>
                        <span class="badge badge-pill badge-danger">0</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuOrder">
                    <div id="OrderNotify">
                        <a class="dropdown-item" href="#">
                            <div class="notification__icon-wrapper">
                                <div class="notification__icon">
                                    <i class="material-icons">table_chart</i>
                                </div>
                            </div>
                            <div class="notification__content">
                                <span class="notification__category">آمار</span>
                                <p>تعداد کاربران فعال وب سایت شما طی هفته گذشته
                                    <span class="text-success text-semibold">28%</span> افزایش پیدا کرده است. آفرین!</p>
                            </div>
                        </a>
                    </div>
                    <a class="dropdown-item notification__all text-center" href="{{ route('admins.orders.index') }}">
                        مشاهده
                        همه سفارشات </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    {{-- @if(auth()->guest())
                        <img class="user-avatar rounded-circle mr-2" src="{{ (new App\Http\Controllers\Controller)->makeAvatar('G') }}"
                    alt="آواتار کاربری">
                    @else
                    <img class="user-avatar rounded-circle mr-2" src="{{ auth()->user()->avatar }}" alt="آواتار کاربری">
                    @endif --}}
                    <span class="d-none d-md-inline-block">
                        {{ auth()->user()->getFullName() }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    {{-- @if(auth()->guest())
                        <a class="dropdown-item" href="{{ route('login') }}">
                    <i class="material-icons">vertical_split</i> ورود</a>
                    <a class="dropdown-item" href="{{ route('register') }}">
                        <i class="material-icons">note_add</i>ساخت حساب کاربری</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('password.request') }}"><i
                            class="material-icons text-danger"></i> فراموشی رمز عبور </a>

                    @else --}}
                    <a class="dropdown-item" href="components-blog-posts.html">
                        <i class="material-icons">vertical_split</i> تنظیمات</a>
                    <a class="dropdown-item" href="add-new-post.html">
                        <i class="material-icons">note_add</i>پیام ها</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        href="#logout"><i class="material-icons text-danger"></i> خروج </a>
                    <form action="{{route('logout')}}" id="logout-form" method="post" style="display:none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <nav class="nav">
            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>