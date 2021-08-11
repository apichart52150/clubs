<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Minton - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/addvideo/images/favicon.ico') }}">

        <link href="{{ asset('public/addvideo/libs/footable/footable.core.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('public/addvideo/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        <!-- Plugins css-->
        <link href="{{ asset('public/addvideo/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/addvideo/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/addvideo/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/addvideo/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- App css -->
        <link href="{{ asset('public/addvideo/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/addvideo/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/addvideo/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    

        <!-- Vendor js -->
        <script src="{{ asset('public/addvideo/js/vendor.min.js') }}"></script>

        <!-- Footable js -->
        <script src="{{ asset('public/addvideo/libs/footable/footable.all.min.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('public/addvideo/libs/custombox/custombox.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('public/addvideo/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('public/addvideo/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ asset('public/addvideo/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('public/addvideo/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('public/addvideo/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Init js -->
        <script src="{{ asset('public/addvideo/js/pages/foo-tables.init.js') }}"></script>
        
        <!-- Init js-->
        <script src="{{ asset('public/addvideo/js/pages/form-pickers.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('public/addvideo/js/app.min.js') }}"></script>

        
        
    </body>
</html>