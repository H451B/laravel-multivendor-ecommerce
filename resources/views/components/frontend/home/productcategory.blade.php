@php
$pwatch = App\Models\Product::where('status', 1)
->where('product_tags', 'watch')
->orderBy('id', 'ASC')
->limit(10)
->get();

$pphone = App\Models\Product::where('status', 1)
->where('product_tags', 'phone')
->orderBy('id', 'ASC')
->limit(10)
->get();

$pshoe = App\Models\Product::where('status', 1)
->where('product_tags', 'shoe')
->orderBy('id', 'ASC')
->limit(10)
->get();

$psunglass = App\Models\Product::where('status', 1)
->where('product_tags', 'sunglass')
->orderBy('id', 'ASC')
->limit(10)
->get();
@endphp


<div class="wrap-show-advance-info-box style-1">
    <h3 class="title-box">Product Categories</h3>
    <div class="wrap-top-banner">
        <a href="#" class="link-banner banner-effect-2">
            <figure><img src="{{asset('ui/frontend/assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240" alt=""></figure>
        </a>
    </div>
    <div class="wrap-products">
        <div class="wrap-product-tab tab-style-1">
            <div class="tab-control">
                <a href="#fashion_1a" class="tab-control-item active">Smartphone</a>
                <a href="#fashion_1b" class="tab-control-item">Watch</a>
                <a href="#fashion_1c" class="tab-control-item">Shoe</a>
                <a href="#fashion_1d" class="tab-control-item">Sunglass</a>
            </div>
            <div class="tab-contents">

                <div class="tab-content-item active" id="fashion_1a">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @foreach($pphone as $phone)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('details',['id' =>$phone->id])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("$phone->product_image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$phone->product_name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$phone->selling_price}}</span></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-content-item" id="fashion_1b">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                        @foreach($pwatch as $watch)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('details',['id' =>$watch->id])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("$watch->product_image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$watch->product_name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$watch->selling_price}}</span></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-content-item" id="fashion_1c">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                        @foreach($pshoe as $shoe)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('details',['id' =>$shoe->id])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("$shoe->product_image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$shoe->product_name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$shoe->selling_price}}</span></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-content-item" id="fashion_1d">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                        @foreach($psunglass as $sunglass)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('details',['id' =>$sunglass->id])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("$sunglass->product_image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$sunglass->product_name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$sunglass->selling_price}}</span></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>