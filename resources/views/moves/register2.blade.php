<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Page Description">
        <meta name="author" content="sam">
        <title>Register For Moves</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .badges {
                position: absolute;
                left: 0px;
                top: 82%;
                width: 374px;
            }
            .appstore-badge {
                width: 190px;
                height: 57px;
            }
            .android-badge {
                width: 168px;
                height: 57px;
                margin-left: 8px;
                float: right;
            }
            #header-bg-img {
                position: absolute;
                left: 500px;
                top: 53px;
            }
        </style>
    </head>
    <body>

        <h1>Participate in Moves</h1>

        <div class="badges">
            <a id="app-download-header-badge-iphone" href="http://appstore.com/moves" target="_blank"><img class="appstore-badge" src="/images/app-store-badge-big.png" width="190" height="57"></a>
            <a id="app-download-header-badge-android" href="https://play.google.com/store/apps/details?id=com.protogeo.moves" target="_blank"><img class="android-badge" src="/images/google-play-badge-big.png" width="168" height="57"></a>
        </div>
        <img id="header-bg-img" src="/images/moves-on-iphone5s.jpg" width="301" height="637">
        <br/><br/>

        <ol>
            <li>Download the app</li>
            <li>
                Authorize Mobility Pal<br/>
                <a href="{{{ $authUrl }}}">Click here</a> to get the authorization code:
            </li>
        </ol>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
