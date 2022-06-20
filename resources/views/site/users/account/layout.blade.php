@extends('site.layouts.master')

@section('content')
    <div class="row gx-lg-5">
        <div class="d-none d-lg-block col-lg-3">
            <ul class="nav nav-pills nav-vertical">
                <li class="nav-item">
                    <a href="{{ route('account.index') }}" class="nav-link {{ isActive('account.index') }}">
                        داشبورد
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.edit.form') }}" class="nav-link  {{ isActive('account.edit.form') }}">
                        ویرایش حساب کاربری
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.password.change.form') }}" class="nav-link  {{ isActive('account.password.change.form') }}">
                        تغییر رمز عبور
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#projects" class="nav-link  {{ isActive('account.projects.index') }}" data-bs-toggle="collapse" aria-expanded="false">
                        پروژه ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="projects">
                        <li class="nav-item">
                            <a href="{{ route('account.projects.index') }}" class="nav-link  {{ isActive('account.projects.index') }}">
                                لیست پروژه ها
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.projects.create') }}" class="nav-link  {{ isActive('account.projects.create') }}">
                                ثبت پروژه جدید
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#discussions" class="nav-link  {{ isActive('account.discussions.index') }}" data-bs-toggle="collapse" aria-expanded="false">
                        گفت و گو ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="discussions">
                        <li class="nav-item">
                            <a href="{{ route('account.discussions.index') }}" class="nav-link  {{ isActive('account.discussions.index') }}">
                                لیست گفت و گو های من
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.discussions.create') }}" class="nav-link  {{ isActive('account.discussions.index') }}">
                                ثبت گفت و گو جدید
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="#tickets" class="nav-link  {{ isActive('account.tickets.index') }}" data-bs-toggle="collapse" aria-expanded="false">
                        تیکت ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="tickets">
                        <li class="nav-item">
                            <a href="{{ route('account.tickets.index') }}" class="nav-link  {{ isActive('account.tickets.index') }}">
                                لیست تیکت های من
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account.tickets.index') }}" class="nav-link  {{ isActive('account.tickets.index') }}">
                                ثبت تیکت جدید
                            </a>
                        </li>

                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="#favorites" class="nav-link  {{ isActive('account.favorites.index') }}" data-bs-toggle="collapse" aria-expanded="false">
                        علاقه مندی ها
                        <span class="nav-link-toggle"></span>
                    </a>
                    <ul class="nav nav-pills collapse" id="favorites">
                        <li class="nav-item">
                            <a href="{{ route('account.favorites.index') }}" class="nav-link  {{ isActive('account.favorites.index') }}">
                                لیست علاقه مندی های من
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
