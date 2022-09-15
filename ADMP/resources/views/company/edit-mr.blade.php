@extends('company.Layout.main_layout') 	
@section('main_container')
			
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title"> MR</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/company-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add MR</li>
								</ul>
							</div>
							@if(session()->has('success'))
												
								<i class="alert alert-success">{{session('success')}}</i>
												
							@endif
						</div>
					</div>
					<!-- /Page Header -->
					
					

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add MR</h4>
								</div>
								<div class="card-body">
									<form action="{{url('/company-edit-mr/'.$fetch->id)}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-xl-6">
												<h4 class="card-title">Personal Details</h4>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Profile Img</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" name="mrprofile_img" value="{{asset('upload/mr/'.$fetch->mrprofile_img)}}">
														<img src="{{asset('upload/mr/'.$fetch->mrprofile_img)}}" height="50px" width="50px">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">First Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="first_name" value="<?php echo $fetch->first_name?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Last Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="last_name" value="<?php echo $fetch->last_name?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Email</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="email" value="<?php echo $fetch->email?>">
													</div>
												</div>
												
											</div>

											<div class="col-xl-6">
												<h4 class="card-title">Company details</h4>
												<div class="form-group row">
											        <label class="col-lg-3 col-form-label">Company Id</label>
													<div class="col-lg-9">
													<select class="select" name="company_id" value="<?php echo $fetch->company_name?>">
															<option value="">Select Company</option>
															<?php
															foreach($company_id_arr as $data)
															{
																if($data->id==$fetch->company_id)
															 	{
															?>
															<option value="<?php echo $data->id;?>" selected>
														        <?php echo $data->company_name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $data->id;?>">
                                                            <?php echo $data->company_name;?></option>
															<?php
															    }
														    }
														  ?>
													</select>
													
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Company Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="company_name" value="<?php echo $fetch->company_name?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Manager Id</label>
													<div class="col-lg-9">
													<select class="select" name="manager_id" value="<?php echo $fetch->Manager_name?>">
															<option value="">Select Manager</option>
															<?php
															foreach($manager_id_arr as $data)
															{
																if($data->id==$fetch->manager_id)
															 	{
															?>
															<option value="<?php echo $data->id;?>" selected>
														        <?php echo $data->Manager_name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $data->id;?>">
                                                            <?php echo $data->Manager_name;?></option>
															<?php
															    }
														    }
														  ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Visiting Card</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" name="visiting_card" value="{{asset('upload/visitingcard/'.$fetch->visiting_card)}}">
														<img src="{{asset('upload/visitingcard/'.$fetch->visiting_card)}}" height="50px" width="50px">
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="send">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{url('Backend/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{url('Backend/assets/js/popper.min.js')}}"></script>
        <script src="{{url('Backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Select2 JS -->
		<script src="{{url('Backend/assets/js/select2.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('Backend/assets/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin-form-horizontal')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:55 GMT -->
</html>
@endsection