@extends('site.layouts.master')

@section('title')
    توسعه دهندگان
@endsection

@section('page-title')
    <div class="">
        توسعه دهنگان
        <p class="text-muted mt-1" style="font-size: .7rem !important;">{{ $users->count() }} کاربر</p>
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.posts.index') }}">پست ها</a></li>
    <li class="breadcrumb-item active"><a href="#">پست خوب ما</a></li>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
            <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="جست و جو" />
            <a href="#" class="btn btn-primary d-none">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                New user
            </a>
        </div>
    </div>
@endsection

@section('content')
@endsection
