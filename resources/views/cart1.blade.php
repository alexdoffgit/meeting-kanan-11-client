<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    @extends('layout.title')

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
			<div class="hero_in cart_section">
				<div class="wrapper">
					{{-- <div class="container">
						<div class="bs-wizard clearfix">
							<div class="bs-wizard-step active">
								<div class="text-center bs-wizard-stepnum">Your cart</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>

							<div class="bs-wizard-step disabled">
								<div class="text-center bs-wizard-stepnum">Payment</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>

							<div class="bs-wizard-step disabled">
								<div class="text-center bs-wizard-stepnum">Finish!</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>
						</div>
						<!-- End bs-wizard -->
					</div> --}}
				</div>
			</div>
			<!--/hero_in-->

			<div class="bg_color_1">
				<div class="container margin_60_35">
					<div class="row">
						<div class="col-lg-8">
							<div class="box_cart">
							<table class="table table-striped cart-list">
								<thead>
									<tr>
										<th>
											Item
										</th>
										<th>
											Discount
										</th>
										<th>
											Price
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($carts['carts'] as $cart)
										<tr>
											<td>
												<div class="thumb_cart">
													<img src="{{$cart['image_icon']}}" alt="Image">
												</div>
												<span class="item_cart">{{$cart['room_name']}}</span>
											</td>
											<td>
												0%
											</td>
											<td>
												<strong>Rp.{{$cart['price']}}</strong>
											</td>
											<td class="options" style="width:5%; text-align:center;">
												<a href="#0" onclick="deletecart('{{ url('/cart/delete/'.$cart['id']) }}')"><i class="icon-trash"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<div class="cart-options clearfix">
								<div class="float-left">
									<div class="apply-coupon">
										<div class="form-group">
											<input type="text" name="coupon-code" value="" placeholder="Your Coupon Code" class="form-control">
										</div>
										<div class="form-group">
											<button type="button" class="btn_1 outline">Apply Coupon</button>
										</div>
									</div>
								</div>
								<div class="float-right fix_mobile">
									<button type="button" class="btn_1 outline">Update Cart</button>
								</div>
							</div>
							<!-- /cart-options -->
						</div>
						</div>
						<!-- /col -->
						
						<aside class="col-lg-4" id="sidebar">
							<div class="box_detail">
								<div id="total_cart">
									Total <span class="float-right">Rp.{{$carts['total_price']}}</span>
								</div>
								<ul class="cart_details">
									<li>From <span>{{$carts['from']}}</span></li>
									<li>To <span>{{$carts['to']}}</span></li>
									<li>Guest <span>{{$carts['total_guest']}}</span></li>
								</ul>
								<a href="{{ url('/cart2') }}" class="btn_1 full-width purchase">Checkout</a>
								<div class="text-center"><small>No money charged in this step</small></div>
							</div>
						</aside>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bg_color_1 -->
		</main>
		<!--/main-->
		
		<footer>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-5 col-md-12 p-r-5">
						<p><img src="img/logo.svg" width="150" height="36" alt=""></p>
						<p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
						<div class="follow_us">
							<ul>
								<li>Follow us</li>
								<li><a href="#0"><i class="ti-facebook"></i></a></li>
								<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
								<li><a href="#0"><i class="ti-google"></i></a></li>
								<li><a href="#0"><i class="ti-pinterest"></i></a></li>
								<li><a href="#0"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 ml-lg-auto">
						<h5>Useful links</h5>
						<ul class="links">
							<li><a href="about.html">About</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="register.html">Register</a></li>
							<li><a href="blog.html">News &amp; Events</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6">
						<h5>Contact with Us</h5>
						<ul class="contacts">
							<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
							<li><a href="mailto:info@Panagea.com"><i class="ti-email"></i> info@Panagea.com</a></li>
						</ul>
						<div id="newsletter">
						<h6>Newsletter</h6>
						<div id="message-newsletter"></div>
						<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
							<div class="form-group">
								<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
								<input type="submit" value="Submit" id="submit-newsletter">
							</div>
						</form>
						</div>
					</div>
				</div>
				<!--/row-->
				<hr>
				<div class="row">
					<div class="col-lg-6">
						<ul id="footer-selector">
							<li>
								<div class="styled-select" id="lang-selector">
									<select>
										<option value="English" selected>English</option>
										<option value="French">French</option>
										<option value="Spanish">Spanish</option>
										<option value="Russian">Russian</option>
									</select>
								</div>
							</li>
							<li>
								<div class="styled-select" id="currency-selector">
									<select>
										<option value="US Dollars" selected>US Dollars</option>
										<option value="Euro">Euro</option>
									</select>
								</div>
							</li>
							<li><img src="img/cards_all.svg" alt=""></li>
						</ul>
					</div>
					<div class="col-lg-6">
						<ul id="additional_links">
							<li><a href="#0">Terms and conditions</a></li>
							<li><a href="#0">Privacy</a></li>
							<li><span>© 2019 Panagea</span></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
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
		function deletecart(action) {
			let form = document.createElement("form");

			let csrf = document.createElement("input");
			csrf.setAttribute("type", "hidden");
			csrf.setAttribute("name", "_token");
			csrf.setAttribute("value", "{{csrf_token()}}");
			form.append(csrf);

			let method = document.createElement("input");
			method.setAttribute("type", "hidden");
			method.setAttribute("name", "_method");
			method.setAttribute("value", "DELETE");
			form.append(method);

			form.style.display = 'none';
			document.body.appendChild(form);

			form.action = action;
			form.method = "POST";
			form.submit();
		}
	</script>
</body>
</html>