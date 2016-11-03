<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
@include('layouts.main.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

{{-- Links --}}
@include('layouts.main.navbar')
@include('layouts.main.site-menubar')
@include('layouts.main.site-gridmenu')

<!-- Page -->
<div class="page animsition">
    {{-- Page Header--}}
    @include('layouts.main.page-header')
    {{-- Page Content--}}
    <div class="page-content">
        @yield('content')
    </div>
</div>
<!-- End Page -->

<!-- Footer -->
@include('layouts.main.footer')
<!-- Core  -->
@include('layouts.main.core-scripts')
<!-- Plugins -->
@include('layouts.main.plugin-scripts')
<!-- Page Scripts -->
@include('layouts.main.page-scripts')
<!-- Init Scripts -->
@include('layouts.main.init-script')

</body>
</html>