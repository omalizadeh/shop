@extends('layouts.app')
@section('title')
    اسلایدر ها
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    ساخت اسلایدر
                </h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <form class="p-2" action="{{ route("slider.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="name">نام اسلایدر</label>
                            <input class="form-control" placeholder="مثال : اسلایدر اول" name="name" type="text" value="{{ old("name") }}" id="name">
                        </div>
                        <div class="form-group col-6">
                            <label for="title">متن اسلایدر</label>
                            <input placeholder="مثال : تیتری که بالاتر از همه نوشته نشان داده میشود" class="form-control" name="title" type="text" value="{{ old("title") }}" id="title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="text">متن نمایشی اسلایدر</label>
                            <input placeholder="مثال : شروع قیمت از ۲،۰۰۰،۰۰۰ تومان" class="form-control" name="text" type="text" value="{{ old("text") }}" id="text">
                        </div>
                        <div class="form-group col-6">
                            <label for="url">آدرس هدایت شدونده</label>
                            <input placeholder="Ex : http://google.com" class="form-control" name="url" type="url" value="{{ old("url") }}" id="url">
                        </div>
                    </div>
                 <div class="form-row">
                     <div class="form-group col-6">
                         <label for="position">جایگاه</label>
                         <select class="form-control" name="position" id="position">
                             <option name="top">جایگاه بالا (اسلایدر)</option>
                             <option name="top-offer">جایگاه پایین (تصویر ثابت باپین)</option>
                         </select>
                     </div>
                     <div class="form-group col-6">
                         <label for="image">تصویر اسلاید</label>
                         <input type="file" class="form-control form-control-file" name="file[]" id="image">
                     </div>
                 </div>
                    <div class="form-group p-3">
                        <button type="submit" class="btn btn-success float-right">ثبت اسلایدر</button>
                    </div>
                </form>
            </div>
            <hr/>
        </div>
    </div>
@endsection
@section('script')

@endsection