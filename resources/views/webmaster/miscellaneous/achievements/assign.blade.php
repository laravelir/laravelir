@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">کاربران</a></li>
    <li class="breadcrumb-item active"><a href="#">تخصیص دستاورد به کاربر</a></li>
@endsection

@section('title')
    تخصیص دستاورد به کاربر
@endsection

@section('scripts')
    <script src="{{ asset('/statics/shared/dist/libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('achievement_id'), {
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

@section('page-title')
    تخصیص دستاورد به کاربر
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تخصیص دستاورد به کاربر</h3>

            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.achievements.assign') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">دستاورد</label>
                                <select type="text" class="form-select" placeholder="دستاورد را انتخاب کنید"
                                    id="achievement_id" name="achievement_id" required>
                                    @foreach ($achievements as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties="&lt;img class=&quot;avatar avatar-xs&quot; src=&quot;{{ $item->logo_path }}&quot; &gt;&lt;/&gt;">
                                            {{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">کاربر</label>
                                <select type="text" class="form-select" placeholder="کاربر را انتخاب کنید"
                                    id="user_id" name="user_id" required>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties="&lt;img class=&quot;avatar avatar-xs&quot; src=&quot;{{ $item->avatar }}&quot; &gt;&lt;/&gt;">
                                            {{ $item->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div>
                                <label class="row">
                                    <span class="col">تخصیص دستاورد به شدن را به کاربر اطلاع بده (ایمیل)</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="notify_email">
                                        </label>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success">تخصیص</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
