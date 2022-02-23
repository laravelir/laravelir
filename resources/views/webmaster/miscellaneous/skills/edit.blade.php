@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.skills.index') }}">مهارتان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش مهارت</a></li>
@endsection

@section('title')
    ویرایش مهارت
@endsection

@section('page-title')
    ویرایش مهارت
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش مهارت</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.skills.update', $skill) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $skill->title }}">
                            </div>
                        </div>
                        {{-- <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="parent_id">مهارت والد</label>
                                <input type="text" class="form-control" name="parent_id" id="parent_id" required
                                    value="{{ old('fname') ?? $skill->profile->fname }}">
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> مهارت فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($skill->active)>
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
