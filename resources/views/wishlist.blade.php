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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
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
		
		<section class="hero_in tours">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Your Wishlist</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			
		<div class="wrapper-grid">
			<div class="row">
				@foreach ($wishlists as $wishlist)	
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="box_grid">
							<figure>
								<a href="#0" onclick="unwishlist('{{$wishlist['id']}}')" class="wish_bt liked"></a>
								<a href="{{url('room/'.$wishlist['room_id'])}}"><img src="{{$wishlist['thumbnail']}}" class="img-fluid" alt="" width="800" height="533"></a>
								<div class="read_more"><span>Read more</span></div>
							</figure>
							<div class="wrapper">
								<h3><a href="{{url('room/'.$wishlist['room_id'])}}">{{$wishlist['room_name']}}</a></h3>
								<p>{{$wishlist['description']}}</p>
								<span class="price">From <strong>{{$wishlist['price']}}</strong> /per person</span>
							</div>
							<ul>
								<li></li>
								<li><div class="score"><span>Superb<em>{{$wishlist['count']}} Reviews</em></span><strong>{{$wishlist['rating']}}</strong></div></li>
							</ul>
						</div>
					</div>
				@endforeach
			</div>
			<!-- /row -->
			</div>
			<!-- /isotope-wrapper -->
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
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="register.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<script>
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
	
	
</body>
</html>