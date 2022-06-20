@extends('site.users.account.layout')


@section('title')
    حساب کاربری
@endsection

@section('account-title')
    <h1 class="m-0">داشبورد</h1>
@endsection

{{-- @section('page-title')
    <div class="">
        حساب کاربری
    </div>
@endsection --}}


@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.posts.index') }}">حساب کاربری</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('site.posts.index') }}">پروژه ها</a></li>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
            {{-- <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="جست و جو" /> --}}
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

@section('inner-content')
    dsfsdfsdf
@endsection
