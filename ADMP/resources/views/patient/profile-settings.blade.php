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
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
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
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form action="{{url('/editpatient/{id}')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														

													<?php
														$ptprofile_img=$fetch->ptprofile_img;
														if($ptprofile_img=="null")
														{
													?>
														<div class="profile-img">
															<img src="{{url('Frontend/assets/img/patients/user.png')}}" height="50px" width="50px">
														</div>
													<?php
														}
														else
														{
													?>
														<div class="profile-img">
															<img src="{{asset('upload/patient/'.$fetch->ptprofile_img)}}" height="50px" width="50px">
														</div>
													<?php
														}
													?>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="ptprofile_img" value="{{asset('upload/patient/'.$fetch->ptprofile_img)}}">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input type="text" class="form-control" value="<?php echo $fetch->name?>" name="name">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control select" name="gender">
												<?php
													$gender=$fetch->gender;
													if($gender=="Male")
														{
												?>
														<option>Select Gender</option>
														<option value="Male" selected>Male</option>
														<option>Female</option>
												<?php
														}
													else
														{
												?>
														<option>Select Gender</option>
														<option >Male</option>
														<option value="Female" selected>Female</option>
												<?php
														}
												?>
												</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" value="<?php echo $fetch->email?>" name="email" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" value="<?php echo $fetch->mobileno?>" name="mobileno" class="form-control">
												</div>
											</div>
										<!--	<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control" value="806 Twin Willow Lane">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" value="Old Forge">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" value="Newyork">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" class="form-control" value="13420">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="United States">
												</div>
											</div>-->
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn" name="submit" value="send">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{  url('Frontend/assets/js/moment.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

<!-- doccure/{{url('/profile-settings')}}  30 Nov 2019 04:12:18 GMT -->
</html>
