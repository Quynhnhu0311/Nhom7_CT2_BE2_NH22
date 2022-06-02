@extends('master')
@section('content')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Detail Cart</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="/history">View Cart</a></li>
                    <li class="active">Info</li>
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
                <div class="cart-table" style="border: inset;">
                    <table style="width:100%">
                        <h3>Buyer Info</h3>
                        <tr>
                            <th class="p-name" style="text-align: center;">STT</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Phone</th>
                        </tr>
                        <?php
                            $i = 1;
                        ?>
                        @foreach($customers as $key => $customers)
                            <tr>
                                <td class="cart-title first-row">
                                    {{ $i++ }}
                                </td>
                                <td class="cart-title first-row">
                                    {{ $customers->username }}
                                </td>
                                <td class="p-price first-row">
                                    {{ $customers->email }}
                                </td>
                                <td class="qua-col first-row">
                                    {{ $customers->phone }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="cart-table" style="border: inset;margin-top: 60px;">
                    <table style="width:100%">
                        <h3>Shipping Info</h3>
                        <tr>
                            <th class="p-name" style="text-align: center;">STT</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Phone</th>
                            <th style="text-align: center;">Address</th>
                            <th style="text-align: center;">Note</th>
                        </tr>
                        <?php
                            $i = 1;
                        ?>
                        @foreach($shippings as $key => $shippings)
                            <tr>
                                <td class="cart-title first-row">
                                    {{ $i++ }}
                                </td>
                                <td class="cart-title first-row">
                                    {{ $shippings->name }}
                                </td>
                                <td class="p-price first-row">
                                    {{ $shippings->email }}
                                </td>
                                <td class="qua-col first-row">
                                    {{ $shippings->phone }}
                                </td>
                                <td class="qua-col first-row">
                                    {{ $shippings->address }}
                                </td>
                                <td class="qua-col first-row">
                                    {{ $shippings->note }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="cart-table" style="margin-bottom: 100px; border: inset;margin-top: 60px;">
                    <table style="width:100%">
                        <h3>Cart Info</h3>
                        <tr>
                            <th class="p-name" style="text-align: center;">STT</th>
                            <th style="text-align: center;">Product Name</th>
                            <th style="text-align: center;">Product Quantity</th>
                            <th style="text-align: center;">Discount</th>
                            <th style="text-align: center;">Product Price</th>
                            <th style="text-align: center;">Total</th>
                        </tr>
                        <?php
                            $i = 1;
                        ?>
                        @foreach($order_details as $key => $order_details)
                            <?php
                                $i = 1;
                                $total = 0;
                                $subtotal = $order_details->product_price*$order_details->product_qty;
                                $total += $subtotal;
                            ?>
                            <tr>
                                <td class="cart-title first-row">
                                    {{ $i++ }}
                                </td>
                                <td class="cart-title first-row">
                                    {{ $order_details->product_name }}
                                </td>
                                <td class="p-price first-row">
                                    {{ $order_details->product_qty }}
                                </td>
                                <td class="qua-col first-row">
                                    @if($order_details->product_coupon != '')
                                        {{ $order_details->product_coupon }}
                                    @else
                                        Không có mã
                                    @endif
                                </td>
                                <td class="qua-col first-row">
                                    {{ number_format($order_details->product_price) }} VND
                                </td>
                                <td class="qua-col first-row">
                                    <?php
                                        $total_coupon = 0;
                                    ?>
                                    @if($coupon_prd->coupon_condition == 1)
                                        <?php
                                            $total_after_coupon = ($total*$coupon_prd->coupon_num)/100;
                                            $total_coupon = $total - $coupon_prd->coupon_num;
                                        ?>
                                    @else
                                        <?php
                                            $total_coupon = $total-$coupon_prd->coupon_num;
                                        ?>
                                    @endif
                                    {{ number_format($total_coupon) }} VND
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
