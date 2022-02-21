@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.tickets.index') }}">تیکت ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش تیکت</a></li>
@endsection

@section('page-title')
    نمایش تیکت
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>کاربر ثبت کننده : <a href="{{ $ticket->user->url() }}">{{ $ticket->user->label }}</a></p>
                        <p>دپارتمان : {{ $ticket->subject->title }}</p>
                        <p>وضعیت  تیکت : ''</p>
                    </div>
                    <div class="col-6">
                        <p>عنوان : {{ $ticket->title }}</p>
                        <p>تاریخ ثبت : {{ $ticket->created_at }}</p>
                        <p>تاریخ آخرین بروزرسانی : {{ $ticket->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
