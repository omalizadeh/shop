@extends('layouts.app')
@section('title')
    درخواست پشتیبانی
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="m-0">درخواست پشتیبانی

                </h6>
            </div>
            <table class="table mb-0">
                <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">عنوان پیام</th>
                    <th scope="col" class="border-0">ارسال کننده</th>
                    <th scope="col" class="border-0">زمان ارسال</th>
                    <th scope="col" class="border-0">وضیعت</th>
                    <th scope="col" class="border-0">ویژگی</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->option->name != null ? $ticket->option->name : 'ناشناس' }}</td>
                        <td>{{ jdate($ticket->created_at)->format('l d F Y') .' - '. jdate($ticket->created_at)->ago() }}</td>
                        <td> <span class="badge badge-{{ $ticket->status_text['bg'] }}">{{ $ticket->status_text['text'] }}</span></td>
                        <td>
                            <a href="{{ route('ticket.show' , ['ticket' => $ticket->id]) }}" class="btn btn-sm btn-danger">مشاهده</a>
                            <a href="#" class="btn btn-sm btn-info">حدف</a>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')

@endsection
