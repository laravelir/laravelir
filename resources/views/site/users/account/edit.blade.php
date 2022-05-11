@extends('site.users.account.layout')

@section('title')
    حساب کاربری
@endsection

{{-- @section('account-title')
    <h1 class="m-0">داشبورد</h1>
@endsection --}}

{{-- @section('page-title')
    <div class="">
        حساب کاربری
    </div>
@endsection --}}

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('account.index') }}">حساب کاربری</a></li>
    <li class="breadcrumb-item active"><a href="#">ویرایش اطلاعات حساب کاربری</a></li>
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
    <div class="col-md-12">
        <form action="{{ route('account.edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <h4>اطلاعات پایه:</h4>
                <div class="col-4">
                    <div class="form-group mb-3 ">
                        <label class="form-label required">نام</label>
                        <div>
                            <input type="text" class="form-control" required name="fname" id="fname" placeholder="علی"
                                value="{{ old('fname') ?? $user->profile->fname }}">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3 ">
                        <label class="form-label required">نام خانوادگی</label>
                        <div>
                            <input type="text" class="form-control" required name="lname" id="lname"
                                value="{{ old('lname') ?? $user->profile->lname }}">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label class="form-label required">نام کاربری</label>
                        <div>
                            <input type="text" class="form-control" value="{{ old('usernmae') ?? $user->username }}">
                            <small class="form-hint">ترجیها نام کابری گیتهاب.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label class="form-label required">ایمیل</label>
                        <div>
                            <input type="email" class="form-control" required name="email" id="email"
                                placeholder="example@email.com" value="{{ old('email') ?? $user->email }}">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3 ">
                        <label class="form-label">شماره همراه</label>
                        <div>
                            <input type="text" class="form-control" name="mobile" id="mobile"
                                value="{{ old('mobile') ?? $user->mobile }}" placeholder="9128558555">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4>شبکه های اجتماعی شما:</h4>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-github</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5">
                                </path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-gitlab"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-gitlab</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M21 14l-9 7l-9 -7l3 -11l3 7h6l3 -7z"></path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-twitter</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-bitbucket"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-bitbucket</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M3.648 4a0.64 .64 0 0 0 -.64 .744l3.14 14.528c.07 .417 .43 .724 .852 .728h10a0.644 .644 0 0 0 .642 -.539l3.35 -14.71a0.641 .641 0 0 0 -.64 -.744l-16.704 -.007z">
                                </path>
                                <path d="M14 15h-4l-1 -6h6z"></path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">

                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-twitter</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" value="" class="form-control" placeholder="Username">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="mb-3">
                        <label class="form-label">مختصری درباره خود <span
                                class="form-label-description">0/100</span></label>
                        <textarea class="form-control" name="bio" rows="5"
                            placeholder="درباره خود، شغل، علایق و ...">{{ old('bio') ?? $user->profile->bio }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 ">
                <label class="form-label">Select</label>
                <div>
                    <select class="form-select">
                        <option>Option 1</option>
                    </select>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">ویرایش</button>
            </div>
        </form>
    </div>
@endsection
