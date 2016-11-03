<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MobilityPal">
    <meta name="author" content="">
    <title>Registration Complete | MobilityPal</title>
    <link rel="apple-touch-icon" href="/assets/remark/topbar/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/remark/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/remark/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="/assets/remark/topbar/assets/css/site.min.css">
    <link rel="stylesheet" href="/assets/remark/topbar/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/assets/remark/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/webui-popover/webui-popover.css">
    <link rel="stylesheet" href="/assets/remark/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/jquery-wizard/jquery-wizard.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/formvalidation/formValidation.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/jquery-labelauty/jquery-labelauty.css">

    <link rel="stylesheet" href="/assets/remark/topbar/assets/css/topbar-custom.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="/assets/remark/global/fonts/mfglabs/mfglabs.css">
    <link rel="stylesheet" href="/assets/remark/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="/assets/remark/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="/assets/remark/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="/assets/remark/global/vendor/media-match/media.match.min.js"></script>
    <script src="/assets/remark/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="/assets/remark/global/vendor/modernizr/modernizr.js"></script>
    <script src="/assets/remark/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="site-navbar-small ">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega"
     role="navigation">
    <div class="navbar-header">
        {{--<button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"--}}
                {{--data-toggle="menubar">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="hamburger-bar"></span>--}}
        {{--</button>--}}
        {{--<button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"--}}
                {{--data-toggle="collapse">--}}
            {{--<i class="icon wb-more-horizontal" aria-hidden="true"></i>--}}
        {{--</button>--}}
        <a class="navbar-brand navbar-brand-center" href="/moves/register">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="/assets/images/mobilitypal-logo.png"
                 title="MobilityPal">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="/assets/images/mobilitypal-logo.png"
                 title="MobilityPal">
        </a>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        {{--<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">--}}
            {{--<!-- Navbar Toolbar -->--}}
            {{--<ul class="nav navbar-toolbar">--}}
                {{--<li class="hidden-float" id="toggleMenubar">--}}
                    {{--<a data-toggle="menubar" href="#" role="button">--}}
                        {{--<i class="icon hamburger hamburger-arrow-left">--}}
                            {{--<span class="sr-only">Toggle menubar</span>--}}
                            {{--<span class="hamburger-bar"></span>--}}
                        {{--</i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<!-- End Navbar Toolbar -->--}}
        {{--</div>--}}
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>

<!-- Page -->
@include('flash::message')
<div class="page animsition">
    <div id="app" class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel" id="wizard-wrapper">
                    <div class="panel-heading">
                        <h2 class="panel-title">Register for MobilityPal</h2>
                    </div>
                    <div class="panel-body">
                        <!-- Panel Wizard Forms -->
                        @include('moves.iphone-wizard', ['authUrl' => ''])
                        @include('moves.android-wizard', ['authUrl' => ''])
                        <!-- End Panel Wizard One Forms -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2016 <a href="http://schulzeplusgrassov.com">Schulze + Grassov</a></div>
    <div class="site-footer-right">

    </div>
</footer>
<!-- Core  -->
<script src="/assets/remark/global/vendor/jquery/jquery.js"></script>
<script src="/assets/remark/global/vendor/vue/vue.js"></script>
<script src="/assets/remark/global/vendor/bootstrap/bootstrap.js"></script>
<script src="/assets/remark/global/vendor/animsition/animsition.js"></script>
<script src="/assets/remark/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="/assets/remark/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="/assets/remark/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="/assets/remark/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<!-- Plugins -->
<script src="/assets/remark/global/vendor/switchery/switchery.min.js"></script>
<script src="/assets/remark/global/vendor/intro-js/intro.js"></script>
<script src="/assets/remark/global/vendor/screenfull/screenfull.js"></script>
<script src="/assets/remark/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="/assets/remark/global/vendor/formvalidation/formValidation.js"></script>
<script src="/assets/remark/global/vendor/formvalidation/framework/bootstrap.js"></script>
<script src="/assets/remark/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
<script src="/assets/remark/global/vendor/jquery-labelauty/jquery-labelauty.js"></script>
<script src="/assets/remark/global/vendor/webui-popover/jquery.webui-popover.min.js"></script>
<script src="/assets/remark/global/vendor/jquery-wizard/jquery-wizard.js"></script>
<!-- Scripts -->
<script src="/assets/remark/global/js/core.js"></script>
<script src="/assets/remark/topbar/assets/js/site.js"></script>
<script src="/assets/remark/topbar/assets/js/sections/menu.js"></script>
<script src="/assets/remark/topbar/assets/js/sections/menubar.js"></script>
<script src="/assets/remark/topbar/assets/js/sections/sidebar.js"></script>
<script src="/assets/remark/global/js/configs/config-colors.js"></script>
<script src="/assets/remark/topbar/assets/js/configs/config-tour.js"></script>
<script src="/assets/remark/global/js/components/asscrollable.js"></script>
<script src="/assets/remark/global/js/components/animsition.js"></script>
<script src="/assets/remark/global/js/components/slidepanel.js"></script>
<script src="/assets/remark/global/js/components/switchery.js"></script>
<script src="/assets/remark/global/js/components/jquery-wizard.js"></script>
<script src="/assets/remark/global/js/components/matchheight.js"></script>
<script src="/assets/remark/global/js/components/jquery-labelauty.js"></script>
<script src="/assets/remark/global/js/components/webui-popover.js"></script>
<script src="/assets/remark/topbar/assets/examples/js/forms/moves-wizard.js"></script>

<script>
    $('document').ready(function() {
        $('.wizard-buttons a:first').hide();
        $('.step').each(function(i, el){
            $(el).addClass('done');
        });
        wizard.steps.forEach(function(step){
            step.states.done = true;
            step.states.disabled = true;
        });
        wizard.goTo(2);
        wizard.finish();
    });
</script>

</body>
</html>