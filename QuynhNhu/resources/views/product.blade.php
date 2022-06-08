@extends('master')
@section('content')

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    @foreach($detail_product as $row => $detail)
                    <form>
                        <!-- Product main img -->
                        <div class="col-md-5 col-md-push-2">
                            <div id="product-main-img">
                                <div class="product-preview">
                                    <img src="{{ asset('./img/'.$detail->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- /Product main img -->

                        <!-- Product thumb imgs -->
                        <div class="col-md-2  col-md-pull-5">
                            <div id="product-imgs">
                                <div class="product-preview">
                                    <img src="{{ asset('./img/'.$detail->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- /Product thumb imgs -->

                        <!-- Product details -->
                        <div class="col-md-5">
                            <div class="product-details">
                                <h2 class="product-name">{{ $detail->name }}</h2>
                                <div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <a class="review-link" href="#">10 Review(s) | Add your review</a>
                                </div>
                                <div>
                                    <h3 class="product-price">{{ number_format($detail->price) }}<del class="product-old-price">$990.00</del></h3>
                                    <span class="product-available">In Stock</span>
                                </div>
                                <div class="add-to-cart">
                                    <input type="hidden" value="{{ $detail->id }}" class="cart_product_id_{{ $detail->id }}">
                                    <input type="hidden" value="{{ $detail->name }}" class="cart_product_name_{{ $detail->id }}">
                                    <input type="hidden" value="{{ $detail->price }}" class="cart_product_price_{{ $detail->id }}">
                                    <input type="hidden" value="{{ $detail->image }}" class="cart_product_image_{{ $detail->id }}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{ $detail->id }}">
                                    <button type="button" class="add-to-cart-btn" data-id="{{ $detail->id }}" name="add-cart"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                </div>

                                <ul class="product-btns">
                                    <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                                </ul>

                                <ul class="product-links">
                                    <li>Category:</li>
                                    <li><a href="#">Headphones</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>

                                <ul class="product-links">
                                    <li>Share:</li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>

                            </div>
					    </div>
                    </form>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $detail->discription }}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">

										</div>
										<!-- /Rating -->

										<!-- Reviews -->
                                        <form>
                                            @csrf
                                            <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{ $detail->id }}">
                                            <div class="col-md-6">
                                                <div id="reviews">
                                                    <div id="comment_show"></div>
                                                    <!-- <ul class="reviews">
                                                        <li>
                                                            <div class="review-heading">
                                                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{ $detail->id }}">
                                                                <h5 class="name">John</h5>
                                                                <p class="date">27 DEC 2018, 8:0 PM</p>
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o empty"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                            </div>
                                                        </li>
                                                    </ul> -->
                                                    <!-- <ul class="reviews-pagination">
                                                        <li class="active">1</li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">4</a></li>
                                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                        </form>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form>
													<input class="input comment_name" type="text" placeholder="Your Name">
													<textarea style="margin-top: 10px;" class="input comment_content" placeholder="Your Review"></textarea>
													<div id="notify_comment"></div>
                                                    <!-- <div class="input-rating">
														<span>Your Rating: </span>
                                                        <ul class="list-inline" title="Average Rating">
                                                            @for($count = 1; $count <= 5; $count++)
                                                                @php
                                                                    if($count <= $rating){
                                                                        $color = 'color:#D10024;';
                                                                    }else{
                                                                        $color = 'color:#ccc;';
                                                                    }
                                                                @endphp
                                                                <li
                                                                    title="Đánh Giá"
                                                                    id="{{ $detail->id }}-{{ $count }}"
                                                                    data-index="{{ $count }}"
                                                                    data-product_id="{{ $detail->id }}"
                                                                    data-rating="{{ $rating }}"
                                                                    class="rating"
                                                                    style="cursor:pointer; {{ $color }} font-size:30px;">
                                                                    &#9733;
                                                                </li>
                                                            @endfor
                                                        </ul>
													</div> -->
													<button type="button" class="primary-btn send-comment">Send</button>
                                                    <div id="notify_comment"></div>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>

							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
                    @endforeach
				</div>
				<!-- /row -->
			</div>

			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
					<!-- product -->
                    <div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
                            <!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
                                        @foreach($related_product as $key => $related)
                                        <form>
                                        @csrf
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="{{ asset('./img/'.$related->image) }}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Category</p>
                                                    <h3 class="product-name"><a href="/chi-tiet-san-pham/{{ $related->id }}">{{ $related->name }}</a></h3>
                                                    <h4 class="product-price">{{ $related->price }}VND <del class="product-old-price">$990.00</del></h4>
                                                    <div class="product-rating">
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <input type="hidden" value="{{ $related->id }}" class="cart_product_id_{{ $related->id }}">
                                                    <input type="hidden" value="{{ $related->name }}" class="cart_product_name_{{ $related->id }}">
                                                    <input type="hidden" value="{{ $related->price }}" class="cart_product_price_{{ $related->id }}">
                                                    <input type="hidden" value="{{ $related->image }}" class="cart_product_image_{{ $related->id }}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{ $related->id }}">
                                                    <button type="button" class="add-to-cart-btn" data-id="{{ $related->id }}" name="add-cart"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<!-- /product -->
					<div class="clearfix visible-sm visible-xs"></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
@endsection
