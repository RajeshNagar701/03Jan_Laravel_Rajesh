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
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
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
							<div class="card card-table">
								<div class="card-body">
								<td class="text-center">
														<div class="table-action" align="right">
															<a href="{{url('/doctor-visitor_slots')}}" class="btn btn-sm bg-info-light">
																<i class="far fa-edit"></i> Add Slots Timings for Visitors
															</a>
														</div>
												</td>
									<!-- Invoice Table -->
									<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Day</th>
													<th>Slot</th>
													<th>Tiiming</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($slots_arr))
											{
												foreach($slots_arr as $data) 
												{
													?>
													<tr>
														<td>
															<a href=""> <?php echo $data->day?></a>
														</td>
														<td>
															<a href=""> <?php echo $data->visitor_slot?></a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="" class="badge bg-success p-2"> <?php echo $data->start_time?> to <?php echo $data->end_time?> </a>
															</h2>
														</td>
														<td class="text-center">
														<div class="table-action">
														<a href="{{url('edit_visitor_slots/'. $data->id)}}" class="btn btn-sm bg-info-light">
																<i class="fa fa-edit"></i> Edit
															</a>
														</div>
												</td>
												<td class="text-center">
														<div class="table-action">
															<a href="{{url('doctor-visitor_slots/'. $data->id)}}" class="btn btn-sm bg-info-light">
																<i class="fa fa-trash"></i> Delete
															</a>
														</div>
												</td>
														
													</tr>

													<?php
													}
												}
												else
												{
												?>
													<tr>
														<td></td>
													</tr>
												<?php	
												}
												?>
                                                
												
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
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

<!-- doccure/{{url('/invoices')}}  30 Nov 2019 04:12:14 GMT -->
</html>
