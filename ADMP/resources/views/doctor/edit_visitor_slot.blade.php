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
									<li class="breadcrumb-item active" aria-current="page">Visitor Slots Timings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Visitor Slots Timings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">					
						<div class="col-6">
						 @if(session()->has('success'))
						 	<i class="alert alert-success">{{session('success')}}</i>
						 @endif
							<div class="row">
								<div class="col-sm-12"  style="margin-left:365px">
									<div class="card">
										<div class="card-body">
											<h4  class="card-title"> Edit Visitor Slot Timings</h4>
											<form name="" action="{{url('/edit_visitor_slots/'.$fetch->id)}}" method="post" enctype="multipart/form-data">
												@csrf
											<div class="profile-box">
												<div class="row">
												<div class="col-lg-4">
														<div class="form-group">               
															<label>Select Days</label>
															<select class="select form-control" name="day">

															<?php
																$day=$fetch->day;
																if($day=="Monday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" selected>Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday">Wednesday</option>
																<option value="Thursday">Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Tuesday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday" selected>Tuesday</option>  
																<option value="Wednesday">Wednesday</option>
																<option value="Thursday">Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Wednesday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday" selected>Wednesday</option>
																<option value="Thursday">Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Thursday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday" >Wednesday</option>
																<option value="Thursday" selected>Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Friday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday" >Wednesday</option>
																<option value="Thursday" >Thursday</option>
																<option value="Friday" selected>Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Saturday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday" >Wednesday</option>
																<option value="Thursday" >Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday" selected>Saturday</option>
																<option value="Sunday">Sunday</option>
															<?php
																	}
															?>

															<?php
																$day=$fetch->day;
																if($day=="Sunday")
																	{
															?>
																<option selected="selected" value="">---Select Days---</option>
																<option value="Monday" >Monday</option>
																<option value="Tuesday">Tuesday</option>  
																<option value="Wednesday" >Wednesday</option>
																<option value="Thursday" >Thursday</option>
																<option value="Friday">Friday</option>
																<option value="Saturday">Saturday</option>
																<option value="Sunday" selected>Sunday</option>
															<?php
																	}
															?>
															</select>
															@if ($errors->has('day'))
            												<span class="text-danger">{{ $errors->first('day') }}</span>
       														@endif
														</div>
												</div>
												
												<div class="col-lg-4">
													<div class="form-group">
														<label>Start Time</label>
														<input type="time" name="start_time" value="<?php echo $fetch->start_time;?>" class="form-control" placeholder="Enter Starting Time">
														@if ($errors->has('start_time'))
            												<span class="text-danger">{{ $errors->first('start_time') }}</span>
       													@endif
													</div>
												</div>
                                                <div class="col-lg-4">
													<div class="form-group">
														<label>End Time</label>
														<input type="time" name="end_time" value="<?php echo $fetch->end_time ?>" class="form-control" placeholder="Enter ending Time">
														@if ($errors->has('end_time'))
            												<span class="text-danger">{{ $errors->first('end_time') }}</span>
       													@endif
													</div>
												</div>

											<br>

												<div class="col-lg-4">
													<div class="form-group">
														<label>Total MR Allowed</label>
														<input type="number" min="0" name="mr_allowed" value="<?php echo $fetch->mr_allowed ?>" class="form-control" placeholder="Enter No. of Slots">
														@if ($errors->has('mr_allowed'))
            												<span class="text-danger">{{ $errors->first('mr_allowed') }}</span>
       													@endif
													</div>
												</div>
                                                <div class="col-lg-4">
													<div class="form-group">
														<label>Total Manager Allowed</label>
														<input type="number" min="0" name="manager_allowed" value="<?php echo $fetch->manager_allowed ?>" class="form-control" placeholder="Enter No. of Slots">
														@if ($errors->has('manager_allowed'))
            												<span class="text-danger">{{ $errors->first('manager_allowed') }}</span>
       													@endif
													</div>
												</div>
                                                <div class="col-lg-4">
													<div class="form-group">
														<label>Total Company Allowed</label>
														<input type="number" min="0" name="company_allowed" value="<?php echo $fetch->company_allowed ?>" class="form-control" placeholder="Enter No. of Slots">
														@if ($errors->has('company_allowed'))
            												<span class="text-danger">{{ $errors->first('company_allowed') }}</span>
       													@endif
													</div>
												</div>

											</div>     
											<div>
                                                <td class="text-center">
														<div class="table-action">
															<button type="submit" name="submit" value="Send" class="btn btn-sm bg-info-light">
																<i class="far fa-save"></i> Update
															</button>
														</div>
												</td>
                                            </div>
										</form>
											
										</div>
									</div>
								</div>
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
							<div class="col-lg-6 col-md-6">
							
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
		
		<!-- Add Time Slot Modal -->
		<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal -->
		
		
		<!-- jQuery -->
		<script src="{{ url('Frontend/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{  url('Frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{  url('Frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Select2 JS -->
		<script src="{{  url('Frontend/assets/plugins/select2/js/select2.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>

<!-- doccure/{{url('/schedule-timings')}}  30 Nov 2019 04:12:09 GMT -->
</html>
@endsection