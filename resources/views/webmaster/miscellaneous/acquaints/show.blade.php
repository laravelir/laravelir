@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.acquaints.index') }}">نحوه آشنایی با ماان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش نحوه آشنایی با ما</a></li>
@endsection

@section('page-title')
    نمایش نحوه آشنایی با ما
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $acquaint->title }}</p>
                        <p>وضعیت : @if ($acquaint->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-6">
                        <p>تاریخ ثبت : {{ $acquaint->created_at }}</p>
                        <p>آخرین بروزرسانی : {{ $acquaint->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
