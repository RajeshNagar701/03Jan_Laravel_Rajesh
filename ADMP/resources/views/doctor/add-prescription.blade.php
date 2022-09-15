@extends('doctor.Layout.main_layout') 	
@section('main_container')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Prescription</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Add Prescription</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Widget -->
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="{{asset('upload/patient/' . $pdata->ptprofile_img)}}" alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3><a href="{{url('/patient-profile')}}"><?php echo $pdata->name?> </a></h3>
												<div class="patient-details">
													<h5><b>Patient ID :</b> <?php echo $pdata->id?></h5>
													<h5 class="mb-0"><i class="fas fa-map-email-alt"></i><?php echo $pdata->email?></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
										<ul>
											<li>Phone <span><?php echo $pdata->mobileno?></span></li>
											<li>Gender <span> <?php echo $pdata->gender?></span></li>
											
										</ul>
									</div>
								</div>
							</div>
							<!-- /Profile Widget -->
							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-header">
								
												<h4 class="card-title mb-0">Add Prescription</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="biller-info">
												<h4 class="d-block">Dr. Darren Elder {{Session('drname')}}</h4>
												<span class="d-block text-sm text-muted">Dentist</span>
												<span class="d-block text-sm text-muted">Newyork, United States</span>
											</div>
										</div>
										<div class="col-sm-6 text-sm-right">
											<div class="billing-info">
												<h4 class="d-block">Date : <?php echo (new DateTime())->format('d-m-Y'); ?></h4>
												<span class="d-block text-muted">Appointment id : {{$app_data->id}}</span>
											</div>
										</div>
									</div>
									
									
<div id="accordion">
	<form action="{{url('/add-prescription/'.$app_data->id)}}" method="post" enctype="multipart/form-data"> 
	@csrf
    <div class="card">
			<div class="card-header">
				<a class="btn" data-bs-toggle="collapse" href="#collapseOne">
					<b>Add diagnosis reports</b>
				</a>
			</div>
			<div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
			<div class="card card-table">
			<div class="table-responsive">
												<table class="table table-hover table-center">
													<thead>
														<tr>
															<th style="min-width: 200px">Problems</th>
															<th style="min-width: 100px">Diagnosis</th>
															<th style="min-width: 100px">care suggestions</th>
															<th style="min-width: 100px;">reports</th>
															<th style="min-width: 80px;"></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<textarea class="form-control" placeholder="Write Patient Problems" name="problems"></textarea>
															</td>
															<td>
															<textarea class="form-control" placeholder="Write Patient Diagnosis" name="diagnosis"></textarea>
															</td>
															<td>
															<textarea class="form-control" placeholder="Write Patient Care suggestions" name="care_suggestion"></textarea>
															</td>
															<td>
															<textarea class="form-control" placeholder="Write Patient Reports Suggestions" name="reports"></textarea>
															</td>
															<input type="hidden" value="<?php echo $app_data->id?>" name="appoinment_id" id="appoinment_id">
															<input type="hidden" value="<?php echo $app_data->patient_id?>" name="patient_id" id="patient_id">
															<td>
																<button name="submit" value="send" class="btn btn-sm bg-success-light"><i class="fas fa-plus">Add</i></button>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="table-responsive">
													<table class="datatable table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>Problems</th>
																<th>Diagnosis</th>
																<th>care suggestions</th>
																<th>reports</th>
															</tr>
														</thead>
														<tbody>
														
														@if(!$pdiagnoses->isEmpty())
															@foreach($pdiagnoses as $pdiagnoses1) 		
															<tr>
																<td>{{$pdiagnoses1->problems}}</td>
																<td>{{$pdiagnoses1->diagnosis}}</td>
																<td>{{$pdiagnoses1->care_suggestion}}</td>
																<td>{{$pdiagnoses1->reports}}</td>
																<td class="text-right">
																	<div class="actions">
																		<a  href="" class="btn btn-sm bg-danger-light">
																			<i class="fe fe-trash"></i> Delete
																		</a>
																	</div>
																</td>
															</tr>
														@endforeach
														@else
														<tr>
															<td class="text-danger" colspan="5" align="center"> Data Not Found </td>
														</tr>
														@endif	
														</tbody>
													</table>
												</div>
										</div>
									</div>								
    </div>
</form>
  </div>

  <form action="{{url('/prescription_store/'.$app_data->id)}}" method="post" enctype="multipart/form-data"> 
	@csrf
  <div class="card">
    <div class="card-header">
      <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
        <b>Prescription</b>
      </a>
    </div>  
    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
	<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center">
													<thead>
														<tr>
															<th style="min-width: 100px"> Medicine Name</th>
															<th style="min-width: 100px">Quantity</th>
															<th style="min-width: 100px">Days</th>
															<th style="min-width: 100px;">Time</th>
															<th style="min-width: 120px;">Dose</th>
															<th style="min-width: 80px;"></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
															<input list="browsers" name="medicine_name" id="browser" class="form-control">
															<datalist id="browsers">
															@if(!$doc_fav_medicine->isEmpty())
																@foreach($doc_fav_medicine as $medicine) 		
																<option value={{$medicine->medicine_name}}>
																@endforeach
															@endif
															</datalist>
															</td>
															<td>
																<input class="form-control" placeholder="" type="text" name="medicine_Quantity">
															</td>
															<td>
																<input class="form-control" placeholder="" type="text" name="medicine_take_Days">
															</td>
															<td>
																<div class="form-check form-check-inline">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="medicine_take_Time[]" value="Morning"> Morning
																	</label>
																</div>
																<div class="form-check form-check-inline">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="medicine_take_Time[]"  value="Afternoon"> Afternoon
																	</label>
																</div>
																<div class="form-check form-check-inline">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="medicine_take_Time[]" value="Evening"> Evening
																	</label>
																</div>
																<div class="form-check form-check-inline">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="medicine_take_Time[]" value="Night"> Night
																	</label>
																</div>
																</td>
																<td>
																<div class="form-group">               
															<select class="select form-control" name="medicine_dose">
																<option selected="selected" value="">---Dose---</option>
																<option value="Monday">Injection</option>
																<option value="Tuesday">Eye Drop</option> 
															</select>
														</div>
															</td>
															<input type="hidden" value="<?php echo $app_data->id?>" name="appoinment_id" id="appoinment_id">
															<input type="hidden" value="<?php echo $app_data->patient_id?>" name="patient_id" id="patient_id">
															<td>
															<button name="submit" value="send" class="btn btn-sm bg-success-light"><i class="fas fa-plus">Add</i></button>
															
															</td>
														</tr>
													</tbody>
												</table>
												<div class="table-responsive">
													<table class="datatable table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>Medicine Name</th>
																<th>Quantity</th>
																<th>Days</th>
																<th>Time</th>
																<th>Dose</th>
															</tr>
														</thead>
														<tbody>
														<tr>
														@if(!$pprescriptions->isEmpty())
															@foreach($pprescriptions as $pprescriptions1) 		
															<tr>
																<td>{{$pprescriptions1->medicine_name}}</td>
																<td>{{$pprescriptions1->medicine_Quantity}}</td>
																<td>{{$pprescriptions1->medicine_take_Days}}</td>
																<td>{{$pprescriptions1->medicine_take_Time}}</td>
																<td>{{$pprescriptions1->medicine_dose}}</td>
																<td class="text-right">
																	<div class="actions">
																		<a  href="" class="btn btn-sm bg-danger-light">
																			<i class="fe fe-trash"></i> Delete
																		</a>
																	</div>
																</td>
															</tr>
															@endforeach
															
															@else
															<tr>
																<td class="text-danger" colspan="6" align="center"> Data Not Found </td>
															</tr>
															@endif
																
														</tbody>
													</table>
												</div>
											</div>
										</div>
										
									</div>
    </div><!-- Submit Section -->
	<td class="text-right">
			<div class="actions text-right">
				<a class="btn btn-sm bg-success-light" href="{{url('invoice-view/'.$app_data->id)}}">
					<i class="fe fe-pencil"></i> Submit
				</a>
			</div>
			</td>
									<!-- /Submit Section -->
  </div>
  </form>
</div>
									
									<!-- Prescription Item -->
									
									
									<!-- /Prescription Item -->
									
									
									
									
								
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="{{url('Frontend/assets/img/footer-logo.png')}}" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="{{url('/search')}}"><i class="fas fa-angle-double-right"></i> Search for Doctors</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="{{url('/booking')}}"><i class="fas fa-angle-double-right"></i> Booking</a></li>
										<li><a href="{{url('/patient-dashboard')}}"><i class="fas fa-angle-double-right"></i> Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="{{url('/appointments')}}"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										<li><a href="{{url('/chat')}}"><i class="fas fa-angle-double-right"></i> Chat</a></li>
										<li><a href="{{url('/login')}}"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="{{url('/doctor-register')}}"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="{{url('/doctor-dashboard')}}"><i class="fas fa-angle-double-right"></i> Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="{{url('/term-condition')}}">Terms and Conditions</a></li>
											<li><a href="{{url('/privacy-policy')}}">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ url('Frontend/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{  url('Frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

<!-- doccure/add-prescription.html  30 Nov 2019 04:12:37 GMT -->
</html>
@endsection	
