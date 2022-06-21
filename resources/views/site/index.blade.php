@extends('site.layouts.master')

@section('page-title')
    صفحه اصلی
@endsection

@section('content')
    <div class="row row-deck row-cards">
        {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Locations</h3>
                    <div class="ratio ratio-21x9">
                        <div>
                            <div id="map-world" class="w-100 h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div>
            <div class="col-12">
                <div class="page-header d-print-none">
                    <div class="row g-2 d-flex align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="page-title">
                                پست ها
                            </h2>
                            <div class="text-muted mt-1">{{ $posts->count() }} پست</div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col col-md-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <a href="{{ route('site.posts.index') }}" class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <desc>Download more icon variants from https://tabler-icons.io/i/plus</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    همه پست ها
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row row-cards my-3">
                    @forelse ($posts as $item)
                        <x-widgets.post-card :post="$item"></x-widgets.post-card>
                    @empty
                        <x-alert type='' level='warning' message='هنوز پستی ثبت نشده است.'></x-alert>
                    @endforelse

                </div>

            </div>
        </div>


        {{-- <div>
            <div class="col-12">
                <div class="page-header d-print-none">
                    <div class="row g-2 d-flex align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="page-title">
                                پروژه ها
                            </h2>
                            <div class="text-muted mt-1">1-12 of 241 پروژه</div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col col-md-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <a href="#" class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <desc>Download more icon variants from https://tabler-icons.io/i/plus</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    ثبت پروژه
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row row-cards my-3">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <a href="#" class="d-block"><img
                                    src="{{ asset('/statics/shared/dist/static/photos/1b73704b282a8ec6.jpg') }}"
                                    class="card-img-top"></a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 rounded"
                                        style="background-image: url({{ asset('/statics/shared/dist/static/avatars/000m.jpg') }})"></span>
                                    <div>
                                        <div>Paweł Kuna</div>
                                        <div class="text-muted">3 days ago</div>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-muted">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/eye</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                            </svg>
                                            467
                                        </span>
                                        <span class="ms-3 text-muted">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/heart
                                                </desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                            </svg>
                                            67
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <a href="#" class="d-block"><img
                                    src="{{ asset('/statics/shared/dist/static/photos/6ab3200b14549f8a.jpg') }}"
                                    class="card-img-top"></a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 rounded"
                                        style="background-image: url({{ asset('/statics/shared/dist/static/avatars/002m.jpg') }})"></span>
                                    <div>
                                        <div>Mallory Hulme</div>
                                        <div class="text-muted">yesterday</div>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-muted">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <desc>Download more icon variants from https://tabler-icons.io/i/eye</desc>
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                            </svg>
                                            369
                                            </sp>
                                            <span class="ms-3 text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled text-red"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <desc>Download more icon variants from https://tabler-icons.io/i/heart
                                                    </desc>
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                </svg>
                                                32
                                                </sp>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div> --}}







        <div class="col-12">
            <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                            <line x1="10" y1="10" x2="10.01" y2="10" />
                            <line x1="14" y1="10" x2="14.01" y2="10" />
                            <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                        </svg>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h3 class="h1">جامعه توسعه دهنگان لاراول</h3>
                            <div class="markdown text-muted">مکانی برای اشتراک گذاری پروژه ه و تجربه و سوالات توسعه دهنگان
                                لاراول</div>
                            <div class="mt-3">
                                <a href="{{ route('auth.login.form') }}" class="btn btn-primary" target="_blank"
                                    rel="noopener">ورود</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-lg-4">
            <a href="https://laravelir.ir/sponsors" class="card card-sponsor" target="_blank" rel="noopener"
                style="background-image: url({{ asset('/statics/shared/images/sponsor-banner-homepage.svg') }})"
                aria-label="Sponsor Tabler!">
                <div class="card-body"></div>
            </a>
        </div> --}}
    </div>
@endsection
