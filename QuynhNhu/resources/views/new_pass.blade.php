<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/css/style-responsive.css')}}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/css/font.css')}}" type="text/css" />
    <link href="{{ asset('public/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{ asset('public/js/jquery2.0.3.min.js')}}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <h2>New Password</h2>
            <?php
                $token = $_GET['token'];
                $email = $_GET['email'];
            ?>
            <form action="/reset-new-pass" method="post">
            @csrf
                <input type="hidden" class="ggg" name="email" value="{{ $email }}">
                <input type="hidden" class="ggg" name="token" value="{{ $token }}">
                <input type="text" class="ggg" name="password_account" placeholder="PASSWORD" required="">
                <div class="clearfix"></div>

                <input type="submit" value="Send">
            </form>
        </div>
    </div>
    <script src="{{ asset('public/js/bootstrap.js')}}"></script>
    <script src="{{ asset('public/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('public/js/scripts.js')}}"></script>
    <script src="{{ asset('public/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('public/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('public/js/jquery.scrollTo.js')}}"></script>
</body>

</html>
