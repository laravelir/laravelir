@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.posts.index') }}">پستان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش پست</a></li>
@endsection

@section('page-title')
    نمایش پست &nbsp; - &nbsp;
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : <a href="{{ $post->url() }}">{{ $post->title }}</a></p>
                        <p>نامک : {{ $post->slug }}</p>
                        <p>نوع پست : ''</p>
                        <p>وضعیت : @if ($post->active) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>ایمیل : {{ $post->email }}</p>
                        <p>وضعیت ایمیل : @if ($post->isEmailActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                        <p>موبایل : {{ $post->mobile ?? '--- ' }}</p>
                        <p>وضعیت موبایل : @if ($post->isCurrentMobileActivated()) <span class="badge bg-green">تایید شده</span> @else <span class="badge bg-warning">تایید نشده</span> @endif</p>
                    </div>
                </div>
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات تکمیلی</p>
                    <hr>
                    <div class="col-6">
                        <p>آخرین لاگین : {{ $post->metas->last_login_at }}</p>
                        <p>نحوه آشنایی با ما : {{ $post->profile->acquaintedUs_id ?? '---'}}</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت نام : {{ $post->metas->register_at }}</p>
                        <p>تاریخ تولد : {{ $post->profile->birthday ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
