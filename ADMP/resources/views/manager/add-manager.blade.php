@extends('manager.Layout.main_layout') 	
@section('main_container')
			
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Health Manager</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/company-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Manager</li>
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
									<h4 class="card-title">Add Manager</h4>
								</div>
								<div class="card-body">
									<form action="{{url('/company-add-manager')}}" method="post" enctype="multipart/form-data">
									@csrf	
									<div class="row">
											<div class="col-xl-6">
												<h4 class="card-title">Personal Details</h4>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Profile Img</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{old('mprofile_img')}}" name="mprofile_img">
														@if ($errors->has('mprofile_img'))
												    		<span class="text-danger">{{ $errors->first('mprofile_img')}}</span>
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
														<input type="text" class="form-control"value="{{old('last_name')}}" name="last_name">
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
												
												<div class="form-group row" style="margin-top:40px">
											        <label class="col-lg-3 col-form-label">Division </label>
													<div class="col-lg-9">
													<select class="form-control select" name="division_id" value="{{old('division_id ')}}">
															<option value="">Select</option>
															<?php
															foreach($division_id_arr as $data)
															{
															?>
															<option value="<?php echo $data->id;?>">
														        <?php echo $data->division_name?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('division_id '))
												    		<span class="text-danger">{{ $errors->first('division_id ')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Manager Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('Manager_name')}}" name="Manager_name">
														@if ($errors->has('Manager_name'))
												    		<span class="text-danger">{{ $errors->first('Manager_name')}}</span>
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