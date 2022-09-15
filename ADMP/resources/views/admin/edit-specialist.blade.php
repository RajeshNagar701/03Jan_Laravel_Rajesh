@extends('admin.Layout.main_layout') 	
@section('main_container')
			
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Add Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Specialities</li>
								</ul>
							</div>
							@if(session()->has('success'))
												
								<i class="alert alert-success">{{session('success')}}</i>
												
							@endif
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-xl-6 d-flex">
							<div class="card flex-fill">
								
								<div class="card-body">
									<form action="{{url('/edit-specialist/'.$fetch->id )}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> Name</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="name" value="<?php echo $fetch->name?>">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-lg-3 col-form-label"> Img</label>
												<div class="col-lg-9">
													<input type="file" class="form-control" name="img" value="{{asset('upload/doctor/'.$fetch->img)}}">
													<img src="{{asset('upload/specialities/'.$fetch->img)}}" height="50px" width="50px">
												</div>
										</div>
										
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="Send">Submit</button>
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