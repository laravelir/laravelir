@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">کاربران</a></li>
@endsection

@section('page-title')
    کاربران
@endsection

@section('content')
    <div class="col-10 mx-auto">
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
                            <th>Created at</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $value)
                            <tr>
                                <td>
                                    <div class="text-muted">{{ $users->firstItem() + $key }}</div>
                                </td>
                                <td data-label="Name">
                                    <div class="d-flex py-1 align-items-center">
                                        <span class="avatar me-2"
                                            style="background-image: url({{ $value->avatar }})"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium"><a
                                                    href="{{ $value->url() }}">{{ $value->username }}</a></div>
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
                                                    href="{{ route('webmaster.users.show', $value) }}">
                                                    نمایش
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('webmaster.users.edit', $value) }}">
                                                    ویرایش
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <x-alert level='warning' message='تا کنون هیچ کاربری ثبت نشده است.'></x-alert>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <div class="mt-2">
            {!! $users->links() !!}
        </div>
    </div>
@endsection
