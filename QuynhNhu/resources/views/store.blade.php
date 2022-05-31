@extends('master')
@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Products</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
                                @foreach($type_product as $key => $type)
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										{{ $type->type_name }}
										<small>(120)</small>
									</label>
								</div>
                                @endforeach
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
                            <form>
                                <div id="slider-range"></div>
                                <style>
                                    .style-range p {
                                        float: left;
                                        width: 50%;
                                    }
                                </style>
                                <div class="style-range">
                                    <p><input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                    <p><input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                </div>
                                <input type="hidden" name="start_price" id="start_price">
                                <input type="hidden" name="end_price" id="end_price">
                                <br>
                                <div class="clearfix"></div>
                                <input type="submit" name="filter_price" value="Lọc Giá" class="btn btn-default">
                            </form>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
                                @foreach($manu_product as $key => $manu)
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										{{ $manu->manu_name }}
									</label>
								</div>
                                @endforeach
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->

						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
                            @foreach($topSell as $key => $topsell)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{ asset('./img/'.$topsell->image) }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="/chi-tiet-san-pham/{{ $topsell->id }}">{{ $topsell->name }}</a></h3>
									<h4 class="product-price">{{ number_format($topsell->price) }}VND <del class="product-old-price">$980.00</del></h4>
								</div>
							</div>
                            @endforeach
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
                            @foreach($type_by_id as $key => $type_id_product)
                            <form>
                                @csrf
                                <div class="col-md-4">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('./img/'.$type_id_product->image) }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="/chi-tiet-san-pham/{{ $type_id_product->id }}">{{ $type_id_product->name }}</a></h3>
                                            <h4 class="product-price">{{number_format($type_id_product->price) }}VND<del class="product-old-price">$990.00</del></h4>
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
                                            <input type="hidden" value="{{ $type_id_product->id }}" class="cart_product_id_{{ $type_id_product->id }}">
                                            <input type="hidden" value="{{ $type_id_product->name }}" class="cart_product_name_{{ $type_id_product->id }}">
                                            <input type="hidden" value="{{ $type_id_product->price }}" class="cart_product_price_{{ $type_id_product->id }}">
                                            <input type="hidden" value="{{ $type_id_product->image }}" class="cart_product_image_{{ $type_id_product->id }}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{ $type_id_product->id }}">
											<button type="button" class="add-to-cart-btn" data-id="{{ $type_id_product->id }}" name="add-cart"><i class="fa fa-shopping-cart"></i>add to cart</button>
										</div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
							<!-- /product -->


							<div class="clearfix visible-lg visible-md"></div>


							<div class="clearfix visible-sm visible-xs"></div>

							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

							<div class="clearfix visible-sm visible-xs"></div>
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<ul class="store-pagination">
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
