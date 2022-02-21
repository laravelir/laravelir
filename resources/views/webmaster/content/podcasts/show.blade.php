@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.podcasts.index') }}">پادکست ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش پادکست</a></li>
@endsection

@section('page-title')
    نمایش پادکست
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : <a href="{{ $podcast->url() }}">{{ $podcast->title }}</a></p>
                        <p>نام و نام خانوادگی : {{ $podcast->full_name }}</p>
                        <p>جنسیت : {{ getGender($podcast->profile->gender) }}</p>
                        <p>وضعیت حساب پادکستی : @if ($podcast->accountStatus()) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $podcast->email }}</p>
                        <p>وضعیت ایمیل : @if ($podcast->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $podcast->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($podcast->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $podcast->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $podcast->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $podcast->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $podcast->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
