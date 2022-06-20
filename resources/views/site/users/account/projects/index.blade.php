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
            <a href="#" class="btn btn-primary">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                ثبت پروژه جدید
            </a>
        </div>
    </div>
@endsection

@section('inner-content')
<div class="col-12 mx-auto">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-mobile-md card-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Info</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>تاریخ ثبت</th>
                        <th class="w-1">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $key => $value)
                        <tr>
                            <td>
                                <div class="text-muted">{{ $projects->firstItem() + $key }}</div>
                            </td>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2"
                                        style="background-image: url({{ $value->avatar }})"></span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium"><a
                                                href="{{ $value->url() }}">{{ $value->projectname }}</a></div>
                                        <div class="text-muted">{{ $value->full_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>{{ $value->email }}</div>
                            </td>
                            <td>
                                User
                            </td>
                            <td>
                                @if ($value->active)
                                    <span class="badge bg-green">فعال</span>

                                @else
                                    <span class="badge bg-red">غیر فعال</span>
                                @endif
                            </td>
                            <td class="text-muted">
                                {{ $value->created_at->format('Y/m/d H:i') }}
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                            عملیات
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="{{ route('webmaster.projects.show', $value) }}">
                                                نمایش
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('webmaster.projects.edit', $value) }}">
                                                ویرایش
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-alert type='' level='warning' message='تا کنون هیچ کاربری ثبت نشده است.'></x-alert>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    <div class="mt-2">
        {{-- {!! $projects->links() !!} --}}
    </div>
</div>

@endsection
