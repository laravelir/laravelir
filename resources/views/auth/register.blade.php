@extends('site.layouts.master')

@section('content')
    <div class="page-center">
        <div class="container-tight">
            <div class="text-center mb-1">
                <a href="{{ route('site.index') }}" class="navbar-brand navbar-brand-autodark"><img
                        src="{{ asset('/statics/shared/images/laravel-logo.png') }}" height="128" class="mb-n2"
                        alt="جامعه لاراول ایران"></a>
            </div>
            <div class="card card-md">
                <div class="card-body text-center p-sm-5">
                    <h1 class="">Laravelir</h1>
                    <p class="text-muted">ثبت نام کنید</p>
                </div>
                <div class="hr-text hr-text-center hr-text-spaceless">ثبت نام</div>
                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">نام کاربری</label>
                            <div class="input-group input-group-flat">
                                <span class="input-group-text">
                                </span>
                                <input type="text" class="form-control ps-1  @error('username') is-invalid @enderror"
                                    required name="username">
                            </div>
                            <div class="form-hint"> ترجیها نام کاربری گیت هاب </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">ایمیل</label>
                            <div class="input-group input-group-flat">
                                <input type="email" class="form-control ps-1  @error('email') is-invalid @enderror" required
                                    name="email">
                            </div>
                        </div>
                        <div class="my-3">
                            <label class="form-label">رمز عبور</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="off" name="password" required>
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path
                                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">ثبت نام به منذله پذیرش <a href="./terms-of-service.html"
                                        tabindex="-1">قوانین
                                    </a> می باشد.</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">ثبت نام</button>
                        </div>
                    </div>
                </form>
                <div class="row align-items-center my-3 mx-auto">
                    <div class="hr-text">یا</div>
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-white w-100">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>
                                Login with Github
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
