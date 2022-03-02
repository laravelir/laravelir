@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.posts.index') }}">پستان</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت پست</a></li>
@endsection

@section('title')
    ثبت پست
@endsection

@section('page-title')
    ثبت پست
@endsection


@section('styles')
    <!-- Theme included stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> --}}

    <style>
        .editor-container {
            direction: rtl !important;
        }

    </style>
@endsection

@section('scripts')
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



    </script>
@endsection


@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت پست</h3>

            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.posts.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label required" for="fname">عنوان</label>
                                <input type="text" class="form-control " name="fname" id="fname"
                                    value="{{ old('fname') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <label class="form-label required">دسته بندی والد</label>
                                <select type="text" class="form-select" placeholder="دسته بندی والد را انتخاب کنید"
                                    id="parent_id" name="parent_id" required>
                                    <option value="0" selected>بدون والد</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties="&lt;img class=&quot;avatar avatar-xs&quot; src=&quot;{{ $item->logo_path }}&quot; &gt;&lt;/&gt;">
                                            {{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-4">
                                <label class="form-label required">نویسنده</label>
                                <select type="text" class="form-select" placeholder="نویسنده را انتخاب کنید"
                                    id="author_id" name="author_id" required>
                                    @foreach ($authors as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == user()->id) selected @endif>
                                            {{ $item->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-4">
                                <label class="form-label required">نوع پست</label>
                                <select class="form-select" placeholder="نوع پست را انتخاب کنید" id="type" name="type"
                                    required>
                                    <option value="a">آموزش</option>
                                    <option value="b">رپرتاژ</option>
                                    <option value="c">پکیج</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="body">متن </label>
                                <input type="hidden" name="body" id="body">
                                <div id="editor-body" class="editor-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-12">
                            <div class="mb-3">
                              <label class="form-label">Simple selectgroup</label>
                              <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                  <input type="checkbox" name="name" value="HTML" class="form-selectgroup-input" checked>
                                  <span class="form-selectgroup-label">HTML</span>
                                </label>
                                <label class="form-selectgroup-item">
                                  <input type="checkbox" name="name" value="CSS" class="form-selectgroup-input">
                                  <span class="form-selectgroup-label">CSS</span>
                                </label>
                                <label class="form-selectgroup-item">
                                  <input type="checkbox" name="name" value="PHP" class="form-selectgroup-input">
                                  <span class="form-selectgroup-label">PHP</span>
                                </label>
                                <label class="form-selectgroup-item">
                                  <input type="checkbox" name="name" value="JavaScript" class="form-selectgroup-input">
                                  <span class="form-selectgroup-label">JavaScript</span>
                                </label>
                              </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col">ایمیل و موبایل پست فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active" checked>
                                        </label>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col">پست فعال و قابل مشاهده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active">
                                        </label>
                                    </span>
                                </label>
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
@endsection
