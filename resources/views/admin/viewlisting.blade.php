<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>PANAGEA - View</title>
		
	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
		
	<!-- Bootstrap core CSS-->
	<link href="{{ asset('admin-style/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Main styles -->
	<link href="{{ asset('admin-style/css/admin.css') }}" rel="stylesheet">
	<!-- Icon fonts-->
	<link href="{{ asset('admin-style/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Your custom styles -->
	<link href="{{ asset('admin-style/css/custom.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  	<!-- Navigation-->
	@extends('layout.admin.nav')

	<!-- Container Wrapper -->
	<div class="content-wrapper">
		<!-- Container -->
		<div class="container-fluid">
			<!-- Box General -->
			<div class="box_general">
				<!-- Container -->
				<div class="container">
					
					<div class="row">
						<div class="col-3">
							{{-- ini rencananya carousel gambar --}}
						</div>
						<div class="col-9">
							<div class="row">
								<div class="col-6">
									Name
								</div>
								<div class="col-6">
									{{ $room->room_name }}
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-6">Location</div>
								<div class="col-6">{{ $room->location }}</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-6">Description</div>
								<div class="col-6">{{ $room->description }}</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-6">maxpeople</div>
								<div class="col-6">{{ $room->maxpeople }}</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-6">Price</div>
								<div class="col-6">${{ $room->price }}</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-6">{{-- Empty for layout --}}</div>
								<div class="col-6">
									<a
									  href="{{ url("/admin/update-listing/{$room->id}") }}"
									  class="btn btn-primary text-white"
									  style="position: relative; bottom:18px">
									    Update
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fa fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	@extends('layout.admin.logout')
	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('admin-style/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- Core plugin JavaScript-->
	<script src="{{ asset('admin-style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<!-- Page level plugin JavaScript-->
	<script src="{{ asset('admin-style/vendor/jquery.selectbox-0.2.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/retina-replace.min.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/jquery.magnific-popup.min.js') }}"></script>
	<!-- Custom scripts for all pages-->
	<script src="{{ asset('admin-style/js/admin.js') }}"></script>
  
</body>
</html>