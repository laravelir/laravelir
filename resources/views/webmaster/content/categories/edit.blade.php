@extends('webmaster.layouts.master')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('webmaster.categories.index') }}">دسته بندی ها</a></li>
<li class="breadcrumb-item active"><a href="#">ویرایش دسته بندی</a></li>
@endsection

@section('title')
    ویرایش دسته بندی
@endsection

@section('page-title')
    ویرایش دسته بندی
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش دسته بندی</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')
                <form action="{{ route('webmaster.categories.update', $category) }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title" required
                                    value="{{ old('title') ?? $category->title }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-4">
                                <label class="form-label">دسته بندی والد</label>
                                <select type="text" class="form-select" placeholder="دسته بندی والد را انتخاب کنید"
                                    id="parent_id" name="parent_id" required>
                                    <option value="0" selected>بدون والد</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $category->parent_id)
                                            data-custom-properties="&lt;span class=&quot;badge&quot; style=&quot;background-color:{{ $item->logo_path }}&quot; &gt;&lt;/&gt;">
                                            {{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label class="form-label">رنگ دسته بندی</label>
                                <input type="color" class="form-control form-control-color" title="رنگ شاخص دسته بندی را انتخاب کنید" name="color_hex" value="{{ $category->color_hex }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label class="row">
                                    <span class="col"> دسته بندی فعال شده باشد</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                @checked($category->active)>
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
