@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.achievements.index') }}">دستاورد ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش دستاورد</a></li>
@endsection

@section('page-title')
    نمایش دستاورد &nbsp; - &nbsp;
    <p>
        <img  class="avatar"  src="{{ $achievement->logo_path }}" alt="">
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
                        <p>عنوان : {{ $achievement->title }}</p>
                        <p>وضعیت حساب دستاوردی : @if ($achievement->active) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت : {{ $achievement->created_at }}</p>
                        <p>آخرین بروزرسانی : {{ $achievement->updated_at }}</p>
                        <p>توضیحات : {{ $achievement->description }}</p>
                    </div>
                </div>
                <div class="row">
                    {{-- users that have this achievement --}}
                </div>
            </div>
        </div>
    </div>
@endsection
