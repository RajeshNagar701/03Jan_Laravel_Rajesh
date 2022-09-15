@extends('company.Layout.main_layout') 	
@section('main_container')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Doctors</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/company-dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Doctor</li>
								</ul>
								
							</div>
							@if(session()->has('success'))
												
									<i class="alert alert-success">{{session('success')}}</i>
												
								@endif
						</div>
						
					</div>
					<!-- /Page Header -->
					
					<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<div class="col-md-12 col-lg-12 col-xl-12">
						<input class="form-control" id="myInput" type="text" placeholder="Search..">
							<br>
							<div class="myclass row row-grid">
							
							<?php
								foreach($companyfavdoctor_arr as $data) 
								{
							?>

								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="" class="booking-doc-img">
														<img class="rounded-circle" src="{{asset('upload/doctor/'.$data->profile_img)}}" style="margin-left:30px;height:120px;width:120px;" alt="User Image">
													</a>
													<div class="profile-det-info">
														<br><h5 style="margin-left:25px"><a href="">Dr. <?php echo $data->first_name?> <?php echo $data->last_name?></a></h5>
														
														<div class="patient-details">
															<h6 style="margin-left:50px"><b>Doctor ID :</b> <?php echo $data->doctor_id?></h6>
															<h6 style="margin-left:10px" class="mb-0"><i class="fe fe-location"></i> <?php echo $data->city_name?>, <?php echo $data->state_name?></h6>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info ">
											<br><ul>
													<h6><b>Phone :</b> <?php echo $data->dr_mobile?><br></h6>
													<h6 ><b>Age :</b> 38 Years, <?php echo $data->gender?></h6>
													
												</ul>
											</div>
											
										</div>
									</div>
								</div>
							<?php
								}
							?>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
							</div>

						</div>
					</div>

				</div>

			</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".myclass .card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{url('Backend/assets/js/jquery-3.2.1.min.js')}}"></script>

			
		<!-- Bootstrap Core JS -->
        <script src="{{url('Backend/assets/js/popper.min.js')}}"></script>
        <script src="{{url('Backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Datatables JS -->
		<script src="{{url('Backend/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{url('Backend/assets/plugins/datatables/datatables.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('Backend/assets/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin-doctor-list')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->
</html>
@endsection