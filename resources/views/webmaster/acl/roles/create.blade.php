@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.roles.index') }}">نقشان</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت نقش</a></li>
@endsection

@section('title')
    ثبت نقش
@endsection

@section('page-title')
    ثبت نقش
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت نقش</h3>

            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.roles.store') }}" enctype="multipart/form-data" method="post">
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
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">توضیحات</label>
                                <input type="description" class="form-control" name="description" id="description" required
                                    value="{{ old('description') }}">
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
