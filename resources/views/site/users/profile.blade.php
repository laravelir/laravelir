@extends('site.layouts.master')

@section('title')
    توسعه دهندگان
@endsection

{{-- @section('page-title')
    <div class="">
        توسعه دهنگان
        <p class="text-muted mt-1" style="font-size: .7rem !important;">{{ $user->full_name }} کاربر</p>
    </div>
@endsection --}}

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.posts.index') }}">پست ها</a></li>
    <li class="breadcrumb-item active"><a href="#">پست خوب ما</a></li>
@endsection

@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
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
<div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <span class="avatar avatar-md" style="background-image: url(...)"></span>
      </div>
      <div class="col">
        <h2 class="page-title">Paweł Kuna</h2>
        <div class="page-subtitle">
          <div class="row">
            <div class="col-auto">
              <!-- Download SVG icon from http://tabler-icons.io/i/building-skyscraper -->
              <!-- SVG icon code -->
              <a href="#" class="text-reset">UI Designer at Tabler</a>
            </div>
            <div class="col-auto">
              <!-- Download SVG icon from http://tabler-icons.io/i/users -->
              <!-- SVG icon code -->
              <a href="#" class="text-reset">194 friends</a>
            </div>
            <div class="col-auto text-success">
              <!-- Download SVG icon from http://tabler-icons.io/i/check -->
              <!-- SVG icon code with class="text-green" -->
              Verified
            </div>
          </div>
        </div>
      </div>
      <div class="col-auto d-none d-md-flex">
        <a href="#" class="btn btn-primary">
          <!-- Download SVG icon from http://tabler-icons.io/i/message -->
          <!-- SVG icon code -->
          Send message
        </a>
      </div>
    </div>
  </div>
@endsection
