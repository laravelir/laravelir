@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.categories.index') }}">دسته بندیان</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت دسته بندی</a></li>
@endsection

@section('title')
    ثبت دسته بندی
@endsection

@section('page-title')
    ثبت دسته بندی
@endsection


@section('scripts')
    <script src="{{ asset('/statics/shared/dist/libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('parent_id'), {
                copyClassesToDropdown: false,
                dropdownClass: 'dropdown-menu',
                optionClass: 'dropdown-item',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
            window.TomSelect && (new TomSelect(el = document.getElementById('user_id'), {
                copyClassesToDropdown: false,
                dropdownClass: 'dropdown-menu',
                optionClass: 'dropdown-item',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
    </script>
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت دسته بندی</h3>

            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.categories.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">نام</label>
                                <input type="text" class="form-control " name="title" id="title"
                                    value="{{ old('title') }}" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-4">
                                <label class="form-label">دسته بندی والد</label>
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
                        <div class="col-2">
                            <div class="mb-3">
                                <label class="form-label">رنگ دسته بندی</label>
                                <input type="color" class="form-control form-control-color" title="رنگ شاخص دسته بندی را انتخاب کنید" name="color_hex">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> دسته بندی فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active" checked>
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
