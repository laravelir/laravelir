@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.comments.index') }}">نظرات</a></li>
@endsection

@section('title')
    نظرات
@endsection

@section('page-title')
    نظرات
@endsection

@section('btn-list')
    {{-- data-bs-toggle="modal data-bs-target="#modal-new" --}}
    <a href="{{ route('webmaster.comments.create') }}" class="btn btn-primary d-none d-sm-inline-block" " >
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns=" http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <line x1="12" y1="5" x2="12" y2="19" />
        <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        نظرات تایید نشده
    </a>
    <a href="{{ route('webmaster.comments.create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="نظرات تایید نشده">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
    </a>
@endsection


@section('content')
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کاربر ثبت کننده</th>
                            <th>برای</th>
                            <th>نظر</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th class="w-1">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $key => $value)
                            <tr>
                                <td>
                                    <div class="text-muted">{{ $comments->firstItem() + $key }}</div>
                                </td>
                                <td data-label="Name">
                                    <div class="d-flex py-1 align-items-center">
                                        <span class="avatar me-2"
                                            style="background-image: url({{ $value->commentable->avatar }})"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium"><a
                                                    href="{{ $value->commentable->url() }}">{{ $value->commentable->label }}</a></div>
                                            <div class="text-muted">{{ $value->commentable->full_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $value->email }}</div>
                                </td>
                                <td>
                                    <div>{{ $value->comment }}</div>
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
                                                    href="{{ route('webmaster.comments.show', $value) }}">
                                                    نمایش
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('webmaster.comments.edit', $value) }}">
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
            {!! $comments->links() !!}
        </div>
    </div>


    <div class="modal modal-blur fade" id="modal-new" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">کاربر جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('webmaster.comments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="fname">نام</label>
                                    <input type="text" class="form-control" name="fname" id="fname" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="lname">نام خانوادگی</label>
                                    <input type="text" class="form-control" name="fname" id="fname" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="commentname">نام کاربری</label>
                                    <input type="text" class="form-control" name="commentname" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="email">ایمیل</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="mobile">شماره موبایل</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="password">رمز عبور</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label class="row">
                                        <span class="col">کاربر ادمین باشد.</span>
                                        <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label class="row">
                                        <span class="col">ثبت شدن را به کاربر اطلاع بده (ایمیل)</span>
                                        <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </label>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            انصراف
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            ثبت
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
