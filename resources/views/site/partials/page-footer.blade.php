<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="{{ route('site.index') }}" class="link-secondary">مستندات</a>
                    </li>
                    <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a>
                    </li>
                    <li class="list-inline-item"><a href="https://github.com/laravelir/laravelir" target="_blank"
                            class="link-secondary" rel="noopener">شرایط استفاده</a></li>
                    <li class="list-inline-item">
                        <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary"
                            rel="noopener">
                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                            حامیان
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        کپی رایت &copy; 2022 - {{ now()->year }}
                        <a href="." class="link-secondary">Laravelir</a>.
                        همه حقوق محفوط است.
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('site.changelog') }}" class="link-secondary"
                            rel="noopener">
                            v1.0.0
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
