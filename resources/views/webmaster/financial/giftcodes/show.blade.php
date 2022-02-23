@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.giftcodes.index') }}">کد هدیه ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش کد هدیه</a></li>
@endsection

@section('page-title')
    نمایش کد هدیه
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>نام و نام خانوادگی : {{ $giftcode->full_name }}</p>
                        <p>نام کد هدیهی : <a href="{{ $giftcode->url() }}">{{ $giftcode->giftcodename }}</a></p>
                        <p>جنسیت : {{ getGender($giftcode->profile->gender) }}</p>
                        <p>وضعیت حساب کد هدیهی : @if ($giftcode->accountStatus()) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $giftcode->email }}</p>
                        <p>وضعیت ایمیل : @if ($giftcode->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $giftcode->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($giftcode->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $giftcode->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $giftcode->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $giftcode->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $giftcode->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
