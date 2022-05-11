@extends('site.layouts.master')

@section('title')
    گفتگو ها
@endsection

@section('page-title')
    <div class="">
        ثبت گفتگو جدید
        {{-- <p class="text-muted mt-1" style="font-size: .7rem !important;">ثبت گفت</p> --}}
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.discussions.index') }}">گفتگو ها</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت گفتگو جدید</a></li>
@endsection

@section('styles')
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.2/dist/css/tom-select.css" rel="stylesheet">


    <style>
        .editor-container {
            direction: rtl !important;
        }

    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.2/dist/js/tom-select.complete.min.js"></script>

    <!-- Main Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var editor = new Quill('#editor-body', {
            modules: {
                toolbar: [

                    ['bold', 'italic', 'underline'],
                    ['image', 'link', 'code-block'],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ],
            },
            theme: 'snow' // or 'bubble'
        });

        editor.format('direction', 'rtl');
        editor.format('align', 'right');

        var body = document.getElementById('body');

        editor.on('text-change', function() {
            body.value = editor.root.innerHTML;
        });


        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect("#tom-select", {
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });

            new TomSelect("#tom-tags", {
                maxItems: 5
            });
        });
    </script>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
            {{-- data-bs-toggle="modal data-bs-target="#modal-new" --}}
            <a href="{{ route('site.discussions.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                گفتگو های من
            </a>
            <a href="{{ route('site.discussions.create') }}" class="btn btn-primary d-sm-none btn-icon"
                aria-label="گفتگو های من">
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
        {{-- <div class="col-3 d-none">
            <form action="" method="get">
                <div class="subheader mb-2">دسته بندی ها</div>
                <div class="list-group list-group-transparent mb-3">
                    @foreach ($categories as $item)
                        <a class="list-group-item list-group-item-action d-flex align-items-center " href="#">
                            {{ $item->title }}
                            <small class="text-muted ms-auto">24</small>
                        </a>
                    @endforeach
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
        </div> --}}
        <div class="col-md-9 mx-auto">
            <div class="card my-3 shadow-sm">
                <div class="card-header">
                    <div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar"
                                    style="background-image: url({{ user()->avatar }})"></span>
                            </div>
                            <div class="col">
                                <div class="card-title">{{ user()->full_name }}</div>
                                <div class="card-subtitle" style="font-size: .8rem !important;"><a href="">{{ user()->username }}@</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-actions btn-actions d-none">
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
                    @include('shared.errors')

                    <form action="{{ route('site.discussions.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="title">عنوان</label>
                                    <input type="text" class="form-control " name="title" id="title"
                                        value="{{ old('title') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="editor-escription">متن پیام</label>
                                    <input type="hidden" name="body" id="body">
                                    <div id="editor-body" class="editor-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="mb-4">
                                    <label class="form-label">دسته بندی </label>
                                    <select type="text" class="form-select" placeholder="دسته بندی  را انتخاب کنید"
                                        id="tom-select" name="category_id" required>
                                        <option value="0">دسته بندی مورد نظر را انتخاب کنید.</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"> {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="mb-4">
                                    <label class="form-label">برچسب های مرتبط </label>
                                    <select type="text" class="form-select" placeholder="برچسب های مرتبط  را انتخاب کنید"
                                        id="tom-tags" name="tags[]" multiple required>
                                        @foreach ($tags as $item)
                                            <option value="{{ $item->id }}"> {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
