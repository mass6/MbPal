<div class="page-header page-header-bordered">
    @include('flash::message')

    {{-- Breadcrumbs --}}
{{--    @include('layouts.main.breadcrumbs')--}}

    {{-- Page Header --}}
    <h1 class="page-title">@yield('pageHeading', 'MobilityPal')</h1>
    {{--<div class="page-header-actions">--}}
        {{--<button type="button" class="btn btn-sm btn-outline btn-default btn-round">--}}
            {{--<span class="text hidden-xs">Settings</span>--}}
            {{--<i class="icon wb-chevron-right" aria-hidden="true"></i>--}}
        {{--</button>--}}
    {{--</div>--}}
</div>