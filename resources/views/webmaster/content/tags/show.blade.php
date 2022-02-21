@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.tags.index') }}">برچسب ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش برچسب</a></li>
@endsection

@section('title')
    نمایش برچسب
@endsection

@section('page-title')
    نمایش برچسب
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $tag->title }}</p>
                        <p>تاریخ ثبت : {{ $tag->created_at }}</p>
                    </div>
                    <div class="col-6">
                        <p>وضعیت : @if($tag->active) <span class="badge bg-green">فعال</span> @else <span class="badge bg-red">غیر فعال</span> @endif</p>
                        <p>آخرین بروزرسانی : {{ $tag->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
