<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administration | SAA Switzerland</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administration | Droit Formation">
    <meta name="author" content="Cindy Leschaud | @DesignPond">
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/admin.css');?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/js/vendor/redactor/redactor.css'); ?>">
    <link rel='stylesheet' type='text/css' href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/jquery-ui.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/chosen.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/chosen-bootstrap.css');?>">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <base href="/">

</head>
<body style="padding: 0">

<?php $current_user = (isset(Auth::user()->name) ? Auth::user()->name : ''); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel" style="margin-bottom: 0">
                <div class="panel-body">
                    <a href="{{ url('/') }}"><img height="80px" src="{{ asset('frontend/images/logos/saa.png') }}" alt="SAA logo" /></a>
                </div>
            </div>

            <nav class="navbar navbar-default" id="mainnav">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/')  }}">Saa admin</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (Request::is('admin') ? 'active' : '' ); ?>">
                                <a href="{{ url('admin') }}"><i class="fa fa-file"></i> <span>Files</span></a>
                            </li>
                            <li class="<?php echo (Request::is('admin/acc') ? 'active' : '' ); ?>">
                                <a href="{{ url('admin/acc') }}"><i class="fa fa-file-o"></i> <span>ACC</span></a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-edit"></i> Edit website <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('admin/page') }}">Pages</a></li>
                                    <li><a href="{{ url('admin/team') }}">Team</a></li>
                                    <li><a href="{{ url('admin/alumni') }}">Alumnis</a></li>
                                    <li><a href="{{ url('admin/testimonial') }}">Testimonial</a></li>
                                    <li><a href="{{ url('admin/course') }}">Courses</a></li>
                                    <li><a href="{{ url('admin/module') }}">Modules</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                                    <span class="hidden-xs">&nbsp;{{ $current_user }} &nbsp;<i class="fa fa-caret-down"></i></span>
                                </a>
                                <ul class="dropdown-menu userinfo arrow">
                                    <li class="username">
                                        <a href="#"><div class="pull-right"><h5>Bonjour, {{ $current_user }}!</h5></div></a>
                                    </li>
                                    <li class="userlinks">
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('logout') }}"><i class="pull-right fa  fa-power-off"></i> Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

        </div>
    </div>
    <div class="row">

        <div class="col-md-12">

            <!-- messages and errors -->
            @include('backend.partials.message')

            <!-- Contenu -->
            @yield('content')
            <!-- Fin contenu -->

        </div> <!-- container -->

        <div class="col-md-12" role="contentinfo">
            <div class="clearfix">
                <ul class="list-unstyled list-inline pull-left">
                    <li>Saa Switzerland &copy; <?php echo date('Y'); ?></li>
                </ul>
                <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
            </div>
        </div>

    </div>

</div> <!-- page-container -->

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="<?php echo asset('backend/js/validation/messages_fr.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/vendor/redactor/redactor.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/vendor/redactor/fr.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/vendor/redactor/imagemanager.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/vendor/redactor/filemanager.js');?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/vendor/chosen/chosen.jquery.js');?>"></script>

<script type="text/javascript" src="<?php echo asset('backend/js/admin.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('backend/js/upload.js');?>"></script>

</body>
</html>