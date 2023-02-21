<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/c3charts/c3.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">

    <!-- CSS - theme -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/less/theme.min.css">

    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body class="dashboard-page with-customizer">
    <!-- Body Wrap  -->
    <div id="main">
        <!-- Header  -->
        @include('layouts.partials.header')
        <!-- /Header  -->
        <!-- Sidebar  -->
        @include('layouts.partials.sidebar')
        <!-- /Sidebar  -->
         <!-- Main Wrapper -->
        <section id="content_wrapper">
            <!-- Topbar -->
            <header id="topbar" class="alt">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="index.html">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-current-item">Dashboard</li>
                    </ol>
                </div>
            </header>
            <!-- /Topbar -->
            <!-- Content -->
            <section id="content" class="table-layout animated fadeIn">
                @yield('content')
            </section>
             <!-- /Content -->
            <!-- Page Footer -->
            <footer id="content-footer">
                <div class="row">
                    <div class="col-md-6">
                        <span class="footer-legal">Copyright © 2016. All rights reserved. <a href="#">Therms of use</a> | <a href="#">Privacy Policy</a></span>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="footer-meta"></span>
                        <a href="#content" class="footer-return-top">
                            <span class="fa fa-angle-up"></span>
                        </a>
                    </div>
                </div>
            </footer>
            <!-- /Page Footer -->
        </section>
    </div>
    <!-- /Body Wrap  -->

    <!-- Scripts -->

    <!-- jQuery -->
    <script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- <script src="assets/js/utility/fullscreen/jquery.fullscreen.js"></script> -->

    <!-- HighCharts Plugin -->
    <script src="assets/js/plugins/highcharts/highcharts.js"></script>
    <script src="assets/js/plugins/c3charts/d3.min.js"></script>
    <script src="assets/js/plugins/c3charts/c3.min.js"></script>

    <!-- Simple Circles Plugin -->
    <script src="assets/js/plugins/circles/circles.js"></script>

    <!-- Maps JSs -->
    <script src="assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

    <!-- FullCalendar Plugin -->
    <script src="assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
    <script src="assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- Date/Month - Pickers -->
    <script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
    <script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

    <!-- Magnific Popup Plugin -->
    <script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>

    <!-- Theme Scripts -->
    <script src="assets/js/utility/utility.js"></script>
    <script src="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/demo/demo.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Widget JS -->
    <script src="assets/js/demo/widgets.js"></script>
    <script src="assets/js/demo/widgets_sidebar.js"></script>
    <script src="assets/js/pages/dashboard1.js"></script>
    <!-- /Scripts -->
</body>
</html>
