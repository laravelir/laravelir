<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    <ol class="breadcrumb" aria-label="breadcrumbs">
                        <li class="breadcrumb-item"><a href="{{ route('site.index') }}">خانه</a></li>
                        @yield('breadcrumb')
                    </ol>
                </div>
                <div class="page-title my-3">
                    @yield('page-title')
                </div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    @yield('btn-list')
                </div>
            </div>
        </div>
    </div>
</div>
