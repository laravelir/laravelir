@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.roles.index') }}">نقش ان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش نقش </a></li>
@endsection

@section('page-title')
    نمایش نقش
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $role->name }}</p>
                    </div>
                    <div class="col-6">
                        <p>عنوان فارسی : {{ $role->fa_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
