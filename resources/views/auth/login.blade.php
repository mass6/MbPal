<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MobilityPal">
    <meta name="author" content="">
    <title>Login | MobilityPal</title>
    <link rel="apple-touch-icon" href="/assets/remark/topbar/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/remark/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/remark/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="/assets/remark/topbar/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/assets/remark/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/assets/remark/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="/assets/remark/topbar/assets/examples/css/pages/login-v2.css">
    <!-- Fonts -->
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
    <style>
        .page-login-v2:before {
            background-image: url("/assets/images/sg-team.gif");
        }
        .logo-login {
            margin-bottom: 30px;
        }
        img.brand-img {
            width: 260px;
            margin-left: -18px;
        }
    </style>
</head>
<body class="page-login-v2 layout-full page-dark">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
        <div class="page-brand-info">
            <div class="brand">
                {{--<img class="brand-img" src="/assets/images/mobilitypal-logo-white.png" alt="MobilityPal">--}}
                {{--<h2 class="brand-text font-size-40">MobilityPal</h2>--}}
            </div>
            {{--<p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                {{--tempor incididunt ut labore et dolore magna aliqua.</p>--}}
        </div>
        <div class="page-login-main">
            <div class="brand visible-xs">
                {{--<img class="brand-img" src="/assets/images/mobilitypal-logo.png" width="110" alt="MobilityPal">--}}
                {{--<h3 class="brand-text font-size-40">MobilityPal</h3>--}}
            </div>
            <div class="logo-login">
                <img class="brand-img" src="/assets/images/mobilitypal-logo.png" alt="MobilityPal">
            </div>
            <h3 class="font-size-24">Sign In</h3>
            <p>Please sign in to access the system.</p>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="sr-only" for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="sr-only" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password"
                           placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="inputCheckbox">Remember me</label>
                    </div>
                    <a class="pull-right" href="{{ url('/password/reset') }}">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </form>

            <footer class="page-copyright">
                <p>© 2016 Schulze + Grassov. All RIGHT RESERVED.</p>
            </footer>
        </div>
    </div>
</div>
<!-- End Page -->
<!-- Core  -->
<script src="/assets/remark/global/vendor/jquery/jquery.js"></script>
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
<script src="/assets/remark/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
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
<script src="/assets/remark/global/js/components/jquery-placeholder.js"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>