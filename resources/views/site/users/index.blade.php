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
    <li class="breadcrumb-item active"><a href="{{ route('site.posts.index') }}">توسعه دهنگان</a></li>
    {{-- <li class="breadcrumb-item active"><a href="#">توسعه دهنگان</a></li> --}}
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

@section('content')
    <div class="row row-cards">
        @forelse ($users as $item)
            <div class="col-md-6 col-lg-3 ">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="">
                            <div class="dropdown">
                                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="1" />
                                        <circle cx="12" cy="19" r="1" />
                                        <circle cx="12" cy="5" r="1" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-center">
                                    <a class="dropdown-item" href="#">Edit user</a>
                                    <a class="dropdown-item text-danger" href="#">Delete user</a>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus"
                                    width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 11h6m-3 -3v6" />
                                </svg>
                                Follow
                            </a>
                            {{-- <a href="#" class="btn btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-minus"
                                    width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <line x1="16" y1="11" x2="22" y2="11" />
                                </svg>
                                UnFollow
                            </a> --}}
                        </div>
                    </div>
                    <div class="card-body p-4 text-center">
                        <a href="{{ $item->url() }}"><img class="avatar avatar-xl mb-3 avatar-rounded"
                                src="{{ $item->avatar }}" /></a>
                        {{-- <span class="avatar avatar-xl mb-3 avatar-rounded">JL</span> --}}
                        <h3 class="m-0 mb-1"><a href="{{ $item->url() }}">{{ $item->username }}</a></h3>
                        <div class="text-muted">{{ $item->full_name }}</div>
                        {{-- <div class="mt-3">
                            <span class="badge bg-purple-lt">Owner</span>
                        </div> --}}
                    </div>
                    <div class="d-flex">
                        <a href="#" class="card-btn">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <polyline points="3 7 12 13 21 7" />
                            </svg>
                            گفتگو
                        </a>
                        <a href="#" class="card-btn">
                            پروفایل
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center mt-3">
                {!! $users->links() !!}
            </div> --}}
        @empty
            <x-alert type='' level='warning' message='تا کنون هیچ کاربری ثبت نام کرده است.'></x-alert>
        @endforelse
    </div>
@endsection
