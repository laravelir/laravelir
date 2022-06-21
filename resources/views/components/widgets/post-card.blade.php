<div>
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <a href="{{ $post->url() }}" class="d-block"><img src="{{ $post->thumbnail }}"
                    class="card-img-top"></a>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        {{-- <a href="{{ $post->url() }}"><span class="avatar me-3 rounded"
                                style="background-image: url({{ $post->thumbnail }})"></span></a> --}}
                        <div>
                            <div><a href="{{ $post->url() }}" class="text-reset">{{ $post->title }}</a></div>
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-eye" width="20" height="20"
                                        viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                    <span class="text-muted"
                                        style="font-size: .7rem !important;">{{ $post->view_count }}</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-message-2" width="16"
                                        height="16" viewBox="0 0 24 24" stroke-width="2" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" />
                                        <line x1="8" y1="9" x2="16" y2="9" />
                                        <line x1="8" y1="13" x2="14" y2="13" />
                                    </svg>
                                    <span class="text-muted"
                                        style="font-size: .7rem !important;">{{ $post->view_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex  flex-column">
                        <div class="badge badge-outline bg-lime-lt mb-1"
                            style="font-size: .7rem !important;">{{ $post->type() }}</div>
                        <div class="text-muted" style="font-size: .7rem !important;">زمان مطالعه: {{ readTime($post->body) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
