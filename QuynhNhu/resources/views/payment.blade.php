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
                    <div class="row">
                        <!-- <div class="col-md-7"> -->
                            <!-- Billing Details -->
                            <!-- <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Billing address</h3>
                                </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="shipping_name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="shipping_email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="shipping_address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="shipping_phone" placeholder="Telephone">
                                    </div>
                                    <div class="order-notes">
                                        <textarea class="input" type="text" name="shipping_note" placeholder="Order Notes"></textarea>
                                    </div>
                                    <input type="submit" value="Place order" class="primary-btn order-submit">
                            </div> -->
                            <!-- /Billing Details -->
                        <!-- </div> -->

                        <!-- Order Details -->
                        <!-- <div class="col-md-5 order-details">
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
                                            <div>{{ $cart['product_name'] }}</div>
                                            <div>{{ number_format($cart['product_price']) }} VND</div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="order-col">
                                        <div>Shiping</div>
                                        <div><strong>FREE</strong></div>
                                    </div>
                                    <div class="order-col">
                                        <div><strong>TOTAL</strong></div>
                                        <div><strong class="order-total">{{ number_format($total) }} VND</strong></div>
                                    </div>
                                </div>
                            @endif
                            <div class="payment-method">
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
                            </div>
                            <input type="submit" value="Place order" class="primary-btn order-submit">
                        </div> -->
                        <!-- /Order Details -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
        
		<!-- /SECTION -->
@endsection
