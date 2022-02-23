@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.acquaints.index') }}">نحوه آشنایی با ماان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش نحوه آشنایی با ما</a></li>
@endsection

@section('title')
    ویرایش نحوه آشنایی با ما
@endsection

@section('page-title')
    ویرایش نحوه آشنایی با ما
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش نحوه آشنایی با ما</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.acquaints.update', $acquaint) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $acquaint->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> نحوه آشنایی با ما فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($acquaint->active)>
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
