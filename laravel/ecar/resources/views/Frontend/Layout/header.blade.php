

<!DOCTYPE html>
<html lang="en">
	<head>
		@stack('title')
		<meta charset="utf-8">
		
		<meta name = "format-detection" content = "telephone=no" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="icon" href="{{url('Frontend/images/favicon.ico')}}">
		<link rel="shortcut icon" href="{{url('Frontend/images/favicon.ico')}}" />
		<link rel="stylesheet" href="{{url('Frontend/booking/css/booking.css')}}">
		<link rel="stylesheet" href="{{url('Frontend/css/camera.css')}}">
		<link rel="stylesheet" href="{{url('Frontend/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{url('Frontend/css/style.css')}}">
		<script src="{{url('Frontend/js/jquery.js')}}"></script>
		<script src="{{url('Frontend/js/jquery-migrate-1.2.1.js')}}"></script>
		<script src="{{url('Frontend/js/script.js')}}"></script>
		<script src="{{url('Frontend/js/superfish.js')}}"></script>
		<script src="{{url('Frontend/js/jquery.ui.totop.js')}}"></script>
		<script src="{{url('Frontend/js/jquery.equalheights.js')}}"></script>
		<script src="{{url('Frontend/js/jquery.mobilemenu.js')}}"></script>
		<script src="{{url('Frontend/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{url('Frontend/js/owl.carousel.js')}}"></script>
		<script src="{{url('Frontend/js/camera.js')}}"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="{{url('Frontend/js/jquery.mobile.customized.min.js')}}"></script>
		<!--<![endif]-->
		<script src="{{url('Frontend/booking/js/booking.js')}}"></script>
		<script>
			$(document).ready(function(){
				jQuery('#camera_wrap').camera({
					loader: false,
					pagination: false ,
					minHeight: '444',
					thumbnails: false,
					height: '28.28125%',
					caption: true,
					navigation: true,
					fx: 'mosaic'
				});
				$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
					<img src="http://storage.ie6countdown.com/assets/100/{{url('Frontend/images/banners/warning_bar_0000_us.jpg')}}" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
				</a>
			</div>
			<![endif]-->
		<!--[if lt IE 9]>
			<script src="{{url('Frontend/js/html5shiv.js')}}"></script>
			<link rel="stylesheet" media="screen" href="{{url('Frontend/css/ie.css')}}">
		<![endif]-->
	</head>
	<body class="page1" id="top">
		<div class="main">
<!--==============================header=================================-->
			<header>
			
				<div class="menu_block ">
					<div class="container_12">
						<div class="grid_12">
							<nav class="horizontal-nav full-width horizontalNav-notprocessed">
								<ul class="sf-menu">
									<li ><a href='{{url('/index')}}'>Home</a></li>
									<li><a href="{{url('/about')}}">About</a></li>
									<li><a href="{{url('/adv_car')}}">Book Cars</a></li>
									<li><a href="{{url('/services')}}">Services</a></li>
									<li><a href="{{url('/contact')}}">Contacts</a></li>
									@if(Session('cust_id'))
									<li><a href="{{url('/logout')}}">Logout</a></li>
									<li><a href="{{url('/myaccount')}}">My Account {{session('username')}}</a></li>	
									@else
										<li><a href="{{url('/login')}}">Login</a></li>
									@endif			
									
								</ul>
							</nav>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="container_12">
					<div class="grid_12">
						<h1>
							<a href="index.php">
								<img src="{{url('Frontend/images/logo.png')}}" alt="Your Happy Family">
							</a>
						</h1>
					</div>
				</div>
				<div class="clear"></div>
			</header>
			
			