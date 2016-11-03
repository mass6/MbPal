<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="/assets/remark/mmenu/assets/images/logo.png" title="Remark">
            <span class="navbar-brand-text hidden-xs"> Remark</span>
        </div>
        {{--<button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"--}}
        {{--data-toggle="collapse">--}}
        {{--<span class="sr-only">Toggle Search</span>--}}
        {{--<i class="icon wb-search" aria-hidden="true"></i>--}}
        {{--</button>--}}
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                {{--<li class="hidden-float">--}}
                {{--<a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"--}}
                {{--role="button">--}}
                {{--<span class="sr-only">Toggle Search</span>--}}
                {{--</a>--}}
                {{--</li>--}}

                @include('layouts.main._mega-menu')

            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            @include('layouts.main._navbar-toolbar-right')
                    <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        {{--<div class="collapse navbar-search-overlap" id="site-navbar-search">--}}
        {{--<form role="search">--}}
        {{--<div class="form-group">--}}
        {{--<div class="input-search">--}}
        {{--<i class="input-search-icon wb-search" aria-hidden="true"></i>--}}
        {{--<input type="text" class="form-control" name="site-search" placeholder="Search...">--}}
        {{--<button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"--}}
        {{--data-toggle="collapse" aria-label="Close"></button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
                <!-- End Site Navbar Seach -->
    </div>
</nav>