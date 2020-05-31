@extends('layouts.app')
@section('title')
    مشاهده درخواست - {{ $Ticket->title }}
@endsection
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    {{ $Ticket->title }}
                    <span class="float-right badge badge-info">{{ $Ticket->option->name . ' | ' . jdate($Ticket->created_at)->ago() }}</span>
                </h6>
            </div>
            <p class="p-3 text-justify">{{ $Ticket->text }}</p>
            <div class="row p-3">
                <div class="card-footer border-top col-lg-12">
                    <h6 class="m-0 badge badge-dark">
                        {{ 'پاسخ ها' }}
                    </h6>
                </div>
                @forelse($Ticket->Responses as $response)
                    <div class="col-md-12">
                        <div class="card rounded-0">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">
                                    پاسخ شماره : {{ $response->id }}
                                    <span class="float-right badge badge-success">{{ $response->option->name . ' | ' . jdate($response->created_at)->ago() }}</span>
                                </h6>
                            </div>
                            <p class="p-3 text-justify">{{ $response->text }}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info col-lg-12">{{ 'هیچ پاسخی ثبت نشده است' }}</div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">
                <h6 class="m-0">
                    ویژگی
                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#Response">پاسخ دادن</button>
                </h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">flag</i>
                            <strong class="mr-1">وضعیت:</strong>{{ $Ticket->status_text['text'] }}
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">flag</i>
                            <strong class="mr-1">تعداد پاسخ های داده شده:</strong>{{ $Ticket->Responses->count() > 0 ?  $Ticket->Responses->count() : 'پاسخی ثبت نشده است'}}
                        </span>
                        <span class="d-flex mb-2 text-justify">
                            <i class="material-icons mr-1">flag</i>
                            <strong class="mr-1">آخرین بروزرسانی :</strong>{{ jdate($Ticket->updated_at)->ago() }}
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">ارسال کننده:</strong>
                            <strong class="text-success">
                                {{ $Ticket->option->name }}
                                @if($Ticket->option->user_id != 0)
                                    | <a href="{{ route('DashboardProfile' , ['user' => $Ticket->option->user_id]) }}" target="_blank" title="مشاهده کاربر">عضو سایت</a>
                                @endif
                            </strong>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">شماره تماس:</strong>
                            <strong class="text-warning text-justify">
                                 {{ $Ticket->option->phone }}
                            </strong>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">آدرس ایمیل:</strong>
                            <strong class="text-danger text-justify">
                                 {{ $Ticket->option->email }}
                            </strong>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">شناسه آی پی:</strong>
                            <strong class="text-info text-justify">
                                <a href="#" onclick="getIpDetail('{{ $Ticket->option->user_ip }}')" title="مشاهده اطلاعات">{{ $Ticket->option->user_ip }}</a>
                            </strong>
                        </span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div id="IpDetail" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title float-left">مشخصات ارسال کننده</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="ModelBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="Response" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title float-left">پاسخ دادن</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="ResponseForm">
                        <div class="form-group">
                            <textarea id="text" name="text" class="form-control is-valid" placeholder="متن پاسخ را بنویسید" style="min-height: 200px"></textarea>
                            <label for="text"></label>
                            <input type="hidden" value="{{ $Ticket->option->name }}" name="sender[name]">
                            <input type="hidden" value="{{ $Ticket->option->phone }}" name="sender[phone]">
                            <input type="hidden" value="{{ $Ticket->option->email }}" name="sender[email]">
                            <input type="hidden" value="{{ $Ticket->id }}" name="parent_id">
                            <input type="hidden" value="پاسخ : {{ $Ticket->title }}" name="title">
                            {{ csrf_field() }}
                        </div>
                       <div class="form-group">
                           <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                               <input type="checkbox" id="customToggle1" name="send[mail]" class="custom-control-input">
                               <label class="custom-control-label" for="customToggle1">
                                   ارسال پاسخ به ایمیل کاربر
                               </label>
                           </div>

                           <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                               <input type="checkbox" id="customToggle2" name="send[sms]" class="custom-control-input">
                               <label class="custom-control-label" for="customToggle2">
                                   اطلاع رسانی از طریق پیام کوتاه
                               </label>
                           </div>
                       </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="Response()">ارسال</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
@endsection
@section('script')
<script>
    function getIpDetail(ip) {
        $.ajax({
            url: 'http://ip-api.com/json/' + ip,
            type: 'get',
            success:function (data) {
                $('#ModelBody').empty().append('ارائه دهنده سرویس:' + data.as + '<br/>'
                    + 'طول عرض جغرفیایی: ' + data.lat + '-' + data.lon + '<br/>'
                    + 'کشور/شهر: ' + data.country + '-' +data.regionName);
                $('#IpDetail').modal('show');
            }
        });
    }
    function Response() {
        $.ajax({
            url: '{{ route('ticket.store') }}',
            type: 'post',
            data: $('#ResponseForm').serialize(),
            success:function (data) {
                alert('پاسخ شما با موفقیت ثبت شد !');
                setTimeout(function () {
                    document.location.reload()
                },2000)
            }
        });
    }
</script>
@endsection
