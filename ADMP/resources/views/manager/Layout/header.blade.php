<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/Backend/assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('Backend/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('Backend/assets/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{url('Backend/assets/css/feathericon.min.css')}}">
		
		<link rel="stylesheet" href="{{url('Backend/assets/plugins/morris/morris.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('Backend/assets/css/style.css')}}">
		
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


		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('Backend/assets/css/select2.min.css')}}">
		
		
		<!--[if lt IE 9]>
			<script src="{{url('Backend/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{url('Backend/assets/js/respond.min.js')}}"></script>
		<![endif]-->
    </head>
    <body>
	@include('sweetalert::alert')
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('/admin')}}" class="logo">
						<img src="{{url('/Backend/assets/img/logo.png')}}" alt="Logo">
					</a>
					<a href="{{url('/admin')}}" class="logo logo-small">
						<img src="{{url('/Backend/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{url('/Backend/assets/img/doctors/doctor-thumb-01.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{url('/Backend/assets/img/patients/patient1.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{url('/Backend/assets/img/patients/patient2.jpg')}}">
												</span>
												<div class="media-body">
												<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{url('/Backend/assets/img/patients/patient3.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{url('upload/manager/'. Session('mprofile_img'))}}" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{url('upload/manager/'. Session('mprofile_img'))}}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>{{Session('mname')}}</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="{{url('/manager-profile')}}">My Profile</a>
							<a class="dropdown-item" href="{{url('/manager-settings')}}">Settings</a>
							<a class="dropdown-item" href="{{url('/managerlogout')}}">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="{{url('/manager')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>

							

							<li> 
								<a href="{{url('/manager-medicine-manager')}}"><i class="fe fe-plus"></i> <span>Medicine</span></a>
							</li>
							
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-user"></i> <span>Doctor</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li>
											<a href="{{url('/manager-doctor')}}"><i class="fe fe-user"></i> <span>Manage Doctors</span></a>
									</li>
									<li class="submenu">
										<a href="javascript:void(0);"><i class="fe fe-calendar"></i> <span>Appointment</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="{{url('/manager-doctor-appointment')}}"><span>Approve</span></a></li>
											
											<li><a href="{{url('/manager-doctor-cancel-appointment')}}"> <span>Cancel</span></a></li>
										</ul>
									</li>
									
								</ul>
							</li>
							
							
							
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-user"></i> <span>MR</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li>
											<a href="{{url('/manager-mr')}}"><i class="fe fe-user"></i> <span>Manage MR</span></a>
									</li>
									<li>
											<a href="{{url('/manager-add-mr')}}"><i class="fe fe-user"></i> <span>Add MR</span></a>
									</li>
									
								</ul>
							</li>

							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-activity"></i> <span>Stockiest</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li>
											<a href="{{url('/manager-add-stockiest')}}"><i class="fe fe-activity"></i> <span>Add Stockiest</span></a>
									</li>
									<li> 
								<a href="{{url('/manager-stockiest')}}"><i class="fe fe-activity"></i> <span>Manage Stockiest</span></a>
							</li>
									
								</ul>
							</li>
									
							
							
							
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->