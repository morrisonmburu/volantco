<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/gif/jpg" href="/images/logo.jpg">
    <title>Volant | Co</title>

    <!-- Global stylesheets -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  url('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ url('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ url('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ url('global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ url('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script src="{{ url('assets/js/app.js') }}"></script>
    <script src="{{ url('global_assets/js/demo_pages/login_validation.js') }}"></script>
    <!-- /theme JS files -->
</head>
<body>
<body class="login-container login-cover">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content d-flex justify-content-center align-items-center">
                    @yield('content')
                </div>

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

</body>
</html>

