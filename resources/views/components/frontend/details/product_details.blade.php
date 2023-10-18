<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
	<div class="wrap-product-detail">
		<div class="detail-media">
			<div class="product-gallery">
				<ul class="slides">

					<li data-thumb="{{asset($product->product_image)}}">
						<img src="{{asset($product->product_image)}}" alt="product thumbnail" />
					</li>

				</ul>
			</div>
		</div>
		<div class="detail-info">
			<div class="product-rating">
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<a href="#" class="count-review">(05 review)</a>
			</div>
			<h2 class="product-name">{{$product->product_name}}</h2>
			<div class="short-desc">
				<ul>
					<li>{{$product->short_descp}}</li>
					<li>{{$product->long_descp}}</li>
					<!-- <li>FaceTime HD Camera 7.0 MP Photos</li> -->
				</ul>
			</div>
			<div class="wrap-social">
				<a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
			</div>
			<div class="wrap-price"><span class="product-price">{{$product->selling_price-$product->discount_image}}</span></div>
			<div class="stock-info in-stock">
				<p class="availability">Availability: <b>In Stock</b></p>
			</div>

			@auth

			<!-- dynamic start -->

			<form action="{{ route('cart.create', $product->id) }}" method="POST">
				@csrf

				@if ($cartItem = Auth::user()->cart->where('product_id', $product->id)->first())
				<h4 style="color: red;">Added to Cart</h4>
				@else
				<div class="quantity">
					<span>Quantity:</span>
					<div class="quantity-input">
						<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">

						<a class="btn btn-reduce" href="#"></a>
						<a class="btn btn-increase" href="#"></a>
					</div>
				</div>
				<div class="wrap-butons">

					<!-- <a href="#" class="btn add-to-cart">Add to Cart</a> -->
					<button type="submit" class="btn add-to-cart">
						Add to Cart
					</button>
				</div>
				@endif

			</form>

			@if ($cartItem)
			<p>Quantity in Cart: {{ $cartItem->quantity }}</p>
			@endif
			@else
			<p>Please <a href="{{ route('login') }}">login</a> to add to cart.</p>

			<!-- dynamic end -->

			<!-- <div class="wrap-btn">
					<a href="#" class="btn btn-compare">Add Compare</a>
					<a href="#" class="btn btn-wishlist">Add Wishlist</a>
				</div> -->
			@endauth
		</div>
		<div class="advance-info">
			<div class="tab-control normal">
				<a href="#description" class="tab-control-item active">description</a>
				<a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
				<a href="#review" class="tab-control-item">Reviews</a>
			</div>
			<div class="tab-contents">
				<div class="tab-content-item active" id="description">
					<!-- <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t everti meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>
									<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus taria . </p>
									<p>experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea. Vis quaeque ocurreret ea.cu bus  scripserit, modus voluptaria ex per.</p> -->
					<p>{{$product->short_descp}}</p>
					<p>{{$product->short_descp}}</p>
				</div>
				<div class="tab-content-item " id="add_infomation">
					<table class="shop_attributes">
						<tbody>
							<tr>
								<th>Weight</th>
								<td class="product_weight">1 kg</td>
							</tr>
							<tr>
								<th>Dimensions</th>
								<td class="product_dimensions">{{$product->product_size}}</td>
							</tr>
							<tr>
								<th>Color</th>
								<td>
									<p>{{$product->product_color}}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-content-item " id="review">

					<div class="wrap-review-form">

						<div id="comments">
							<h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
							<ol class="commentlist">
								<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
									<div id="comment-20" class="comment_container">
										<img alt="" src="assets/images/author-avata.jpg" height="80" width="80">
										<div class="comment-text">
											<div class="star-rating">
												<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
											</div>
											<p class="meta">
												<strong class="woocommerce-review__author">admin</strong>
												<span class="woocommerce-review__dash">–</span>
												<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">Tue, Aug 15, 2017</time>
											</p>
											<div class="description">
												<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
											</div>
										</div>
									</div>
								</li>
							</ol>
						</div><!-- #comments -->

						<div id="review_form_wrapper">
							<div id="review_form">
								<div id="respond" class="comment-respond">

									<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
										<p class="comment-notes">
											<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
										</p>
										<div class="comment-form-rating">
											<span>Your rating</span>
											<p class="stars">

												<label for="rated-1"></label>
												<input type="radio" id="rated-1" name="rating" value="1">
												<label for="rated-2"></label>
												<input type="radio" id="rated-2" name="rating" value="2">
												<label for="rated-3"></label>
												<input type="radio" id="rated-3" name="rating" value="3">
												<label for="rated-4"></label>
												<input type="radio" id="rated-4" name="rating" value="4">
												<label for="rated-5"></label>
												<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
											</p>
										</div>
										<p class="comment-form-author">
											<label for="author">Name <span class="required">*</span></label>
											<input id="author" name="author" type="text" value="">
										</p>
										<p class="comment-form-email">
											<label for="email">Email <span class="required">*</span></label>
											<input id="email" name="email" type="email" value="">
										</p>
										<p class="comment-form-comment">
											<label for="comment">Your review <span class="required">*</span>
											</label>
											<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
										</p>
										<p class="form-submit">
											<input name="submit" type="submit" id="submit" class="submit" value="Submit">
										</p>
									</form>

								</div><!-- .comment-respond-->
							</div><!-- #review_form -->
						</div><!-- #review_form_wrapper -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--end main products area-->