<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css')}}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/sweetalert.css')}}" />

    <link href="{{ asset('js/app.js') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">

    <!-- <link href="{{ asset('js/sweetalert.min.js') }}" rel="stylesheet"> -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    <li>
                        <a href="/loginUser" name="username"><i class="fa fa-user-o"></i>
                            <?php
                                $name = Session::get('username');
                                if($name){
                                    echo $name;
                                    echo '<li><a href="/logout"><i class="fa fa-sign-in"></i> Log out</a></li>';
                                }
                                else{
                                    echo 'My Account';
                                }
                            ?>
                        </a>
                    </li>
                    <!-- <li><a href="/loginUser" name="username"><i class="fa fa-user-o"></i> My Account</a></li> -->

                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="get" action="/searchProduct">
                            {{ csrf_field() }}
                                <select class="input-select">
                                    <option value="0">All Products</option>
                                </select>
                                <input class="input" name="key" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <a href="/gio-hang">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                    </a>
                                </a>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <a href="/history">
                                        <i class="fa fa-history"></i>
                                        <span>Cart History</span>
                                    </a>
                                </a>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    @foreach($type_product as $key => $type)
                    <li><a href="/danh-muc-san-pham/{{ $type->id }}">{{ $type->type_name }}</a></li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    @yield('content')


    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->


        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/slick.min.js')}}"></script>
    <script src="{{ asset('js/nouislider.min.js')}}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/simple.money.format.js')}}"></script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            load_comment();
            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url("/load-comment") }}',
                    method: 'POST',
                    data: {product_id:product_id,_token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
                });
            }
            $('.send-comment').click(function(){
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url("/send-comment") }}',
                    method: 'POST',
                    data: {product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                    success:function(data){
                        $('#notify_comment').html('<p class="text text-success">Thêm bình luận thành công!</p>');
                        load_comment();
                        $('#notify_comment').fadeOut(2000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart-btn').click(function(){
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ url("/add-cart-ajax") }}',
                    method: 'POST',
                    data: {cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_price:cart_product_price,
                        cart_product_image:cart_product_image,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(data){
                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                            },
                            function() {
                            window.location.href = "{{ url('/gio-hang') }}";
                        });
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        function remove_background(product_id){
            for(var count = 1; count <= 5; count++){
                $('#' + product_id + '-' + count).css('color','#ccc');
            }
        }

        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');

            remove_background(product_id);

            for(var count = 1; count<=index; count++){
                $('#' + product_id + '-' + count).css('color','#D10024');
            }
        });

        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');
            var rating = $(this).data("rating");

            remove_background(product_id);

            for(var count = 1; count<=index; count++){
                $('#' + product_id + '-' + count).css('color','#D10024');
            }
        });

        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url("/insert-rating") }}',
                method: 'POST',
                data: {index:index,product_id:product_id,_token:_token},
                success:function(data){
                    if(data == 'done'){
                        alert("Bạn đã đánh giá "+index+" trên 5 sao!");
                    }else{
                        alert("Lỗi đánh giá!");
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $( "#slider-range" ).slider({
            orientation: "horizontal",
            range: true,
            min: {{ 10000 }},
            max: {{ 100000000 }},
            step: 1000000,
            values: [ {{ 300000 }}, {{ 80000000 }} ],

            slide: function( event, ui ) {
                $( "#amount_start" ).val(ui.values[0]+' Đ ').simpleMoneyFormat();
                $( "#amount_end" ).val(ui.values[1]+' Đ ').simpleMoneyFormat();

                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
            }
            });
            $( "#amount_start" ).val($( "#slider-range" ).slider("values",0)+' Đ ').simpleMoneyFormat();
            $( "#amount_end" ).val($( "#slider-range" ).slider("values",1)+' Đ ').simpleMoneyFormat();
        });
    </script>
</body>
</html>
