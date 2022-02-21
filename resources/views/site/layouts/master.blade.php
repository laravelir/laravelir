@include('site.layouts.header')
<div class="page">
    @include('site.partials.topbar')
    <div class="page-wrapper">
        @include('site.partials.page-header')
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        @include('site.partials.page-footer')
    </div>
</div>

@yield('page-modal')
@include('site.layouts.footer')
