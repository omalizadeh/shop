@extends('admins.layouts.app')
@section('title') پنل مدیریت @endsection
@section('content')
<div class="alert alert-info col-lg-12">در حال تکمیل پنل مدیریت هستیم لطفا کمی صبر کنید!</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">پلاس دارو</h6>
        </div>
        <div class="card-body">
            <p>
                {{-- {{ auth()->user()->name .' ' .auth()->user()->last_name }}
                به پنل مدیریت فروشگاه خوش آمدید --}}
                <br>
            </p>
        </div>
    </div>
</div>
@endsection