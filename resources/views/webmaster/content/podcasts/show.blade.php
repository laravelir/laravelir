@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">کاربران</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش کاربر</a></li>
@endsection

@section('page-title')
    نمایش کاربر &nbsp; - &nbsp;
    <p>
        <span class="avatar" style="background-image: url({{ $user->avatar }})">
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
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام کاربری : <a href="{{ $user->url() }}">{{ $user->username }}</a></p>
                        <p>جنسیت : {{ getGender($user->profile->gender) }}</p>
                        <p>وضعیت حساب کاربری : @if ($user->accountStatus()) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $user->email }}</p>
                        <p>وضعیت ایمیل : @if ($user->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $user->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($user->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $user->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $user->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $user->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $user->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
