<div>
    <div class="card my-3 shadow-sm" style="min-height: 250px !important; max-height: 250px !important">
        <div class="card-header">
            <div>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="avatar"
                            style="background-image: url({{ $discuss->discussionable->avatar }})"></span>
                    </div>
                    <div class="col">
                        <div class="card-title"><a class="text-black"
                                href="{{ $discuss->discussionable->url() }}">{{ $discuss->discussionable->full_name }}</a>
                        </div>
                        <div class="card-subtitle" style="font-size: .8rem !important;">
                            {{ $discuss->created_at }}</div>
                    </div>
                </div>
            </div>
            <div class="card-actions btn-actions ">
                <div class="d-flex align-items-center align-baseline">
                    <span class="text-muted"
                        style="font-size: .7rem !important;">{{ $discuss->children()->count() }}</span>
                    <span class="" title="تعداد پاسخ ها">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                            <line x1="12" y1="12" x2="12" y2="12.01"></line>
                            <line x1="8" y1="12" x2="8" y2="12.01"></line>
                            <line x1="16" y1="12" x2="16" y2="12.01"></line>
                        </svg>
                    </span>
                </div>
                <div class="d-flex align-items-center align-baseline mx-1">
                    <span class="text-muted"
                        style="font-size: .7rem !important;">{{ $discuss->view_count }}</span>
                    <span class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="2"></circle>
                            <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                            </path>
                        </svg>
                    </span>
                </div>
                <div class="d-flex align-items-center align-baseline mx-1">
                    <a href="{{ $discuss->category->url() }}"><span
                            class="badge badge-outline text-purple">{{ $discuss->category->title }}</span></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <h2><a href="{{ $discuss->url() }}">{{ $discuss->title }}</a></h2>
                <p class="text-muted">{{ strip_tags(Str::limit($discuss->body, 150)) }}</p>
                <div>
                    <div class="form-selectgroup">
                        @foreach ($discuss->tags() as $discuss)
                            <a href="{{ getTag($discuss)->url() }}">
                                <label class="form-selectgroup-item">
                                    <span class="form-selectgroup-label">{{ getTag($discuss)->title }}</span>
                                </label>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
