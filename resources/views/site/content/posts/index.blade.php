@extends('site.layouts.master')


@section('page-title')
    <div class="">
        پست ها
        <p class="text-muted mt-1" style="font-size: .7rem !important;">{{ $posts->count() }} پست</p>
    </div>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">

        </div>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('site.posts.index') }}">پست ها</a></li>
@endsection

@section('title')
    پست ها
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-3">
            <form action="" method="get">
                <div class="subheader mb-2">دسته بندی ها</div>
                <div class="list-group list-group-transparent mb-3">
                    <a class="list-group-item list-group-item-action d-flex align-items-center active" href="#">
                        Games
                        <small class="text-muted ms-auto">24</small>
                    </a>
                </div>
                <div class="subheader mb-2">مرتب سازی بر اساس </div>
                <div class="mb-3">
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked>
                        <span class="form-check-label">جدید ترین</span>
                    </label>
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked>
                        <span class="form-check-label">قدیمی ترین</span>
                    </label>
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked>
                        <span class="form-check-label">پربازدید ترین</span>
                    </label>
                </div>
                <div class="subheader mb-2">نوع پست</div>
                <div>
                    <select name="" class="form-select">
                        <option>همه</option>
                        <option>اموزشی</option>
                        <option>پکیج</option>
                        <option>رپرتاژ</option>
                    </select>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-100">
                        اعمال فیلتر
                    </button>
                    <a href="#" class="btn btn-link w-100">
                        حذف فیلتر
                    </a>
                </div>
            </form>
        </div>
        <div class="col-9">
            <div class="row row-cards">
                @forelse ($posts as $item)
                    <x-widgets.post-card :post="$item"></x-widgets.post-card>
                @empty
                    <x-alert type='' level='warning' message='هنوز پستی ثبت نشده است.'></x-alert>
                @endforelse
            </div>
        </div>
    </div>
@endsection
