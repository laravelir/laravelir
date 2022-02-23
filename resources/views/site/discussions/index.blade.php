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

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
            {{-- data-bs-toggle="modal data-bs-target="#modal-new" --}}
            <a href="{{ route('site.discussions.create') }}" class="btn btn-primary d-none d-sm-inline-block" " >
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns=" http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        <div class="card my-3 shadow-sm">
            <div class="card-header">
                <div>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar"
                                style="background-image: url(https://picsum.photos/536/354)"></span>
                        </div>
                        <div class="col">
                            <div class="card-title">کاربر حرفه ای</div>
                            <div class="card-subtitle" style="font-size: .8rem !important;">ثبت شده در 10 دقیقه پیش
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-actions btn-actions ">
                    <div class="d-flex align-items-center align-baseline">
                        <span class="text-muted" style="font-size: .7rem !important;">10</span>
                        <a href="#" class="" title="تعداد پاسخ ها">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                <line x1="12" y1="12" x2="12" y2="12.01"></line>
                                <line x1="8" y1="12" x2="8" y2="12.01"></line>
                                <line x1="16" y1="12" x2="16" y2="12.01"></line>
                            </svg>
                        </a>
                    </div>
                    <div class="d-flex align-items-center align-baseline mx-1">
                        <span class="text-muted" style="font-size: .7rem !important;">25</span>
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path
                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="d-flex align-items-center align-baseline mx-1">
                        <a href=""><span class="badge badge-outline text-purple">دسته بندی</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <h2>چطور خطای لاراول را برطرف کنم؟</h2>
                    <p class="text-muted">
                        yesterday I was working on this point system although it's my first time creating such , I
                        noticed when I add new reply the event is been fired and in my database I am getting the
                        points but the current point is not
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
