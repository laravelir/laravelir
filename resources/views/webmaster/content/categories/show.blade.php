@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.categories.index') }}">دسته بندیان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش دسته بندی</a></li>
@endsection

@section('page-title')
    نمایش دسته بندی
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>دسته بندیی : <a href="{{ $category->url() }}">{{ $category->title }}</a></p>
                        <p>تاریخ ثبت : {{ $category->created_at }}</p>
                        <p>آخرین بروزرسانی : {{ $category->updated_at }}</p>
                    </div>
                    <div class="col-6">
                        <p>دسته بندی والد : {{ $category->parent->title ?? 'بدون والد' }}</p>
                        <p>رنگ شاخص : <span class="badge"
                                style="background-color: {{ $category->color_hex  }}">{{ $category->color_hex  }}</span>
                        </p>
                        <p>وضعیت : @if ($category->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال/span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
