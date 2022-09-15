@extends('manager.Layout.main_layout') 	
@section('main_container')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Medicine</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/manager-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Medicine</li>
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
										<h4 class="card-title">Add Medicine</h4>
										@if(session()->has('success'))
											<i class="alert alert-success">{{session('success')}}</i>
										@endif
										<form action="{{url('/manageraddmedicine')}}" method="post" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label>Medicine</label>
												<input type="text" class="form-control" name="medicine_name" >
												@if ($errors->has('medicine_name'))
            										<span class="text-danger">{{ $errors->first('medicine_name') }}</span>
       											@endif
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn" name="submit" value="send">Add Medicine</button>
											</div>
										</form>	
										<hr>
										@if(session()->has('suc'))
											<i class="alert alert-success">{{session('suc')}}</i>
										@endif
												<div class="table-responsive">
													<table class="datatable table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>ID</th>
																<th>Medicine Name</th>
																<th class="text-right">Actions</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach($medicine as $medicine) 
																{
															?>
															<tr>
																<td><?php echo $medicine->id?></td>
																<td><?php echo $medicine->medicine_name?></td>
																<td class="text-right">
																	<div class="actions">
																		<a  href="{{url('manageraddmedicine/'. $medicine->id)}}" class="btn btn-sm bg-danger-light">
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