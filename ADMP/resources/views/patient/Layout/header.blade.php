<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{url('Frontend/assets/img/favicon.png')}}" rel="icon">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/css/bootstrap.min.css')}}">
		

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/fontawesome/css/all.min.css')}}">
			
			<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/css/bootstrap-datetimepicker.min.css')}}">
			
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/dropzone/dropzone.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="{{url('Frontend/assets/plugins/fullcalendar/fullcalendar.min.css')}}">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/fancybox/jquery.fancybox.min.css')}}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/plugins/select2/css/select2.min.css')}}">
		
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('Frontend/assets/css/style.css')}}">

		<!--
1 Include jquery File  
-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!--
2 Include these two files 
-->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<!--
3 Call this single function 
-->
<script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>
<script>
	$(document).ready(function() 
	{
		$('#table1').DataTable();
	} );
</script>

		
		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="{{url('Frontend/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{url('Frontend/assets/js/respond.min.js')}}"></script>
		<![endif]-->
	
	</head>
	<body>
	@include('sweetalert::alert')
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{url('/index')}}" class="navbar-brand logo">
							<img src="{{url('Frontend/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{url('/index')}}" class="menu-logo">
								<img src="{{url('Frontend/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="{{url('/index')}}">Home</a>
							</li>
							<li class="">
								<a href="{{url('/about')}}">About</a>
							</li>
							<li class="">
								<a href="{{url('/search')}}">Find Doctor</a>
							</li>
							<li class="">
								<a href="{{url('/contact')}}">Contact</a>
							</li>
							
							@if(Session('patient_id'))
							<li class="has-submenu">
								<a href="#">Patient Dashboard <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="{{url('/patient-dashboard')}}">Dashboard</a></li>
									<li><a href="{{url('/favourites')}}">My Doctor</a></li>
									<li><a href="{{url('/prescription')}}">Prescription</a></li>
									<li><a href="{{url('/report')}}">Medical Report</a></li>
									<li><a href="{{url('/profile-settings')}}">Profile Settings</a></li>
								</ul>
							</li>	
							@else
							@endif
			<!--			<li class="has-submenu">
								<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="{{url('/voice-call')}}">Voice Call</a></li>
									<li><a href="{{url('/video-call')}}">Video Call</a></li>
									<li><a href="{{url('/search')}}">Search Doctors</a></li>
									<li><a href="{{url('/calendar')}}">Calendar</a></li>
									<li><a href="{{url('/components')}}">Components</a></li>
									
									<li><a href="{{url('/blank-page')}}">Starter Page</a></li>
									
									<li><a href="{{url('/forgot-password')}}">Forgot Password</a></li>
								</ul>
							</li>-->
							
							
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						@if(Session('patient_id'))
						<li class="nav-item">
							<a class="nav-link header-login" href="{{url('/patientlogout')}}">Logout</a>
						</li>
						@else
						<li class="nav-item">
							<a class="nav-link header-login" href="{{url('/login')}}">login / Signup </a>
						</li>
						@endif
					</ul>
				</nav>
			</header>
			<!-- /Header -->