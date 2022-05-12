@extends('site.layouts.master')

@section('page-title')
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.discussions.index') }}">گفتگو ها</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ $discuss->title }}</a></li>
@endsection

@section('content')
    <div class="row row-cards">
        <div class="col-lg-8">
            <div class="card card-lg">
                <div class="">
                    <div class="d-flex px-3 mt-3">
                        <div class="badge badge-outline bg-lime-lt mb-1" style="font-size: .7rem !important;">
                            <a href="{{ $discuss->category->url() }}">
                                دسته بندی
                            </a>
                        </div>
                        <div class="text-muted mx-2" style="font-size: .7rem !important;">
                            ایجاد شده در : {{ $discuss->created_at }}
                        </div>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -3rem !important;">
                    <div>
                        <h1>{{ $discuss->title }} </h1>
                        <p class="text-dark" style="line-height: 2;font-size: 1rem !important; text-align: justify">
                            {!! $discuss->body !!}</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock"
                                    width="20" height="20" viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg>
                                <p class="mx-1">{{ $discuss->created_at }}</p>
                            </div>
                            <div class="d-flex">
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                        width="20" height="20" viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                    <span class="text-muted"
                                        style="font-size: .7rem !important;">{{ $discuss->view_count }}</span>
                                </div>
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" />
                                        <line x1="8" y1="9" x2="16" y2="9" />
                                        <line x1="8" y1="13" x2="14" y2="13" />
                                    </svg>
                                    <span class="text-muted"
                                        style="font-size: .7rem !important;">{{ $discuss->children()->count() }}</span>
                                </div>
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-lg mt-3">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <div>
                        <p class="h3">پاسخ ها</p>
                    </div>
                    <div>
                        @auth
                            <a href="" class="btn btn-sm btn-bitbucket">افزودن پاسخ</a>
                        @else
                            <a href="" class="btn btn-sm btn-bitbucket">افزودن پاسخ</a>
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    <div>

                    </div>
                    <div class="text-center h3">هنوز هیچ پاسخی ثبت نشده است!</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="" class="d-flex align-items-center">
                                        <img class="avatar" src="{{ $discuss->discussionable->avatar }}" alt="">
                                        <h3 class="mx-2 text-black ">{{ $discuss->discussionable->full_name }}</h3>
                                    </a>
                                </div>
                                <div>
                                    @auth
                                        <button class="btn btn-sm btn-bitbucket">دنبال کردن</button>
                                    @else
                                        <button class="btn btn-sm btn-bitbucket">دنبال کردن</button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mt-2 text-justify">{{ $discuss->discussionable->profile->bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>پرچسب های این گفتگو</h4>
                            <div class="mx-auto">
                                @foreach ($discuss->tags() as $item)
                                    <a href="{{ getTag($item)->url() }}"><span
                                            class="badge bg-lime-lt">{{ getTag($item)->title }}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>به اشتراک بگذارید</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
