@extends('manager.Layout.main_layout') 	
@section('main_container')
			
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Stockiest</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/manager-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Stockiest</li>
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
									<h4 class="card-title">Add Stockiest</h4>
								</div>
								<div class="card-body">
									<form action="{{url('/manager-add-stockiest')}}" method="post" enctype="multipart/form-data">
									@csrf	
									<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="name" value="{{old('name')}}">
														@if ($errors->has('name'))
            												<span class="text-danger">{{ $errors->first('name') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<select class="select"  name="state">
															<option value="">Select</option>
															<?php
															foreach($state_id_arr as $d)
															{
															?>
															<option value="<?php echo $d->id;?>">
															       <?php echo $d->state_name ?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('state'))
            												<span class="text-danger">{{ $errors->first('state') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<select class="select"  name="city">
															<option value="">Select</option>
															<?php
															foreach($city_id_arr as $c)
															{
															?>
															<option value="<?php echo $c->id;?>">
														       <?php echo $c->city_name ?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('city'))
            												<span class="text-danger">{{ $errors->first('city') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area</label>
													<div class="col-lg-9">
														<select class="select"  name="area">
															<option value="">Select</option>
															<?php
															foreach($area_id_arr as $a)
															{
															?>
															<option value="<?php echo $a->id;?>">
														       <?php echo $a->area_name ?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('area'))
            												<span class="text-danger">{{ $errors->first('area') }}</span>
       													@endif
													</div>
												</div>
											</div>

											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<textarea name="address" rows="4"  class="form-control"value="{{old('address')}}" ></textarea>
														@if ($errors->has('address'))
            												<span class="text-danger">{{ $errors->first('address') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Postal Code</label>
													<div class="col-lg-9">
														<input type="text" class="form-control"  name="pincode" value="{{old('pincode')}}">
														@if ($errors->has('pincode'))
            												<span class="text-danger">{{ $errors->first('pincode') }}</span>
       													@endif
													</div>
												</div>
												
											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="send">Submit</button>
										</div>
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