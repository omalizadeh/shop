@extends('layouts.app')
@section('title')
    اسلایدر ها
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    اسلایدر ها
                    <div class="float-right">
                        <a href="{{ route('slider.create') }}" class="btn btn-outline-success">
                            <i class="material-icons">text_rotation_none</i> افزودن اسلاید جدید
                        </a> &nbsp;
                        <a href="{{ route('slider.index') }}?status=old" class="btn btn-outline-warning">
                            <i class="material-icons">restore_from_trash</i> اسلاید های حدف شده
                        </a>
                    </div>
                </h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">عنوان اسلایدر</th>
                        <th scope="col" class="border-0">تاریخ انتشار</th>
                        <th scope="col" class="border-0">دسته بندی</th>
                        <th scope="col" class="border-0">وضیعت</th>
                        <th scope="col" class="border-0">ویژگی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($sliders as $slide)
                        <tr>
                            <td>
                                {{ $slide->id }}
                            </td>
                            <td>
                                {{ $slide->name }}
                            </td>
                            <td>
                                {{ $slide->jalali }}
                            </td>
                            <td>
                                <select class="form-control form-control-sm" name="position" id="position">
                                    <option name="top" @if($slide->position == "top") selected class="bg-info" @endif>جایگاه بالا (اسلایدر)</option>
                                    <option name="top-offer" @if($slide->position == "top-offer") selected class="bg-info" @endif>جایگاه پایین (تصویر ثابت باپین)</option>
                                </select>
                            </td>
                            <td>
                                <span class="badge badge-{{ $slide->StatusValue["bg"] }}">{{ $slide->StatusValue["text"] }}</span>
                            </td>
                            <td>
                                @if($slide->status == "active")
                                    <button type="button" class="btn btn-dark">لغو اکران</button>
                                @else
                                    <button type="button" class="btn btn-success">اکران در سایت</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>اسلایدر ای یافت نشد</td>
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
            <div class="ml-3 float-right">{!! $sliders->render() !!}</div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function Slider(id,type) {
            $.ajax({
                url: "{{ route("slider.index") }}/" + id ,
                type: "post",
                data:{
                    _token: "{{ csrf_token() }}"
                },
                success:function (back) {
                    console.log(back);
                }
            });
        }
    </script>
@endsection