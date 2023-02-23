<!DOCTYPE html>
<html>

<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>Login|Regsiter</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/less/theme.min_2.css">

    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms_2.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon_2.png">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min_2.css">

    <!-- IE8 HTML5 support -->
</head>

<body class="utility-page sb-l-c sb-r-c">

<!-- Body Wrap -->
<div id="main" class="animated fadeIn">

    <!-- Main Wrapper -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Content -->
        <section id="content">

            <!-- Login Form -->
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="bg-primary mw600 text-center mb20 br3 pt15 pb10">
                    <img src="assets/img/logo_2.png" alt=""/>
                </div>
                <div class="panel mw320">

                    <form method="post" action="{{ route('login') }}" id="form-login">
                        @csrf
                        <div class="panel-body pn mv10">

                            <div class="section">
                                <label for="email" class="field prepend-icon">
                                    <input type="text" name="email" id="email" class="gui-input"
                                           placeholder="Email or Username">
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- /section -->

                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="text" name="password" id="password" class="gui-input"
                                           placeholder="Password">
                                    <span class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </label>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- /section -->

                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>
                            <!-- /section -->

                        </div>
                        <!-- /Form -->
                    </form>
                </div>
                <!-- /Panel -->
            </div>
            <!-- /Spec Form -->

        </section>
        <!-- /Content -->

    </section>
    <!-- /Main Wrapper -->

</div>
<!-- /Body Wrap  -->

<!-- Scripts -->

<!-- jQuery -->
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- CanvasBG JS -->
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>

<!-- Theme Scripts -->
<!-- <script src="assets/js/utility/utility.js"></script> -->
<script src="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>

<!-- Page JS -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });

    });
</script>

<!-- /Scripts -->

</body>

</html>

