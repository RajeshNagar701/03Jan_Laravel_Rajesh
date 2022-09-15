@extends('doctor.Layout.main_layout') 	
@section('main_container')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								
								@include('doctor/Layout/doctor-widget');
								
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
						
						<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Pending Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Completed Appointments</a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table id="table" class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Comment</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
															<?php
																	foreach($appointments_arr as $data)
																	{
																	?>
																<?php
																	if($data->appointment_status=="Pending")
																	{
																	?>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="{{url('/doctor-profile')}}" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{url('upload/patient/'. $data->ptprofile_img)}}" alt="User Image">
																			</a>
																			<a href="{{url('/doctor-profile')}}"><?php echo $data->name?> <span><?php echo $data->name?></span></a>
																		</h2>
																	</td>
																	<td><?php echo $data->date?> <span class="d-block text-info"><?php echo $data->time?></span></td>
																	<td><?php echo $data->comment?> </td>
																	<td><span class="badge badge-pill bg-success-light"><?php echo $data->appointment_status?></span></td>
															
																	<td class="text-right">
																		<div class="table-action">

																		<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
																			<i class="far fa-eye"></i> View
																		</a>
																		<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																			<i class="fas fa-check"></i> Accept
																		</a>
																		<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																			<i class="fas fa-times"></i> Cancel
																		</a>
																		</div>
																	</td>
																	
																	
																	
																</tr>
																<?php
																	}
																	
																	?>
															<?php
															}
															?>
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pat_prescriptions">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
													<table id="table1" class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Comment</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
															<?php
																	foreach($appointments_arr as $data)
																	{
																	?>
																<?php
																	if($data->appointment_status=="Approved")
																	{
																	?>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="{{url('/doctor-profile')}}" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{url('upload/patient/'. $data->ptprofile_img)}}" alt="User Image">
																			</a>
																			<a href="{{url('/doctor-profile')}}"><?php echo $data->name?> <span><?php echo $data->name?></span></a>
																		</h2>
																	</td>
																	<td><?php echo $data->date?> <span class="d-block text-info"><?php echo $data->time?></span></td>
																	<td><?php echo $data->comment?> </td>
																	<td><span class="badge badge-pill bg-success-light"><?php echo $data->appointment_status?></span></td>
															
																	<td class="text-right">
																		<div class="table-action">

																		<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
																			<i class="far fa-eye"></i> View
																		</a>
																		
																		</div>
																	</td>
																	
																	
																	
																</tr>
																<?php
																	}
																	
																	?>
															<?php
															}
															?>
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>	<!-- /Prescription Tab -->
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="{{url('Frontend/assets/img/footer-logo.png')}}" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="{{url('/search')}}"><i class="fas fa-angle-double-right"></i> Search for Doctors</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="{{url('/booking')}}"><i class="fas fa-angle-double-right"></i> Booking</a></li>
										<li><a href="{{url('/patient-dashboard')}}"><i class="fas fa-angle-double-right"></i> Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="{{url('/appointments')}}"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										<li><a href="{{url('/chat')}}"><i class="fas fa-angle-double-right"></i> Chat</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="{{url('/doctor-register')}}"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="{{url('/doctor-dashboard')}}"><i class="fas fa-angle-double-right"></i> Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="{{url('/term-condition')}}">Terms and Conditions</a></li>
											<li><a href="{{url('/privacy-policy')}}">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT0001</span>
											<span class="text">21 Oct 2019 10:00 AM</span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text">Completed</span>
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">29 Jun 2019</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">$450</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
	  
		
		
		<!-- Bootstrap Core JS -->
		<script src="{{  url('Frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

<!-- doccure/{{url('/appointments')}}  30 Nov 2019 04:12:09 GMT -->
</html>
@endsection	