<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>PANAGEA - Update</title>
	
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
  <!-- Plugin styles -->
  {{-- <link href="{{ asset('admin-style/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('admin-style/vendor/dropzone.css') }}" rel="stylesheet">
  <link href="{{ asset('admin-style/css/date_picker.css') }}" rel="stylesheet">
  <!-- WYSIWYG Editor -->
  {{-- <link rel="stylesheet" href="{{ asset('admin-style/js/editor/summernote-bs4.css') }}"> --}}
  <!-- Your custom styles -->
  <link href="{{ asset('admin-style/css/custom.css') }}" rel="stylesheet">
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  @extends('layout.admin.nav')
  <!-- /Navigation-->

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<!-- TODO: breadcrumb jadikan server side -->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Add listing</li>
			</ol>

			<div class="box_general padding_bottom">
				<div class="header_box version_2">
					<h2><i class="fa fa-file"></i>Basic info</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Room Name</label>
							<input type="text" class="form-control" name="name">
						</div>
					</div>
				</div>
				<!-- /row-->

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<!-- /row-->

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Max People</label>
							<input type="number" class="form-control" name="maxpeople" min="1">
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- TODO: pakai WYSIWYG nggak? -->

				<!-- TODO: pakai info telepon atau nggak -->

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Thumbnail</label>
							<div id="thumbnail" class="dropzone dropzone-previews"></div>
						</div>
					</div>
				</div>
					
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Photos</label>
							<div id="photos" class="dropzone dropzone-previews"></div>
						</div>
					</div>
				</div>
				<!-- /row-->
			</div>
			<!-- /box_general-->
			
			<div class="box_general padding_bottom">
				<div class="header_box version_2">
					<h2><i class="fa fa-map-marker"></i>Location</h2>
				</div>
				<!-- /row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Floor</label>
							<input type="text" class="form-control" name="floor">
						</div>
					</div>
				</div>
				<!-- /row-->
			</div>
			<!-- /box_general-->

			
			{{-- BEGIN open time --}}
			{{--
			<div class="box_general padding_bottom">
				<!-- TODO: get opening data from database-->
				<div class="header_box version_2">
					<h2><i class="fa fa-clock-o"></i>Opening</h2>
				</div>
				<div class="row">
					<div class="col-md-2">
						<label class="fix_spacing">Monday</label>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Opening Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Closing Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
				</div>
				<!-- /row-->
				<div class="row">
					<div class="col-md-2">
						<label class="fix_spacing">Tuesday</label>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Opening Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Closing Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
				</div>
				<!-- /row-->
				<div class="row">
					<div class="col-md-2">
						<label class="fix_spacing">Wednesday</label>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Opening Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Closing Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
				</div>
				<!-- /row-->
				<div class="row">
					<div class="col-md-2">
						<label class="fix_spacing">Thursday</label>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Opening Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<div class="styled-select">
							<select>
								<option>Closing Time</option>
								<option>Closed</option>
								<option>1 AM</option>
								<option>2 AM</option>
								<option>3 AM</option>
								<option>4 AM</option>
								<option>5 AM</option>
								<option>6 AM</option>
								<option>7 AM</option>
								<option>8 AM</option>
								<option>9 AM</option>
								<option>10 AM</option>
								<option>11 AM</option>
								<option>12 AM</option>	
								<option>1 PM</option>
								<option>2 PM</option>
								<option>3 PM</option>
								<option>4 PM</option>
								<option>5 PM</option>
								<option>6 PM</option>
								<option>7 PM</option>
								<option>8 PM</option>
								<option>9 PM</option>
								<option>10 PM</option>
								<option>11 PM</option>
								<option>12 PM</option>
							</select>
							</div>
						</div>
					</div>
				</div>
				<!-- /row-->
			</div>
			--}}
			{{-- END open time --}}
			<!-- /box_general-->
			
			<div class="box_general padding_bottom">
				<div class="header_box version_2">
					<h2><i class="fa fa-dollar"></i>Pricing</h2>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="number" class="form-control" name="price" min="1" step="any">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row-->
			</div>
			<!-- /box_general-->
			<button class="btn_1 medium" id="save">Save</button>
		</div>
		<!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
		<div class="container">
			<div class="text-center">
			<small>Copyright © PANAGEA 2018</small>
			</div>
		</div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
		<i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @extends('layout.admin.logout')
</body>
<script src="{{ asset('admin-style/vendor/dropzone.min.js') }}"></script>
<script>
	Dropzone.autoDiscover = false;
	let thumbnail = new Dropzone("div#thumbnail", {
					url: "/images/update/{{ $room->id }}",
					autoProcessQueue: false,
					addRemoveLinks: true,
					maxFiles: 1,
					headers: {
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					}
				})
	thumbnail.on('sending', function(file, xhr, formData){
		formData.append('thumbnail', 'true');
	});

	let photos = new Dropzone("div#photos", { 
					url: "/images/update/{{ $room->id }}",
					autoProcessQueue: false,
					addRemoveLinks: true,
					parallelUploads: 8,
					maxFiles: 8,
					headers: {
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					}
				});
	photos.on('sending', function(file, xhr, formData){
		formData.append('thumbnail', 'false');
	});

</script>
<script>
	let saveBtn = document.querySelector("#save")
	
	saveBtn.addEventListener('click', function() {
		let payload = {
			id: "{{ $room->id }}",
			description: document.querySelector('textarea[name="description"]').value,
			name: document.querySelector('input[name="name"]').value,
			maxpeople: document.querySelector('input[name="maxpeople"]').value,
			floor: document.querySelector('input[name="floor"]').value,
			price: document.querySelector('input[name="price"]').value
		}

		thumbnail.processQueue()
		photos.processQueue()

		fetch("/admin/update-listing/{{ $room->id }}", {
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				'Content-Type': 'application/json',
				'Accept': 'text/plain'
			},
			body: JSON.stringify(payload),
		}).then((res) => {
			if(res.ok) {
				window.location.reload()
				return
			}

			return res.text()
		}).then((e) => {
			if(e) {
				alert(e)
			}
		})
		.catch(e => console.error(e))
	})
</script>
<script src="{{ asset('admin-style/vendor/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('admin-style/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
<script src="{{ asset('admin-style/vendor/jquery.selectbox-0.2.js') }}" defer></script>
<script src="{{ asset('admin-style/js/admin.js') }}" defer></script>
</html>
