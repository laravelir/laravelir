@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.posts.index') }}">پستان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش پست</a></li>
@endsection

@section('title')
    ویرایش پست
@endsection

@section('page-title')
    ویرایش پست
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش پست</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.posts.update', $post) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $post->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="{{ old('email') ?? $post->email }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="mobile">شماره موبایل</label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                    value="{{ old('mobile') ?? $post->mobile }}">
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
                                    <span class="col">ایمیل و موبایل پست فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($post->activate())>
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
                                    <span class="col">پست ادمین باشد.</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_admin"
                                                @checked($post->is_admin)>
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
