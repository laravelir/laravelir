@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.permissions.index') }}">سطح دسترسی ها </a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت سطح دسترسی</a></li>
@endsection

@section('title')
    ثبت سطح دسترسی
@endsection

@section('page-title')
    ثبت سطح دسترسی
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت سطح دسترسی</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.permissions.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">عنوان</label>
                                <input type="text" class="form-control " name="name" id="name" value="{{ old('name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="fa_name">عنوان فارسی</label>
                                <input type="text" class="form-control" name="fa_name" id="fa_name" required
                                    value="{{ old('fa_name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col">ایمیل و موبایل سطح دسترسی فعال شده باشد</span>
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
