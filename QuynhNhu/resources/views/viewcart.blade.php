@extends('master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Cart</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li class="active">View Cart</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="shopping-cart spad">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12" id="list-cart">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="cart-table">
                    <form action="/update-cart" method="POST">
                        {{ csrf_field() }}
                        @if(Session::get('cart') == true)
                            <table style="width:100%">
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name" style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Quality</th>
                                    <th style="text-align: center;">Total</th>
                                    <!-- <th style="text-align: center;">Save</th> -->
                                    <th style="text-align: center;">Delete</th>
                                </tr>
                                <?php
                                    $total = 0;
                                    $totalQty = 0;
                                ?>
                                @foreach(Session::get('cart') as $key => $cart)
                                <?php
                                        $subTotal = $cart['product_price']*$cart['product_qty'];
                                        $total += $subTotal;
                                        $totalQty += $cart['product_qty'];
                                    ?>
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{ asset('./img/'.$cart['product_image']) }}"
                                            style="width: 30%;" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{ $cart['product_name'] }}</h5>
                                    </td>
                                    <td class="p-price first-row">{{ number_format($cart['product_price']) }} VND</td>
                                    <td class="qua-col first-row">
                                        <div class="quatity">
                                            <div class="pro-qty">
                                                <input name="cart_qty[{{ $cart['session_id'] }}]" aria-label="quantity"
                                                    class="input-qty" type="number" value="{{ $cart['product_qty'] }}"
                                                    min="1" style="width: 50%;">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{ number_format($subTotal) }} VND</td>
                                    <!-- <td class="close-td first-row">
                                        <i class="fa fa-floppy-o"></i>
                                    </td> -->
                                    <td class="close-td first-row">
                                        <a href="/delete-product/{{ $cart['session_id'] }}">
                                            <i class="fa fa-window-close-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <input type="submit" value="Update Cart" name="update_qty" class="btn btn-default">
                                    </td>
                                </tr>
                            </table>
                        @else
                        <h2 style="text-align : center;color: #D10024;">Hiện không có sản phẩm trong giỏ hàng</h2>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="procced-checkout" style="margin-left: 820px;margin-top: 40px;margin-bottom: 65px;">
                @if(Session::get('cart') == true)
                    <ul>
                        <h4>
                            <li class="subtotal">Total Quantity: <span>{{ number_format($totalQty) }}</span></li>
                        </h4>
                        <h4>
                            <li class="cart-total">
                                <span>
                                    <div>Total Price: {{ number_format($total) }} VND</div>
                                </span>
                            </li>
                        </h4>
                    </ul>
                    <h4><a href="/checkout" class="procced-btn">PROCCED TO CHECK OUT</a></h4>
                @endif
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
