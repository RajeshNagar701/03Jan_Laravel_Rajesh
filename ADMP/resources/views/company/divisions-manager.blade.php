@extends('company.Layout.main_layout') 	
@section('main_container')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Divisions</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/company-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Divisions </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="col-md-9 col-lg-9 col-xl-10">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-5 col-lg-5">
										<h4 class="card-title">Add Division</h4>
										@if(session()->has('succes'))
											<i class="alert alert-success">{{session('succes')}}</i>
										@endif
										<form action="{{url('/companyadddivision')}}" method="post" enctype="multipart/form-data"> 
											@csrf
											<div class="form-group">
												<label>Division</label>
												<input type="text" class="form-control" name="division_name" >
												@if ($errors->has('division_name'))
            										<span class="text-danger">{{ $errors->first('division_name') }}</span>
       											@endif
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn" name="submit" value="send">Add Division</button>
											</div>
										</form>
										<hr>	
										@if(session()->has('succ'))
											<i class="alert alert-success">{{session('succ')}}</i>
										@endif	
												<div class="table-responsive">
													<table class="datatable table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>ID</th>
																<th>Division Name</th>
																<th class="text-right">Actions</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach($division as $division) 
																{
															?>
															<tr>
																<td><?php echo $division->id?></td>
																<td><?php echo $division->division_name?></td>
																<td class="text-right">
																	<div class="actions">
																		<a  href="{{url('companyadddivision/'. $division->id)}}" class="btn btn-sm bg-danger-light">
																			<i class="fe fe-trash"></i> Delete
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

									<div class="col-md-1 col-lg-1">
									</div>

					
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

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin-blank-page')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>
@endsection