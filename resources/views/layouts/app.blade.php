<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Volant | Courier</title>

    <link href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/pages/login_validation.js')}}"></script>
</head>
<body>
<body class="login-container login-cover">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content pb-20">
                    @yield('content')
                </div>

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>

