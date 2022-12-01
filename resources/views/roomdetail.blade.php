<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>Panagea | Premium site template for travel agencies, hotels and restaurant listing.</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.min.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

	<style>
		.hero_in.tours_detail:before {
			background: url( {{$room['heroImage']}} ) center center no-repeat;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>

</head>

<body class="datepicker_mobile_full"><!-- Remove this class to disable datepicker full on mobile -->
	
	<div id="page" class="theia-exception">
		
		<header class="header menu_fixed">
			<div id="logo">
				<a href="{{url('/')}}">
					<img src="{{asset('img/Logo-Graha-Meeting-Putih.png')}}" width="120" height="36" alt="" class="logo_normal">
					<img src="{{asset('img/Logo-Graha-Meeting-Hitam.png')}}" width="120" height="36" alt="" class="logo_sticky">
				</a>
			</div>
			<ul id="top_menu">
				<li><a href="{{url('/cart1')}}" class="cart-menu-btn" title="Cart">{{-- <strong>4</strong> --}}</a></li>
				@guest				
					<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
				@endguest
				@auth
					<li>
						<form action="{{ url('/logout') }}" method="post">
							@csrf
							<button type="submit" id="logout">
								<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_101_148)">
										<path d="M0.5 10.5H11.5M11.5 10.5L7.5 6.5M11.5 10.5L7.5 14.5M3.5 6V2.5C3.5 1.39543 4.39543 0.5 5.5 0.5H18.5C19.6046 0.5 20.5 1.39543 20.5 2.5V10.5V18.5C20.5 19.6046 19.6046 20.5 18.5 20.5H10H5.5V20.5C4.39543 20.5 3.5 19.6046 3.5 18.5V15" stroke="#D80C0C"/>
									</g>
									<defs>
										<clipPath id="clip0_101_148">
											<rect width="21" height="21" fill="white"/>
										</clipPath>
									</defs>
								</svg>
							</button>
						</form>
					</li>
				@endauth
				<li><a href="{{url('/wishlist')}}" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
			</ul>
			<!-- /top_menu -->
			<a href="#menu" class="btn_mobile">
				<div class="hamburger hamburger--spin" id="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<nav id="menu" class="main-menu">
				<ul>
					<li><span><a href="{{url('/')}}">Home</a></span></li>
					<li><span><a href="{{url('/rooms/grid')}}">Room</a></span>
				</ul>
			</nav>
	
		</header>
	<!-- /header -->
	
	<main>
		<section class="hero_in tours_detail">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Tour detail page</h1>
				</div>
				<span class="magnific-gallery">
					@foreach ($room['roomImages'] as $image)
						@if ($loop->first)
							<a href="{{$image}}" class="btn_photos" title="image {{$loop->index + 1}}" data-effect="mfp-zoom-in">View photos</a>
						@else
							<a href="{{$image}}" title="image {{$loop->index + 1}}" data-effect="mfp-zoom-in"></a>
						@endif
					@endforeach
				</span>
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<nav class="secondary_nav sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#description" class="active">Description</a></li>
						<li><a href="#reviews">Reviews</a></li>
						<li><a href="#sidebar">Booking</a></li>
					</ul>
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<h2>Description</h2>
							<p>{{ $room['description'] }}</p>
						</section>
						<!-- /section -->
					
						<section id="reviews">
							<h2>Reviews</h2>
							<div class="reviews-container">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong>{{$room['averageRating']}}</strong>
											<em>Superb</em>
											<small>Based on {{$room['ratingCount']}} reviews</small>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: {{$room["ratingPercentage"]["5"]}}%" aria-valuenow="{{$room["ratingPercentage"]["5"]}}" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: {{$room["ratingPercentage"]["4"]}}%" aria-valuenow="{{$room["ratingPercentage"]["4"]}}" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: {{$room['ratingPercentage']['3']}}%" aria-valuenow="{{$room['ratingPercentage']['3']}}" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: {{$room['ratingPercentage']['2']}}%" aria-valuenow="{{$room['ratingPercentage']['2']}}" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: {{$room['ratingPercentage']['1']}}%" aria-valuenow="{{$room['ratingPercentage']['1']}}" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->
							</div>

							<hr>

							<div class="reviews-container">
								@foreach ($room['commentWithInfo'] as $comment)
									<div class="review-box clearfix">
									<figure class="rev-thumb">
										<img src="" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											@for ($i = 0; $i < $comment['star']; $i++)
												<i class="icon_star voted"></i>
											@endfor
											@for ($i = 0; $i < (5 - $comment['star']); $i++)
												<i class="icon_star"></i>
											@endfor
										</div>
										<div class="rev-info">
											{{$comment['author']}} – {{$comment['time']}}:
										</div>
										<div class="rev-text">
											<p>
												{{$comment['text']}}
											</p>
										</div>
									</div>
								</div>
								@endforeach
								<!-- /review-box -->
							</div>
							<!-- /review-container -->
						</section>
						<!-- /section -->
						<hr>

							<div class="add-review">
								<h5>Leave a Review</h5>
								<form method="POST" action="{{ url("/room/".$room['id']."/comment") }}">
									@csrf
									@auth
										<input type="hidden" name="userId" value="{{auth()->user()->id}}">
									@endauth
									<input type="hidden" name="roomId" value="{{$room['id']}}">
									<div class="row">
										<div class="form-group col-md-6">
											<label>Rating</label>
											<div class="custom-select-form">
												<select name="rating_review" id="rating_review" class="wide">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5" selected>5</option>
												</select>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label>Your Review</label>
											<textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
										</div>
										<div class="form-group col-md-12 add_top_20">
											@auth
												<button type="submit" class="btn_1" id="submit-review">
													Submit
												</button>
											@endauth

											@guest
												<button class="btn-disabled" id="submit-review" disabled>
													Login First
												</button>
											@endguest
										</div>
									</div>
								</form>
							</div>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<form action="{{url('/cart/add')}}" method="POST">
								@csrf
								<input type="hidden" name="id" value="{{ $room['id'] }}">
								<div class="price">
									<span>Rp.{{$room['price']}}<small>/orang</small></span>
									<div class="score"><span>Good<em>{{$room['ratingCount']}} Reviews</em></span><strong>{{$room['averageRating']}}</strong></div>
								</div>
								<div class="form-group input-dates">
									<input class="form-control" type="text" name="dates" placeholder="When..">
									<i class="icon_calendar"></i>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<input type="text" class="form-control" name="from" id="from" placeholder="From">
										<i class="icon_clock time-input-group"></i>
									</div>
									<div class="form-group col-6">
										<input type="text" class="form-control" name="to" id="to" placeholder="To">
										<i class="icon_clock time-input-group"></i>
									</div>
								</div>
								<div class="form-group">
									<input type="number" name="guest" min="1" placeholder="Guest (max {{$room['maxpeople']}})" max="{{$room['maxpeople']}}" class="form-control">
								</div>
								<button class="btn_1 full-width purchase">Purchase</button>
								<a href="#0" class="btn_1 full-width outline wishlist" onclick="wishlist('{{$room['id']}}')"><i class="icon_heart"></i> Add to wishlist</a>
								<div class="text-center"><small>No money charged in this step</small></div>
							</form>
						</div>
						<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
						</ul>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->
	
	@extends('layout.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	@extends('layout.signinpop')
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('js/common_scripts.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
	<script src="{{asset('assets/validate.js')}}"></script>
	<script>
		function wishlist(roomId) {
			let form = document.createElement("form");

			let csrf = document.createElement("input");
			csrf.setAttribute("type", "hidden");
			csrf.setAttribute("name", "_token");
			csrf.setAttribute("value", "{{csrf_token()}}")
			form.append(csrf);

			let roomIdInput = document.createElement("input");
			roomIdInput.setAttribute("type", "hidden");
			roomIdInput.setAttribute("name", "room_id");
			roomIdInput.setAttribute("value", roomId)
			form.append(roomIdInput);

			form.style.display = 'none';
			document.body.appendChild(form);

			form.action = "{{ url('/wishlist/add') }}";
			form.method = "POST";
			form.submit();
		}
	</script>

	<!-- Map -->
	{{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
	{{-- <script src="{{asset('js/map_single_tour.js')}}"></script> --}}
	{{-- <script src="{{asset('js/infobox.js')}}"></script> --}}
	
	<!-- DATEPICKER  -->
	<script>
	$(function() {
	  $('input[name="dates"]').daterangepicker({
		  autoUpdateInput: false,
		  parentEl:'.scroll-fix',
		  minDate:new Date(),
		  opens: 'left',
		  locale: {
			  cancelLabel: 'Clear'
		  }
	  });
	  $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('YYYY-MM-DD') + ' > ' + picker.endDate.format('YYYY-MM-DD'));
	  });
	  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });
	});
	</script>
	
	<!-- Timepicker -->
	<script>
		$('#from').datetimepicker({
			datepicker: false,
			format: 'H:i'
		})
		$('#to').datetimepicker({
			datepicker: false,
			format: 'H:i'
		})
	</script>

	<!-- INPUT QUANTITY  -->
	{{-- <script src="{{asset('js/input_qty.js')}}"></script> --}}
	
	<!-- INSTAGRAM FEED  -->
	{{-- <script>
		$(window).on('load', function() {
			"use strict";
			$.instagramFeed({
				'username': 'thelouvremuseum',
				'container': "#instagram-feed",
				'display_profile': false,
				'display_biography': false,
				'display_gallery': true,
				'get_raw_json': false,
				'callback': null,
				'styling': true,
				'items': 12,
				'items_per_row': 6,
				'margin': 1
			});
		});
	</script> --}}
  
</body>
</html>