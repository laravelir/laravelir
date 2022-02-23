@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">نحوه آشنایی با ما</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت نحوه آشنایی با ما</a></li>
@endsection

@section('title')
    ثبت نحوه آشنایی با ما
@endsection

@section('page-title')
    ثبت نحوه آشنایی با ما
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت نحوه آشنایی با ما</h3>

            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.acquaints.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group mb-12">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control " name="title" id="title"
                                    value="{{ old('title') }}" required>
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
