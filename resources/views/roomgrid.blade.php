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

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body>
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
			
			<section class="hero_in tours">
				<div class="wrapper">
					<div class="container">
						<h1 class="fadeInUp"><span></span>Paris tours grid</h1>
					</div>
				</div>
			</section>
			<!--/hero_in-->
			
			<div class="filters_listing sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						<li>
							<div class="type-filter">
								<a href="{{ url('/rooms/sort/all') }}">
									<p>All</p>
								</a>
								<a href="{{ url('/rooms/sort/popular') }}">
									<p>Popular</p>
								</a>
								<a href="{{ url('/rooms/sort/latest') }}">
									<p>Latest</p>
								</a>
							</div>
						</li>
						<li>
							<div class="layout_view">
								<a href="{{url('rooms/grid')}}" class="active"><i class="icon-th"></i></a>
								<a href="{{url('rooms/list')}}"><i class="icon-th-list"></i></a>
							</div>
						</li>
						<li>
							<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
						</li>
					</ul>
				</div>
				<!-- /container -->
			</div>
			<!-- /filters -->
			
			<div class="collapse" id="collapseMap">
				<div id="map" class="map"></div>
			</div>
			<!-- End Map -->

			<div class="container margin_60_35">
				<form class="col-lg-12" method="POST" action="{{ url('/search/grid') }}">
					@csrf
					<div class="row no-gutters custom-search-input-2 inner">
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Room Name" name="roomName">
								<i class="icon_search"></i>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Floor" name="location">
								<i class="icon_pin_alt"></i>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<input type="number" name="maxpeople" class="form-control" min="1" placeholder="Guest">
								<i class="icon_profile"></i>
							</div>
						</div>
						<div class="col-lg-2">
							<input type="submit" class="btn_search" value="Search">
						</div>
					</div>
					<!-- /row -->
				</form>
				<!-- /custom-search-input-2 -->
				
				<div class="isotope-wrapper">
				<div class="row">
					@foreach ($rooms as $room)	
						<div class="col-xl-4 col-lg-6 col-md-6">
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
									<a href="{{asset("/room/".$room['id'])}}"><img src="{{asset($room['image'])}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								</figure>
								<div class="wrapper">
									<h3><a href="{{asset("/room/".$room['id'])}}">{{$room['room_name']}}</a></h3>
									<p>{{$room['description']}}</p>
									<span class="price">From <strong>{{$room['price']}}</strong> /per person</span>
								</div>
								<ul>
									<li></li>
									<li><div class="score"><span>Superb<em>{{$room['ratingCount']}} Reviews</em></span><strong>{{$room['rating']}}</strong></div></li>
								</ul>
							</div>
						</div>
					@endforeach
				</div>
				<!-- /row -->
				</div>
				<!-- /isotope-wrapper -->
				
				<p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
				
			</div>
			<!-- /container -->
			
			<div class="bg_color_1">
				<div class="container margin_60_35">
					<div class="row">
						<div class="col-md-4">
							<a href="#0" class="boxed_list">
								<i class="pe-7s-help2"></i>
								<h4>Need Help? Contact us</h4>
								<p>Cum appareat maiestatis interpretaris et, et sit.</p>
							</a>
						</div>
						<div class="col-md-4">
							<a href="#0" class="boxed_list">
								<i class="pe-7s-wallet"></i>
								<h4>Payments</h4>
								<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
							</a>
						</div>
						<div class="col-md-4">
							<a href="#0" class="boxed_list">
								<i class="pe-7s-note2"></i>
								<h4>Cancel Policy</h4>
								<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
							</a>
						</div>
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


	<!-- Map -->
	{{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
	{{-- <script src="{{asset('js/markerclusterer.js')}}"></script> --}}
	{{-- <script src="{{asset('js/map_tours.js')}}"></script> --}}
	{{-- <script src="{{asset('js/infobox.js')}}"></script>	 --}}
	
  
</body>
</html>