@extends('company.Layout.main_layout') 	
@section('main_container')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/company-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" style="height:100px;width:100px;" src="{{asset('upload/companyprofile/'.$fetch->cprofile_img)}}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $fetch->first_name;?>&nbsp;&nbsp;<?php echo $fetch->last_name;?></h4>
										<h6 class="text-muted"><?php echo $fetch->email;?></h6>
										<h6 class="text-muted"><?php echo $fetch->company_name;?></h6><br>
										</div>	
									<div class="col ml-md-n2 profile-user-info">
									<h6 class="text-muted">Visiting Card</h6><img  style="height:50px;width:500px;" src="{{asset('upload/visitingcard/'.$fetch->visiting_card)}}">
									</div>
									<div>
									<h5 class="card-title d-flex justify-content-between">
										<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
									</h5>
									</div>
								</div>
							</div>
							
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="{{url('/company-profile/'.$fetch->id )}}" method="post" enctype="multipart/form-data">
															@csrf	
															<div class="row form-row">
																	<div class="col-12 ">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text"  class="form-control" name="first_name" value="<?php echo $fetch->first_name;?>">
																		</div>
																	</div>

																	<div class="col-12 ">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text"  class="form-control" name="last_name" value="<?php echo $fetch->last_name;?>">
																		</div>
																	</div>

																	<div class="col-12 ">
																		<div class="form-group">
																			<label>Company Name</label>
																			<input type="text"  class="form-control" name="company_name" value="<?php echo $fetch->company_name;?>">
																		</div>
																	</div>
																	
																	<div class="col-12 ">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" name="email" value="<?php echo $fetch->email;?>" readonly>
																		</div>
																	</div>

																	<div class="col-12 ">
																		<div class="form-group">
																			<label>Profile image</label>
																			
																			<input type="file" class="form-control"  name="cprofile_img" value="{{asset('upload/companyprofile/'.$fetch->cprofile_img)}}">
                                                        					<img src="{{asset('upload/companyprofile/'.$fetch->cprofile_img)}}" height="70px" width="70px">
																		</div>
																	</div>

																	<div class="col-12 ">
																		<div class="form-group">
																			<label>Visiting Card</label>
																			
																			<input type="file" class="form-control"  name="visiting_card" value="{{asset('upload/visitingcard/'.$fetch->visiting_card)}}">
                                                        					<img src="{{asset('upload/visitingcard/'.$fetch->visiting_card)}}" height="70px" width="70px">
																		</div>
																	</div>

																	
																	
																<button type="submit" name="update "send="value" class="btn btn-primary btn-block">Update</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="{{url('/')}}">
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="new_password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="confirm_password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{url('Backend/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{url('Backend/assets/js/popper.min.js')}}"></script>
        <script src="{{url('Backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('Backend/assets/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin-profile')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>
@endsection