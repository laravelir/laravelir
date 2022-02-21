@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.podcasts.index') }}">پادکستان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش پادکست</a></li>
@endsection

@section('title')
    ویرایش پادکست
@endsection

@section('page-title')
    ویرایش پادکست
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش پادکست</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.podcasts.update', $podcast) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="fname">نام</label>
                                <input type="text" class="form-control" name="fname" id="fname" required
                                    value="{{ old('fname') ?? $podcast->profile->fname }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="lname">نام خانوادگی</label>
                                <input type="text" class="form-control" name="fname" id="fname" required
                                    value="{{ old('lname') ?? $podcast->profile->lname }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="podcastname">نام پادکستی</label>
                                <input type="text" class="form-control" name="podcastname" id="password" required
                                    value="{{ old('podcastname') ?? $podcast->podcastname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="{{ old('email') ?? $podcast->email }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="mobile">شماره موبایل</label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                    value="{{ old('mobile') ?? $podcast->mobile }}">
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
                                    <span class="col">ایمیل و موبایل پادکست فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($podcast->activate())>
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
                                    <span class="col">پادکست ادمین باشد.</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_admin"
                                                @checked($podcast->is_admin)>
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
