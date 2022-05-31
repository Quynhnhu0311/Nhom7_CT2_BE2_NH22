@extends('master')
@section('content')


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach($products as $key => $product)
                                        <form>
                                        @csrf
											<div class="product">
												<div class="product-img">
													<img src="{{ asset('./img/'.$product->image) }}" alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">Category</p>
													<h3 class="product-name"><a href="/chi-tiet-san-pham/{{ $product->id }}">{{ $product->name }}</a></h3>
													<h4 class="product-price">{{ number_format($product->price) }} VND<del class="product-old-price"></del></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
                                                    <input type="hidden" value="{{ $product->id }}" class="cart_product_id_{{ $product->id }}">
                                                    <input type="hidden" value="{{ $product->name }}" class="cart_product_name_{{ $product->id }}">
                                                    <input type="hidden" value="{{ $product->price }}" class="cart_product_price_{{ $product->id }}">
                                                    <input type="hidden" value="{{ $product->image }}" class="cart_product_image_{{ $product->id }}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{ $product->id }}">
													<button type="button" class="add-to-cart-btn" data-id="{{ $product->id }}" name="add-cart"><i class="fa fa-shopping-cart"></i>add to cart</button>
												</div>
											</div>
                                        </form>
										@endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										@foreach($topSelling as $key => $topSell)
										<!-- product -->
                                        <form>
                                        {{ csrf_field() }}
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/{{ $topSell->image }}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Category</p>
                                                    <h3 class="product-name"><a href="/chi-tiet-san-pham/{{ $topSell->id }}">{{ $topSell->name }}</a></h3>
                                                    <h4 class="product-price">{{ number_format($topSell->price) }} VND<del class="product-old-price">$990.00</del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <input type="hidden" value="{{ $topSell->id }}" class="cart_product_id_{{ $topSell->id }}">
                                                    <input type="hidden" value="{{ $topSell->name }}" class="cart_product_name_{{ $topSell->id }}">
                                                    <input type="hidden" value="{{ $topSell->price }}" class="cart_product_price_{{ $topSell->id }}">
                                                    <input type="hidden" value="{{ $topSell->image }}" class="cart_product_image_{{ $topSell->id }}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{ $topSell->id }}">
													<button type="button" class="add-to-cart-btn" data-id="{{ $topSell->id }}" name="add-cart"><i class="fa fa-shopping-cart"></i>add to cart</button>
												</div>
                                            </div>
                                        </form>
										<!-- /product -->
										@endforeach
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>

					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->



@endsection
