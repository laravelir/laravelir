@include('webmaster.layouts.header')

<div class="page">
    @include('webmaster.partials.sidebar')
    @include('webmaster.partials.topbar')
    <div class="page-wrapper">
        @include('webmaster.partials.page-header')
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        @include('webmaster.partials.page-footer')
    </div>
</div>


@include('webmaster.layouts.footer')
