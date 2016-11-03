<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Register | MobilityPal</title>

    <!--Core CSS -->
    <link href="/assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/css/jquery.steps.css">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet" />
    <link href="/assets/css/blue-theme.css" rel="stylesheet" />

    <link href="/assets/css/custom.css" rel="stylesheet" />


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">

            <a href="index.html" class="logo">
                <img src="/assets/images/sg-logo.png" alt="">
            </a>
            <!-- <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div> -->
        </div>
        <!--logo end-->

        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="">

                </li>
                <li id="header_inbox_bar" class="dropdown">

                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>

                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">

                </li>
                <!-- user login dropdown end -->
                <li>

                </li>
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="merge-left">
        <section class="wrapper">
            <!-- page start-->

            <div class="row">
                <div class="col-sm-12">

                    <section class="panel">
                        <header class="panel-heading">
                            Register for MobilityPal
                        </header>
                        <div class="panel-body">
                            <div id="wizard">

                                <h2>Step 1.</h2>
                                <section>
                                    <div class="well step-heading">
                                        <h2 class="step-instructions">Download the <strong>Moves</strong> app</h2>
                                    </div>
                                    <img id="moves-logo" src="/images/moves-logo.png" width="103" >
                                    <img id="header-bg-img" src="/images/moves-on-iphone5s.jpg" width="201" >
                                    <div class="badges">
                                        <a id="app-download-header-badge-iphone" href="http://appstore.com/moves" target="_blank"><img class="appstore-badge" src="/images/app-store-badge-big.png" width="190" height="57"></a>
                                        <a id="app-download-header-badge-android" href="https://play.google.com/store/apps/details?id=com.protogeo.moves" target="_blank"><img class="android-badge" src="/images/google-play-badge-big.png" width="168" height="57"></a>
                                    </div>
                                </section>

                                <h2>Step 2.</h2>
                                <section>
                                    <div class="well step-heading">
                                        <h2 class="step-instructions">Get a <strong>Moves</strong> Access Pin</h2>
                                    </div>
                                    <p class="wizard-body"><a href="{{{ $authUrl }}}" target="_blank">Click here</a> to get an access pin to authorize <strong>MobilityPal</strong>.
                                        <blockquote><em>Note: You will need this pin to complete the next step!</em></blockquote>
                                    <div>
                                        <a href="{{{ $authUrl }}}" target="_blank"><img src="/images/moves-access-pin-example.png" width="300"></a>
                                    </div>
                                    <p id="access-token-btn" class="wizard-text"><a href="{{{ $authUrl }}}" target="_blank" class="btn btn-info btn-lg">Get an Access Pin</a></p>
                                </section>

                                <h2>Step 3.</h2>
                                <section>
                                    <div class="well step-heading">
                                        <h2 class="step-instructions">Connect <strong>MobilityPal</strong></h2>
                                    </div>
                                    <div class="mv-40">
                                        <p class="wizard-body"><strong>2a.</strong> Open the Moves app, and select <strong>"Connected Apps"</strong> from the menu.</p>
                                        <div class="mv-20">
                                            <img class="phone" src="/images/moves-app-ios-menu.png" width="200" style="margin-right: 6px;">
                                            <img class="phone" src="/images/moves-connected-apps-ios.png" width="200">
                                        </div>
                                    </div>
                                    <div class="mv-40">
                                        <p class="wizard-body"><strong>2b.</strong> Enter the <strong>pin code</strong> you received in the previous step, then click <strong>OK</strong>.</p>
                                        <div class="mv-20">
                                            <img class="phone" src="/images/moves-enter-pin.png" width="200">
                                        </div>
                                    </div>
                                    <div class="mv-40">
                                        <p class="wizard-body"><strong>2c.</strong> Click <strong>OK</strong> to allow the MobiilityPal to access your <strong>Moves</strong> data.</p>
                                        <div class="mv-20">
                                            <img class="phone" src="/images/moves-allow-app.png" width="200">
                                        </div>
                                    </div>
                                </section>

                                <h2>Step 4.</h2>
                                <section>
                                    <div class="well step-heading">
                                        <h2 class="step-instructions">Registration Complete!</h2>
                                    </div>
                                    <p class="wizard-body mv-20"><strong>Congratulations</strong>, and thank you for participating!</p>
                                    <p class="wizard-body">You are now connected to MobilityPal. You can discontinue participation at any time
                                        by revoking access to MobilityPal within the Moves app.</p>
                                </section>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->


</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>
<script src="/assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>

<script src="/assets/js/jquery-steps/jquery.steps.js"></script>


<!--common script init for all pages-->
<script src="/assets/js/scripts.js"></script>

<script>
    $(function ()
    {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            enableFinishButton: false,
            titleTemplate: '<span class="number"></span> #title#'
        });
    });


</script>

</body>
</html>
