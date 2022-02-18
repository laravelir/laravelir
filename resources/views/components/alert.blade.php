<div>
    <style>
        .text-subtitle-important {
            color: #fefe !important;
        }

    </style>
    <div class="alert alert-{{ $level }} @if ($type == 'important') alert-important @endif alert-dismissible"
        role="alert">
        <div class="d-flex">
            <div>
                @switch($level)
                    @case('success')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    @break
                    @case('info')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                            <polyline points="11 12 12 12 12 16 13 16" />
                        </svg>
                    @break
                    @case('warning')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path
                                d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                    @break
                    @case('danger')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                    @break

                    @default
                @endswitch

            </div>
            <div>
                <h4 class="alert-title @if ($type == 'important') text-white @endif">{{ $message }}</h4>
                <div class="text-muted @if ($type == 'important') text-subtitle-important @endif">
                    {{ $subtitle }}</div>
            </div>
        </div>
        <a class="btn-close @if ($type == 'important') btn-close-white @endif" data-bs-dismiss="alert"
            aria-label="close"></a>
    </div>
</div>
