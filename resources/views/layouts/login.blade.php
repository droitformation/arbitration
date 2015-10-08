<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administration | SAA Switzerland</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administration | SAA Switzerland">
    <meta name="author" content="Cindy Leschaud | @DesignPond">
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/styles.css?=121');?>">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    <style type="text/css">
        .navbar.navbar-default.navbar-login{
            margin-bottom:40px;
        }
        .navbar-login a{
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body style="padding: 0">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Credentials dont match<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel" style="margin-bottom: 0">
                    <div class="panel-body">
                        <a href="{{ url('/') }}"><img height="80px" src="{{ asset('frontend/images/logos/saa.png') }}" alt="SAA logo" /></a>
                    </div>
                </div>

                <nav class="navbar navbar-default navbar-login">
                    <div class="container-fluid">
                        <a href="{{ url('/') }}">Back to website</a>
                    </div>
                </nav>

                <!-- Contenu -->
                @yield('content')
                <!-- Fin contenu -->

            </div>
        </div>
    </div>

</body>
</html>