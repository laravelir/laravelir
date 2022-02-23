@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.giftcodes.index') }}">کد هدیه ها</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش کد هدیه</a></li>
@endsection

@section('title')
    ویرایش کد هدیه
@endsection

@section('page-title')
    ویرایش کد هدیه
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش کد هدیه</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.giftcodes.update', $giftcode) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="fname">نام</label>
                                <input type="text" class="form-control" name="fname" id="fname" required
                                    value="{{ old('fname') ?? $giftcode->profile->fname }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="lname">نام خانوادگی</label>
                                <input type="text" class="form-control" name="fname" id="fname" required
                                    value="{{ old('lname') ?? $giftcode->profile->lname }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="giftcodename">نام کد هدیهی</label>
                                <input type="text" class="form-control" name="giftcodename" id="password" required
                                    value="{{ old('giftcodename') ?? $giftcode->giftcodename }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="{{ old('email') ?? $giftcode->email }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="mobile">شماره موبایل</label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                    value="{{ old('mobile') ?? $giftcode->mobile }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">رمز عبور</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col">ایمیل و موبایل کد هدیه فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($giftcode->activate())>
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
                                    <span class="col">کد هدیه ادمین باشد.</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_admin"
                                                @checked($giftcode->is_admin)>
                                        </label>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-warning">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
