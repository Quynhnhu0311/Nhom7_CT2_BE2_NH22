@extends('master')
@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="/">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <form action="/confirm-order" method="POST">
                        @csrf
                            <div class="col-md-7">
                                <!-- Billing Details -->
                                <div class="billing-details">
                                    <div class="section-title">
                                        <h3 class="title">Billing address</h3>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="shipping_name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="shipping_email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="shipping_address" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="shipping_phone" placeholder="Telephone" required>
                                    </div>
                                    <div class="order-notes">
                                        <textarea class="input" type="text" name="shipping_note" placeholder="Order Notes"></textarea>
                                    </div>
                                    @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            <input class="input" type="hidden" name="order_coupon" value="{{ $cou['coupon_code'] }}">
                                        @endforeach
                                    @else
                                        <input class="input" type="hidden" name="order_coupon" value="NO">
                                    @endif
                                    <!-- <input type="submit" value="Send" class="primary-btn order-submit"> -->
                                </div>
                                <!-- /Billing Details -->
                            </div>

                            <!-- Order Details -->
                            <div class="col-md-5 order-details">
                                <div class="section-title text-center">
                                    <h3 class="title">Your Order</h3>
                                </div>
                                @if(Session::get('cart') == true)
                                    <div class="order-summary">
                                        <div class="order-col">
                                            <div><strong>PRODUCT</strong></div>
                                            <div><strong>TOTAL</strong></div>
                                        </div>
                                        <div class="order-products">
                                            <?php
                                                $total = 0;
                                            ?>
                                            @foreach(Session::get('cart') as $key => $cart)
                                            <?php
                                                $subTotal = $cart['product_price']*$cart['product_qty'];
                                                $total += $subTotal;
                                            ?>
                                            <div class="order-col">
                                                <div>{{ $cart['product_name'] }} x{{ $cart['product_qty'] }}</div>
                                                <div>{{ number_format($cart['product_price'] * $cart['product_qty'] ) }} VND</div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="order-col">
                                            <div>Shiping</div>
                                            <div><strong>FREE</strong></div>
                                        </div>

                                        @if(Session::get('coupon'))
                                            <div class="order-col">
                                                <div><strong>Discount</strong></div>
                                                <div></div>
                                            </div>
                                            @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition'] == 1)
                                                    <div class="order-col">
                                                        <div><strong>Giảm</strong></div>
                                                        <div>{{ $cou['coupon_number'] }}%</div>
                                                    </div>
                                                    <?php
                                                        $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                    ?>
                                                    <div class="order-col">
                                                        <div><strong>TOTAL</strong></div>
                                                        <div><strong class="order-total" style="font-size: 17px;">{{ number_format($total-$total_coupon) }} VND</strong></div>
                                                    </div>
                                                @elseif($cou['coupon_condition'] == 2)
                                                    <div class="order-col">
                                                        <div><strong>Giảm</strong></div>
                                                        <div>{{ number_format($cou['coupon_number']) }} VND</div>
                                                    </div>
                                                    <?php
                                                        $total_coupon = $total - $cou['coupon_number'];
                                                    ?>
                                                    <div class="order-col">
                                                        <div><strong>TOTAL</strong></div>
                                                        <div><strong class="order-total" style="font-size: 17px;">{{ number_format($total_coupon) }} VND</strong></div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="order-col">
                                                <div><strong>TOTAL</strong></div>
                                                <div><strong class="order-total" style="font-size: 17px;">{{ number_format($total) }} VND</strong></div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <!-- <div class="payment-method">
                                    <div class="input-radio">
                                        <input type="radio" name="payment" id="payment-1">
                                        <label for="payment-1">
                                            <span></span>
                                            Direct Bank Transfer
                                        </label>
                                        <div class="caption">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                    <div class="input-radio">
                                        <input type="radio" name="payment" id="payment-2">
                                        <label for="payment-2">
                                            <span></span>
                                            Cheque Payment
                                        </label>
                                        <div class="caption">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                    <div class="input-radio">
                                        <input type="radio" name="payment" id="payment-3">
                                        <label for="payment-3">
                                            <span></span>
                                            Paypal System
                                        </label>
                                        <div class="caption">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="terms">
                                    <label for="terms">
                                        <span></span>
                                        I've read and accept the <a href="#">terms & conditions</a>
                                    </label>
                                </div> -->
                                <input type="submit" value="Place order" class="primary-btn order-submit" style="margin-left: 120px;">
                            </div>

                            <!-- /Order Details -->
                        </form>
                    </div>
                    <!-- /row -->
                    <form action="/check-coupon" method="post" style="margin-bottom: 15px;margin-right: 40px;">
                        @csrf
                        <input class="input" type="text" placeholder="Nhập mã giảm giá" name="coupon" style="width: 30%;"><br>
                        <input type="submit" value="Tính mã giảm giá" class="btn btn-default check_coupon" name="check_coupon" style="margin-top: 5px;">
                        @if(Session::get('coupon'))
                            <a href="/delete-coupon" class="btn btn-default check_coupon" style="margin-top: 5px;">Xóa mã giảm giá</a>
                        @endif
                    </form>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
		<!-- /SECTION -->
@endsection
