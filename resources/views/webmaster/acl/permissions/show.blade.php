@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">سطح دسترسی ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش سطح دسترسی </a></li>
@endsection

@section('page-title')
    نمایش سطح دسترسی
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $user->name }}</p>

                    </div>
                    <div class="col-6">
                        <p>عنوان فارسی : {{ $user->fa_name }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
