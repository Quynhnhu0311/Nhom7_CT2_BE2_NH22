@if(Session::has("Cart") != null)
<div id="change-item-cart">
    <div class="cart-list">
        @foreach(Session::get('Cart')->products as $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="./img/{{$item['productInfo']->image}}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{$item['productInfo']->name}}</a></h3>
                    <h4 class="product-price"><span class="qty">{{ $item['qty'] }}</span>{{  number_format($item['productInfo']->price) }} VND</h4>
                </div>
                <button class="delete"><i class="fa fa-close" data-id="{{$item['productInfo']->id}}"></i></button>
            </div>
        @endforeach
    </div>
    <div class="cart-summary">
        <span id="total-qty-cart"><small>{{Session::get('Cart')->totalQty}} Item(s) selected</small></span>
        <h5>SUBTOTAL: {{ number_format(Session::get('Cart')->totalPrice) }} VND</h5>
    </div>
</div>
@endif

                                <!-- <div class="cart-dropdown">
                                    <div id="change-item-cart">
                                        <div id="change-item-cart">
                                            <div class="cart-list">
                                                @foreach(Session::get('cart') as $key => $cart)
                                                    <div class="product-widget">
                                                        <div class="product-img">
                                                            <img src="{{ asset('./img/'.$cart['product_image']) }}" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <h3 class="product-name"><a href="#">{{ $cart['product_name'] }}</a></h3>
                                                            <h4 class="product-price"><span class="qty"></span>{{ number_format($cart['product_price']) }} VND</h4>
                                                        </div>
                                                        <button class="delete"><i class="fa fa-close"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="cart-summary">
                                                <small>0 Item(s) selected</small>
                                                <h5>SUBTOTAL:  VND</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="/gio-hang">View Cart</a>
                                        <a href="/checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div> -->
