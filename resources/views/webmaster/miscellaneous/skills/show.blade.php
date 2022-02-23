@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.skills.index') }}">مهارت ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش مهارت</a></li>
@endsection

@section('page-title')
    نمایش مهارت
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $skill->title }}</p>
                        <p>وضعیت : @if ($skill->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت : {{ $skill->created_at }}</p>
                        <p>آخرین بروزرسانی : {{ $skill->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
