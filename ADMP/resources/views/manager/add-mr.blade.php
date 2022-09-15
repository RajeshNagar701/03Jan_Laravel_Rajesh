@extends('manager.Layout.main_layout') 	
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
									<li class="breadcrumb-item"><a href="{{url('/manager-dashboard')}}">Dashboard</a></li>
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
									<form action="{{url('/manager-add-mr')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-xl-6">
												<h4 class="card-title">Personal Details</h4>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Profile Img</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{old('mrprofile_img')}}" name="mrprofile_img">
														@if ($errors->has('mrprofile_img'))
												    		<span class="text-danger">{{ $errors->first('mrprofile_img')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">First Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('first_name')}}" name="first_name">
														@if ($errors->has('first_name'))
												    		<span class="text-danger">{{ $errors->first('first_name')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Last Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('last_name')}}" name="last_name">
														@if ($errors->has('last_name'))
												    		<span class="text-danger">{{ $errors->first('last_name')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Email</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('email')}}" name="email">
														@if ($errors->has('email'))
												    		<span class="text-danger">{{ $errors->first('email')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Password</label>
													<div class="col-lg-9">
														<input type="password" class="form-control" value="{{old('password')}}" name="password">
														@if ($errors->has('password'))
												    		<span class="text-danger">{{ $errors->first('password')}}</span>
														@endif
													</div>
												</div>
											</div>

											<div class="col-xl-6">
												<h4 class="card-title">Company details</h4>
												<div class="form-group row">
											        <label class="col-lg-3 col-form-label">Company Id</label>
													<div class="col-lg-9">
													<select class="select form-control" value="{{old('company_id')}}" name="company_id">
															<option value="">Select</option>
															<?php
															foreach($company_id_arr as $data)
															{
															?>
															<option value="<?php echo $data->id;?>">
														        <?php echo $data->company_name ?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('company_id'))
												    		<span class="text-danger">{{ $errors->first('company_id')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Company Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('company_name')}}" name="company_name">
														@if ($errors->has('company_name'))
												    		<span class="text-danger">{{ $errors->first('company_name')}}</span>
														@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Visiting Card</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{old('visiting_card')}}" name="visiting_card">
														@if ($errors->has('visiting_card'))
												    		<span class="text-danger">{{ $errors->first('visiting_card')}}</span>
														@endif
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