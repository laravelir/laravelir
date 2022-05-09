@extends('site.layouts.master')

@section('content')
    <div class="row gx-lg-5">
        <div class="d-none d-lg-block col-lg-3">
            <ul class="nav nav-pills nav-vertical">
                <li class="nav-item">
                    <a href="{{ route('account.index') }}" class="nav-link active">
                        داشبورد
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#menu-base" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                        پروژه ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="menu-base">
                        <li class="nav-item">
                            <a href="{{ route('account.projects.index') }}" class="nav-link">
                                لیست پروژه ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.projects.create') }}" class="nav-link">
                                ثبت پروژه جدید
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#menu-base" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                        پروژه ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="menu-base">
                        <li class="nav-item">
                            <a href="{{ route('account.projects.index') }}" class="nav-link">
                                لیست پروژه ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.projects.create') }}" class="nav-link">
                                ثبت پروژه جدید
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#menu-base" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                        پروژه ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="menu-base">
                        <li class="nav-item">
                            <a href="{{ route('account.projects.index') }}" class="nav-link">
                                لیست پروژه ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.projects.create') }}" class="nav-link">
                                ثبت پروژه جدید
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link bg-danger-lt">
                        خروج
                        {{-- <span class="badge bg-blue-lt ms-auto">1.0.0-beta10</span> --}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="markdown">
                        <div>
                            <div class="d-flex mb-3">
                                @yield('account-title')
                            </div>
                        </div>
                        {{-- <p>Tabler is a UI kit that speeds up the development process and makes it easier than ever! Built on the latest version of Bootstrap, it helps you create templates based on fully customizable and ready-to-use UI components, which can be used by both simple websites and sophisticated systems. With basic knowledge of HTML and CSS, you’ll be able to create dashboards that are fully functional and beautifully designed!</p> --}}
                        <div class="mt-4">
                            <div class="row">
                                @yield('inner-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
