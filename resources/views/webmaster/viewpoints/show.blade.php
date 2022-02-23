@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.subjects.index') }}">دپارتمان های تیکت</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش دپارتمان تیکت</a></li>
@endsection

@section('page-title')
    نمایش دپارتمان تیکت
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $subject->title }}</p>

                        <p>وضعیت حساب دپارتمان تیکتی : @if ($subject->active) <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span> @endif</p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت : {{ $subject->created_at }}</p>
                        <p>آخرین بروزرسانی : {{ $subject->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
