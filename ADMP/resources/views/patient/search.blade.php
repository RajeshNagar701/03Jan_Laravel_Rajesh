@extends('patient.Layout.main_layout') 	
@section('main_container')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								
								<div class="filter-widget">
									<label>State</label>
									<select class="col-lg-11 form-control" name="state">
										<option value="">Select</option>
									</select>
								</div>
								<div class="filter-widget">
									<label>City</label>
									<select class="col-lg-11 form-control" name="state">
										<option value="">Select</option>
									</select>
								</div>
								<div class="filter-widget">
									<label>Area</label>
									<select class="col-lg-11 form-control" name="state">
										<option value="">Select</option>
									</select>
								</div>
								<div class="filter-widget">
									<label>Specialist</label>
									<select class="col-lg-11 form-control" name="state">
										<option value="">Select</option>
									</select>
								</div>

									<div class="btn-search">
										<button type="button" class="btn btn-block">Search</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

						<?php
						foreach($doctorlist_arr as $data)
						{
						?>
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="{{url('/doctor-profile')}}">
													<img src="{{asset('upload/doctor/' . $data->profile_img)}}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="{{url('/doctor-profile')}}">Dr. <?php echo $data->first_name?> <?php echo $data->last_name?></a></h4>
												<p class="doc-speciality"><?php echo $data->short_tittle?></p>
												<h5 class="doc-department"><img src="{{asset('upload/specialities/' . $data->img)}}" class="img-fluid" alt="Speciality"><?php echo $data->name?></h5>
												
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $data->city?>, <?php echo $data->state?></p>
													<ul class="clinic-gallery">
													<?php
														$hospital_img=$data->hospital_img;
														$hosp_img_arr=explode(",",$hospital_img);
								
														foreach($hosp_img_arr as $d)
														{
														?>
														<li>
															<a href="{{asset('upload/hospital/'.$d)}}" data-fancybox="gallery">
																<img src="{{asset('upload/hospital/'.$d)}}" alt="Feature">
															</a>
														</li>
														<?php
														}
														?>
													</ul>
												</div>
												
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="fas fa-map-marker-alt"></i> <?php echo $data->city?>, <?php echo $data->state?></li>
													<li><i class="far fa-money-bill-alt"></i> Consulting Fees: <?php echo $data->consulting_fees?>  </li>
													<li><i class="far fa-money-bill-alt"></i> Followup Fees: <?php echo $data->followup_fees?>  </li>
												
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="{{url('doctor-profile/'.$data->id)}}">View Profile</a>
												<a class="apt-btn" href="{{url('/booking/'.$data->id)}}">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<?php
							}
							?>

							

							<div class="load-more text-center">
								<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
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
		
		<!-- Select2 JS -->
		<script src="{{  url('Frontend/assets/plugins/select2/js/select2.min.js') }}"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{  url('Frontend/assets/js/moment.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
		
		<!-- Fancybox JS -->
		<script src="{{  url('Frontend/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

</html>
