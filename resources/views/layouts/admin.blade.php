<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin-assets/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('admin-assets/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin-assets/css/startmin.css') }}" rel="stylesheet">

    <link href="{{ asset('admin-assets/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
<!-- <link href="{{ asset('admin-assets/css/morris.css" rel="stylesheet"> -->

        <!-- Custom Fonts -->
        <link href="<?= asset('admin-assets/css/font-awesome.min.css') ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= asset('admin-assets/css/add.css').'?v='.date('i') ?>"/>
    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/admin">ADMIN</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="/" target="_blank"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>
                            //{{ Auth::user()->username }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
    </form>
</li>
</ul>
</li>
</ul>
<ul class="nav navbar-nav pull-right desLangs">
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <li <?= $localeCode==\App::getLocale()?"class='active'":''; ?>>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
        </a>
    </li>
@endforeach
    </ul>
<!-- /.navbar-top-links -->

    @include('admin.navBar')
    </nav>

    <div id="page-wrapper">
        @if (Session::has('success'))
            <br>
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('message'))
            <br>
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
            <br>
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @yield('content')
    </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin-assets/js/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('admin-assets/js/raphael.min.js') }}"></script>
<!-- <script src="{{ asset('admin-assets/js/morris.min.js') }}"></script> -->
<!-- <script src="{{ asset('admin-assets/js/morris-data.js') }}"></script> -->

    <script src="{{ asset('admin-assets/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-assets/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('admin-assets/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/datepicker/locales/bootstrap-datepicker.ru.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery.number.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin-assets/js/startmin.js') }}"></script>
    <script src="<?= asset('admin-assets/js/add.js').'?v='.date('i') ?>"></script>

    </body>
</html>
