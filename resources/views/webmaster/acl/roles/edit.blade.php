@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.roles.index') }}">نقشان</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش نقش</a></li>
@endsection

@section('title')
    ویرایش نقش
@endsection

@section('page-title')
    ویرایش نقش
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش نقش</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.roles.update', $role) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">عنوان</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    value="{{ old('name') ?? $role->name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="fa_name">عنوان فارسی</label>
                                <input type="text" class="form-control" name="fa_name" id="fa_name" required
                                    value="{{ old('fa_name') ?? $role->fa_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">توضیحات</label>
                                <input type="description" class="form-control" name="description" id="description" required
                                    value="{{ old('description') ?? $role->description }}">
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
