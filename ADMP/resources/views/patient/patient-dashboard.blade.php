@extends('patient.Layout.main_layout') 	
@section('main_container')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								
								@include('patient.Layout.patient-widget')
								
							</div>
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
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
																	foreach($doc_appointments_arr as $data)
																	{
																	?>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="{{url('/doctor-profile')}}" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{asset('upload/doctor/' . $data->profile_img)}}" alt="User Image">
																			</a>
																			<a href="{{url('/doctor-profile')}}">Dr. <?php echo $data->first_name?> <?php echo $data->last_name?> <span><?php echo $data->name?></span></a>
																		</h2>
																	</td>
																	<td><?php echo $data->date?> <span class="d-block text-info"><?php echo $data->time?></span></td>
																	<td><?php echo $data->comment?> </td>
																	<td><span class="badge badge-pill bg-success-light"><?php echo $data->appointment_status?></span></td>
															<?php
																	if($data->appointment_status=="Approved")
																	{
																	?>
																	<td class="text-right">
																		<div class="table-action">

																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																	<?php
																	}
																	else
																	{
																	?>
																	<td class="text-right">
																		<div class="table-action">
																			
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="fas fa-times"></i> Cancel
																			</a>
																		</div>
																	</td>
																	<?php
																}
																?>
																</tr>
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
										
										
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			@endsection
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ url('Frontend/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{  url('Frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

<!-- doccure/{{url('/patient-dashboard')}}  30 Nov 2019 04:12:16 GMT -->
</html>
	