<div class="author-card pb-3">
    <div class="author-card-cover" style="background-image: url({{ asset("view/img/widgets/author/cover.jpg") }});">
        <a class="btn btn-light btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="تلفن تماس تایید شده است"><i class="fe-icon-award text-md"></i>
            &nbsp; {{ auth()->user()->phone }}
        </a>
    </div>
    <div class="author-card-profile">
        <div class="author-card-avatar"><img src="{{ auth()->user()->avatar }}" alt=" {{ auth()->user()->name.' '.auth()->user()->last_name }}">
        </div>
        <div class="author-card-details">
            <h5 class="author-card-name text-lg">
                {{ auth()->user()->name.' '.auth()->user()->last_name }}
            </h5>
            <span class="author-card-position">{{ auth()->user()->email }}</span>
        </div>
    </div>
</div>
<div class="wizard">
    <nav class="list-group list-group-flush">

        <a class="list-group-item" href="{{ route('home') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fe-icon-tag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">
                        ناحیه کاربری
                    </div>
                </div>
            </div>
        </a>
        <a class="list-group-item" href="{{ route('settingPage') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fe-icon-tag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">
                        ویرایش مشخصات
                    </div>
                </div>
            </div>
        </a>
        <a class="list-group-item" href="{{ route('tickets') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fe-icon-tag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase">
                        درخواست پشتیبانی
                    </div>
                </div>
                <span class="badge badge-secondary">
۲
                </span>
            </div>
        </a>
        <a class="list-group-item bg-dark" href="{{ route('LogoutPage') }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fe-icon-tag mr-1 text-muted"></i>
                    <div class="d-inline-block font-weight-medium text-uppercase text-white">
                        خروج از ناحیه کاربری
                    </div>
                </div>
            </div>
        </a>


    </nav>
</div>