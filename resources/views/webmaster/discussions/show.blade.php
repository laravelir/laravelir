@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.discussions.index') }}">گفتگوان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش گفتگو</a></li>
@endsection

@section('page-title')
    نمایش گفتگو &nbsp; - &nbsp;
    <p>
        <span class="avatar" style="background-image: url({{ $discussion->avatar }})">
            <span class="badge bg-danger"></span></span>
    </p>
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>نام و نام خانوادگی : {{ $discussion->full_name }}</p>
                        <p>نام گفتگوی : <a href="{{ $discussion->url() }}">{{ $discussion->discussionname }}</a></p>
                        <p>جنسیت : {{ getGender($discussion->profile->gender) }}</p>
                        <p>وضعیت حساب گفتگوی : @if ($discussion->accountStatus()) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $discussion->email }}</p>
                        <p>وضعیت ایمیل : @if ($discussion->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $discussion->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($discussion->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $discussion->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $discussion->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $discussion->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $discussion->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
