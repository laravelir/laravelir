@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.faqs.index') }}">سوال متداولان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش سوال متداول</a></li>
@endsection

@section('title')
    ویرایش سوال متداول
@endsection

@section('page-title')
    ویرایش سوال متداول
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش سوال متداول</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.faqs.update', $faq) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">سوال</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $faq->fname }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="answer">پاسخ</label>
                                <input type="text" class="form-control" name="answer" id="answer" required
                                    value="{{ old('answer') ?? $faq->answer }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">گروه</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="{{ old('email') ?? $faq->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> سوال متداول فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($faq->active)>
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
