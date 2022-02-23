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
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <a href="#" class="d-block"><img src="https://picsum.photos/536/354"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href=""><span class="avatar me-3 rounded"
                                            style="background-image: url(https://picsum.photos/536/354)"></span></a>
                                    <div>
                                        <div><a href="" class="text-reset">Paweł Kuna</a></div>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-eye" width="20" height="20"
                                                    viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <path
                                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                                </svg>
                                                <span class="text-muted" style="font-size: .7rem !important;">10</span>
                                            </div>
                                            <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-message-2" width="16" height="16"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" />
                                                    <line x1="8" y1="9" x2="16" y2="9" />
                                                    <line x1="8" y1="13" x2="14" y2="13" />
                                                </svg>
                                                <span class="text-muted" style="font-size: .7rem !important;">10</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex  flex-column">
                                    <div class="badge badge-outline bg-lime-lt mb-1" style="font-size: .7rem !important;">
                                        پکیج</div>
                                    <div class="text-muted" style="font-size: .7rem !important;">زمان مطالعه: 5
                                        دقیقه</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
