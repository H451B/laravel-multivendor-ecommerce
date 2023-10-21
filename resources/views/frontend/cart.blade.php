<x-frontend.layouts.master_dashboard>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @php
                    $entire = 0;
                    @endphp

                    @if(auth()->check() && auth()->user()->cart)
                    @foreach(auth()->user()->cart as $cartItem)
                    @php
                    $eachPrice = $cartItem->product->discount_price;
                    $subtotal = $eachPrice * $cartItem->quantity;
                    $entire+=$subtotal;
                    @endphp
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset($cartItem->product->product_image) }}" alt="{{ $cartItem->product->product_name }}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="#">{{ $cartItem->product->product_name }}</a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price each-price">${{ $eachPrice }}</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="number" class="quantity-input qty-input" data-cart-id="{{ $cartItem->id }}" value="{{ $cartItem->quantity }}" data-max="120" pattern="[0-9]*" min="1">
                                <a class="btn btn-increase" href="#" data-cart-id="{{ $cartItem->id }}"></a>
                                <a class="btn btn-reduce" href="#" data-cart-id="{{ $cartItem->id }}"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price subttl" id="subtotal-{{ $cartItem->id }}">${{ $subtotal }}</p>
                        </div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" data-cart-id="{{ $cartItem->id }}" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <p>No items in the cart.</p>
                    @endif
                </ul>
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index" id="newsubtotal">${{$entire}}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info"><span class="title">Total</span><b class="index" id="newtotal">${{$entire}}</b></p>
                </div>
                <div class="checkout-info">
                    <!-- <label class="checkbox-field">
                        <input class="frm-input" name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                    </label> -->
                    <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                    <a class="link-to-shop" href="{{route('shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>



            <x-frontend.common.most-viewed-products />

        </div><!--end main content area-->
    </div><!--end container-->
</x-frontend.layouts.master_dashboard>