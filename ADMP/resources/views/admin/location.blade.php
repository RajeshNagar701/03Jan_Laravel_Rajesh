@extends('admin.Layout.main_layout') 	
@section('main_container')
			
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Location</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Location</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header --->
					
					<div class="row">
						<div class="col-xl-4 d-flex">
							<div class="card flex-fill">
							<h4 class="card-title">Add State</h4>
							@if(session()->has('success'))
												
								<i class="alert alert-success">{{session('success')}}</i>
												
							@endif
								<div class="card-body">
									<form action="{{url('/addstate')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>State</label>
											<input type="text" class="col-lg-9 form-control" name="state_name" placeholder="Enter State">
											@if ($errors->has('state_name'))
            									<span class="text-danger">{{ $errors->first('state_name') }}</span>
       										@endif
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="Send">Submit</button>
										</div>
									</form>
									<hr>
									<div class="table-responsive" style="margin-top:110px">
										<table class="datatable table table-hover table-center mb-0" >
											<thead>
												<tr>
													<th>ID</th>
													<th>State Name</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php
													foreach($state_arr as $data) 
													{
												?>
												<tr>
													<td><?php echo $data->id?></td>
													 <td><?php echo $data->state_name?></td>
													<td class="text-right">
														<div class="actions">
															<a  href="{{url('addstate/'. $data->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
															</a>
														</div>
													</td>
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

						<div class="col-xl-4 d-flex">
							<div class="card flex-fill">
							<h4 class="card-title">Add City</h4>
							@if(session()->has('succes'))
								<i class="alert alert-success">{{session('succes')}}</i>
							@endif
								<div class="card-body">
									<form action="{{url('/addcity')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>State</label>
											<select class="col-lg-9 form-control" name="state">
											<option value="">Select</option>
															<?php
															foreach($state_arr as $d)
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
										<div class="form-group">
											<label>City</label>
											<input type="text" class="col-lg-9 form-control" name="city_name" placeholder="Enter City">
											@if ($errors->has('city_name'))
            									<span class="text-danger">{{ $errors->first('city_name') }}</span>
       										@endif
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="Send">Submit</button>
										</div>
									</form>
									<hr>
									<div class="table-responsive">
										<table id="table" class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>ID</th>
													<th>City Name</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php
													foreach($city_arr as $data) 
													{
												?>
												<tr>
													<td><?php echo $data->id?></td>
												    <td><?php echo $data->city_name?></td>
													<td class="text-right">
														<div class="actions">
															<a  href="{{url('addcity/'. $data->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
															</a>
														</div>
													</td>
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

						<div class="col-xl-4 d-flex">
							<div class="card flex-fill">
							<h4 class="card-title">Add Area</h4>
							@if(session()->has('succe'))
												
								<i class="alert alert-success">{{session('succe')}}</i>
												
							@endif
								<div class="card-body">
									<form action="{{url('/addarea')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>City</label>
											<select class="col-lg-9 form-control" value="" name="city">
											<option value="">Select</option>
															<?php
															foreach($city_arr as $c)
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
										<div class="form-group">
											<label>Area</label>
											<input type="text" name="area_name" class="col-lg-9 form-control" placeholder="Enter Area">
											@if ($errors->has('area_name'))
            									<span class="text-danger">{{ $errors->first('area_name') }}</span>
       										@endif
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="Send">Submit</button>
										</div>
									</form>
									<hr>
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>ID</th>
													<th>Area Name</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php
													foreach($area_arr as $data) 
													{
												?>
												<tr>
													<td><?php echo $data->id?></td>
													 <td><?php echo $data->area_name?></td>
													<td class="text-right">
														<div class="actions">
															<a  href="{{url('addarea/'. $data->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
															</a>
														</div>
													</td>
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