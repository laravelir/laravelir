@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.achievements.index') }}">دستاورد ها</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش دستاورد</a></li>
@endsection

@section('title')
    ویرایش دستاورد
@endsection

@section('page-title')
    ویرایش دستاورد
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش دستاورد</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.achievements.update', $achievement) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $achievement->title }}">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">توضیحات</label>
                                <input type="text" class="form-control" name="description" id="description" required
                                    value="{{ old('description') ?? $achievement->description }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="form-label">تصویر لوگو</div>
                                <input type="file" class="form-control" required name="logo_path" id="logo_path" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 ">
                                <img class="avatar avatar-lg" src="{{ $achievement->logo_path }}" alt="{{ $achievement->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> دستاورد فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($achievement->active)>
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
