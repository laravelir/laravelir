@extends('site.layouts.master')

@section('title')
    گفتگو ها
@endsection

@section('page-title')
    <div class="">
        گفتگو ها
        <p class="text-muted mt-1" style="font-size: .7rem !important;">{{ $discussions->count() }} گفتگو</p>
    </div>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('site.discussions.index') }}">گفتگو ها</a></li>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        @auth
            <div class="d-flex">
                {{-- data-bs-toggle="modal data-bs-target="#modal-new" --}}
                <a href="{{ route('site.discussions.create') }}" class="btn btn-primary d-none d-sm-inline-block" " >
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                                        <svg xmlns=" http://www.w3.org/2000/svg"
                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    ثبت گفتگو جدید
                </a>
                <a href="{{ route('site.discussions.create') }}" class="btn btn-primary d-sm-none btn-icon"
                    aria-label="ثبت گفتگو جدید">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div>

        @endauth
    </div>
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
                <div class="subheader mb-2">برچسب های محبوب</div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" name="form-tags[]" value="party">
                                <span class="form-check-label">party</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="subheader mb-2">وضعیت</div>
                <div class="mb-3">
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked>
                        <span class="form-check-label">باز</span>
                    </label>
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="4 stars">
                        <span class="form-check-label">بسته شده</span>
                    </label>
                    <label class="form-check mb-1">
                        <input type="radio" class="form-check-input" name="form-stars" value="3 stars">
                        <span class="form-check-label">بدون پاسخ</span>
                    </label>
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
        <div class="col-md-9">
            @forelse ($discussions as $item)
                <x-widgets.discussion-card :discuss="$item" />
            @empty
            @endforelse
        </div>
    </div>
@endsection
