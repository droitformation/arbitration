<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Swiss Arbitration Academy SAA | Contact</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Swiss Arbitration Academy SAA , Post-Graduate Course of the Universities of Lucerne and Neuchâtel and course in  international arbitration">
    <meta name="author" content="Cindy Leschaud | @DesignPond">
    <meta name="token" content="<?php echo csrf_token(); ?>">

    <!--[if lt IE 9]>
    <script src="http://cas-arbitration.ch/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/font/stylesheet.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/normalize.min.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/foundation.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/jquery.mCustomScrollbar.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/smoothness/jquery-ui-1.10.1.custom.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/main.css');?>" media="screen" />

    <base href="/">

</head>
<body>
    @include('partials.header')

    <div id="main" class="row">

        <!-- Contenu -->
        @yield('content')
        <!-- Fin contenu -->

    </div>
    <footer class="row">
        <div class="eleven columns">
            <p><a href="{{ url('legal') }}">Legal Structure</a>  |  2013  © Swiss Arbitration Academy SAA</p>
        </div>
        <div class="one columns">
            <p style="text-align:right;">
                <a style="text-decoration:underline;" href="{{ url('archives') }}">Archives</a>
            </p>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.js"></script>
    <script src="<?php echo asset('frontend/js/vendor/jquery.mCustomScrollbar.min.js');?>"></script>
    <script src="<?php echo asset('frontend/js/vendor/jquery-ui-1.10.1.custom.min.js');?>"></script>
    <script src="<?php echo asset('frontend/js/jquery.dropdown.js');?>"></script>
    <script src="<?php echo asset('frontend/js/vendor/modernizr-2.6.2.min.js');?>"></script>
    <script src="<?php echo asset('frontend/js/main.js');?>"></script>
</body>
</html>
