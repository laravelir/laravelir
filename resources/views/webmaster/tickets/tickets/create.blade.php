@extends('webmaster.layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.tickets.index') }}">تیکت برای کاربران</a></li>
    <li class="breadcrumb-item active"><a href="#">ثبت تیکت برای کاربر</a></li>
@endsection

@section('title')
    ثبت تیکت برای کاربر
@endsection

@section('page-title')
    ثبت تیکت برای کاربر
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ثبت تیکت برای کاربر</h3>
            </div>
            <div class="card-body">
                @include('shared.errors')

                <form action="{{ route('webmaster.tickets.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">عنوان</label>
                                <input type="text" class="form-control " name="title" id="title"
                                    value="{{ old('title') }}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="lname">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lname" id="lname" required
                                    value="{{ old('lname') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="ticketname">نام تیکت برای کاربری</label>
                                <input type="text" class="form-control" name="ticketname" id="ticketname" required
                                    value="{{ old('ticketname') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <div class="form-group mb-3">
                                <label class="form-label" for="body">توضیحات</label>
                                <textarea  class="form-control" name="body" id="body" required>
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
