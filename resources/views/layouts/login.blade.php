<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin-assets/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('admin-assets/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('admin-assets/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?= asset('css/add.css').'?v='.date('i') ?>"/>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <!-- jQuery -->
        <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin-assets/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin-assets/js/startmin.js') }}"></script>

        <script src="<?= asset('js/add.js').'?v='.date('i') ?>"></script>

    </body>
</html>
