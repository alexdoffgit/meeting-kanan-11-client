<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>OK-Meeting.</title>

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

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body class="datepicker_mobile_full"><!-- Remove this class to disable datepicker full on mobile -->
		
	<div id="page">
		
	<header class="header menu_fixed">
		<div id="logo">
			<a href="{{url('/')}}">
				<img src="{{asset('img/logo.svg')}}" width="150" height="36" alt="" class="logo_normal">
				<img src="{{asset('img/logo_sticky.svg')}}" width="150" height="36" alt="" class="logo_sticky">
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
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>Meeting Room experiences</h3>
					<p>Enjoy a safe, comfortable room for your activities</p>
					<form action="{{url('/search')}}" method="POST">
						@csrf
						<div class="row no-gutters custom-search-input-2">
							<div class="col-lg-4">
								<div class="form-group">
									<input class="form-control" type="text" name="roomName" placeholder="Room Name">
									<i class="icon_pin_alt"></i>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input class="form-control" type="text" name="maxpeople" placeholder="Room Capacity">
									<i class="icon_plus"></i>
								</div>
							</div>
							<div class="col-lg-4">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
						<!-- /row -->
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		<div class="container container-custom margin_80_0">
			<div class="main_title_2">

				<span><em></em></span>
				<h2>Our popular Meeting Rooms</h2>
				<p>Various types of rooms that you can choose.</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme owl-loaded owl-drag">
				@foreach ($rooms as $room)
				<div class="item">
					<div class="box_grid">
						<figure>
							@auth
								@if ($room['wishlisted'])
									<a href="#0" class="wish_bt liked" onclick="unwishlist('{{$room['wishlistId']}}')"></a>
								@else
									<a href="#0" class="wish_bt" onclick="wishlist('{{$room['id']}}')"></a>
								@endif
							@endauth
							@guest
								<a href="#0" class="wish_bt" onclick="wishlist('{{$room['id']}}')"></a>
							@endguest
							<a href="{{url('/room'.'/'.$room['id'])}}"><img src="{{asset($room['image'])}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
						</figure>
						<div class="wrapper">
							<h3><a href="{{url('/room'.'/'.$room['id'])}}">{{ $room['room_name'] }}</a></h3>
							<p>{{ $room['description'] }}</p>
							<span class="price">From <strong>${{ $room['price'] }}</strong> /per Ruangan</span>
						</div>
						<ul>
							<li>{{-- this need to exist for layout --}}</li>
							<li>
								<div class="score">
									<span>
										Superb
										<em>{{ $room['ratingCount'] }} Reviews</em>
									</span>
									<strong>{{ $room['rating'] }}</strong>
								</div>
							</li>
						</ul>
					</div>
				</div>
				@endforeach
			</div>
			<!-- /carousel -->
			<p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">View all Rooms</a></p>
			{{-- some random line --}}
			{{-- <hr class="large"> --}}
		</div>
	</main>
	<!-- /main -->

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

		function unwishlist(wishlistId) {
			let form = document.createElement("form");

			let csrf = document.createElement("input");
			csrf.setAttribute("type", "hidden");
			csrf.setAttribute("name", "_token");
			csrf.setAttribute("value", "{{ csrf_token() }}");
			form.append(csrf)

			let wishlistIdInput = document.createElement("input");
			wishlistIdInput.setAttribute("type", "hidden");
			wishlistIdInput.setAttribute("name", "wishlist_id");
			wishlistIdInput.setAttribute("value", wishlistId);
			form.append(wishlistIdInput);

			form.style.display = 'none';
			document.body.appendChild(form);

			form.action = "{{url('/wishlist/delete')}}";
			form.method = "POST";
			form.submit();
		}
	</script>
	
	<!-- DATEPICKER  -->
	{{-- <script>
	$(function() {
	  'use strict';
	  $('input[name="dates"]').daterangepicker({
		  autoUpdateInput: false,
		  minDate:new Date(),
		  locale: {
			  cancelLabel: 'Clear'
		  }
	  });
	  $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
	  });
	  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });
	});
	</script> --}}
	
</body>
</html>