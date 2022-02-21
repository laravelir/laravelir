@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.comments.index') }}">نظرات</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش نظر</a></li>
@endsection

@section('page-title')
    نمایش نظر
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>نظر : {{ $comment->body }}</p>
                        <p>نام نظری : <a href="{{ $comment->url() }}">{{ $comment->commentname }}</a></p>
                        <p>جنسیت : {{ getGender($comment->profile->gender) }}</p>
                        <p>وضعیت حساب نظری : @if ($comment->accountStatus()) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $comment->email }}</p>
                        <p>وضعیت ایمیل : @if ($comment->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $comment->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($comment->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $comment->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $comment->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $comment->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $comment->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
