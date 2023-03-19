<!doctype html>
<html lang="en" data-topbar-color="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="myAdmin - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
     <!-- third party css -->
     <link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />



     <!-- third party css end -->
    <!-- Plugins css -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="/assets/js/head.js"></script>

    <!-- Bootstrap css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
   
</head>
<body>
    <!-- Body Wrap  -->
    <div id="wrapper">
        <!-- ========== Menu ========== -->
        @include('layouts.partials.sidebar')
        <!-- ========== Left menu End ========== -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- ========== Topbar Start ========== -->
            @include('layouts.partials.header')
            <!-- ========== Topbar End ========== -->
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Page Footer -->
            @include('layouts.partials.footer')
        <!-- /Page Footer -->
    </div>
    <!-- /Body Wrap  -->
    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <script src="/assets/js/jquery.js"></script>
    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>

    <!-- Plugins js-->
    <script src="/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- third party js -->
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <!-- third party js ends -->
    <!-- Dashboar 1 init js-->
    <script src="/assets/js/pages/dashboard-1.init.js"></script>
    <script src="/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/libs/select2/js/select2.min.js"></script>
    <script src="/assets/js/datepicker-custom.js"></script>
    <script src="/assets/js/custom.js"></script>
    <!-- /Scripts -->
    @include('layouts.partials.alerts')
    @stack('scripts')
</body>
</html>
