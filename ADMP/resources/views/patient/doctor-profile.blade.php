@extends('patient.Layout.main_layout') 	
@section('main_container')
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

				
					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{asset('upload/doctor/' . $fetch->profile_img)}}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">Dr. <?php echo $fetch->first_name?> <?php echo $fetch->last_name?></h4>
										<p class="doc-speciality"><?php echo $fetch->short_tittle?></p>
										<p class="doc-department"><img src="{{asset('upload/specialities/' . $fetch->img)}}" class="img-fluid" alt="Speciality"><?php echo $fetch->specialist_id?></p>
										
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i><?php echo $fetch->city?>, <?php echo $fetch->state?> <a href="<?php echo $fetch->google_map?>" target="_blank">Get Directions</a></p>
											<ul class="clinic-gallery">
														<?php
														$hospital_img=$fetch->hospital_img;
														$hosp_img_arr=explode(",",$hospital_img);
								
														foreach($hosp_img_arr as $d)
														{
														?>
														<li>
															<a href="{{asset('upload/hospital/'.$d)}}" data-fancybox="gallery">
																<img src="{{asset('upload/hospital/'.$d)}}" alt="Feature">
															</a>
														</li>
														<?php
														}
														?>
											</ul>
										</div>
										
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="fas fa-map-marker-alt"></i> <?php echo $fetch->city?>, <?php echo $fetch->state?></li>
											<li><i class="far fa-money-bill-alt"></i> Consulting Fees: <?php echo $fetch->consulting_fees?></li>
											<li><i class="far fa-money-bill-alt"></i> Followup Fees: <?php echo $fetch->followup_fees?></li>
										</ul>
									</div>
									<div class="doctor-action">
										@if($fav_doctor)
										
											<a href="{{url('patient_fav_doc_del/'.$fetch->id)}}" onclick="" class="btn btn-success fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										@else
											<a href="{{url('patient_fav_doc/'.$fetch->id)}}" onclick="" class="btn btn-white fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
											
										@endif
										<a href="{{url('/chat')}}" class="btn btn-white msg-btn">
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
											<i class="fas fa-video"></i>
										</a>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="{{url('/booking/'.$fetch->id)}}">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Services & Specializations</a>
									</li>
									
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p><?php echo $fetch->about?></p>
											</div>
											<!-- /About Details -->
										
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name"><?php echo $fetch->education?></a>
																	
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
									
											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name"><?php echo $fetch->experience?></a>
																	
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->
										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
									<!-- Location List -->
									<div class="location-list">
										<div class="row">
										
											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													<h4 class="clinic-name"><a href="#"><?php echo $fetch->hospital_name?></a></h4>
													<p class="doc-speciality"><?php echo $fetch->specialist_id?></p>
													<div class="clinic-details mb-0">
														<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> <?php echo $fetch->address?>, <?php echo $fetch->city?>, <?php echo $fetch->pincode?>, <?php echo $fetch->state?> <br><a href="<?php echo $fetch->google_map?>">Get Directions</a></h5>
														<ul>
														<?php
														$hospital_img=$fetch->hospital_img;
														$hosp_img_arr=explode(",",$hospital_img);
								
														foreach($hosp_img_arr as $d)
														{
														?>
														<li>
															<a href="{{asset('upload/hospital/'.$d)}}" data-fancybox="gallery">
																<img src="{{asset('upload/hospital/'.$d)}}" alt="Feature">
															</a>
														</li>
														<?php
														}
														?>
														</ul>
													</div>
												</div>
											</div>
											<!-- /Clinic Content -->
											
											<!-- Clinic Timing -
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Mon - Sat </span>
														</p>
														<p class="timings-times">
															<span>10:00 AM - 2:00 PM</span>
															<span>4:00 PM - 9:00 PM</span>
														</p>
													</div>
													<div>
													<p class="timings-days">
														<span>Sun</span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
													</p>
													</div>
												</div>
											</div>
											 /Clinic Timing -->
											 <div class="col-md-2">
											  </div>
											<div class="col-md-4">
												<div class="consult-price">
												<div class="clini-infos">
													<ul>
														
														<li><i class="far fa-money-bill-alt"></i> Consulting Fees: <?php echo $fetch->consulting_fees?></li>
														<li><i class="far fa-money-bill-alt"></i> Followup Fees: <?php echo $fetch->followup_fees?></li>
													</ul>
												</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Location List -->
									
									

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									
								
									
									<!-- Services List -->
									<div class="service-list">
												<h4>Services</h4>
												<?php
												foreach($servicelist_arr as $data)
												{
												?>
												<ul class="clearfix">
													<li><?php echo $data->title?></li>
													</ul>
												<?php
												}
												?>
											</div>
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<?php
												foreach($special_arr as $data)
												{
												?>
												<ul class="clearfix">
													<li><?php echo $data->title?></li>
												</ul>
												<?php
												}
												?>
											</div>
											<!-- /Specializations List -->
									</div>
								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>5 Nov 2019</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Monday",$day_arr))
																{ 
																	
																	echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																	echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																	echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed<br>";
																	
																}
															?>
															
														</div><br>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Tuesday",$day_arr))
																{ 
																	
																		echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																		echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																		echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																		
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div><br>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Wednesday",$day_arr))
																{ 
																	
																	echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																	echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																	echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div><br>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Thursday",$day_arr))
																{ 
																	
																	echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																	echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																	echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div><br>
														<div class="listing-day">
															<div class="day">Friday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Friday",$day_arr))
																{ 
																	
																	echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																	echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																	echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div><br>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Saturday",$day_arr))
																{ 
																		echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																		echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																		echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div><br>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Sunday",$day_arr))
																{ 
																		echo "Morning :".$fetch->hospital_morning_to . " - " .$fetch->hospital_morning_from;
																		echo "<br>Afternoon :".$fetch->hospital_afternoon_to . " - " .$fetch->hospital_afternoon_from;
																		echo "<br>Evening :".$fetch->hospital_evening_to . " - " .$fetch->hospital_evening_from;
																}
																else
																{
																	echo "Closed";
																	
																}
															?>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->
					

				</div>
			</div>		
			<!-- /Page Content -->
			<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="{{url('Frontend/assets/img/doctors/doctor-thumb-02.jpg')}}" class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="{{url('/voice-call')}}" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="{{url('Frontend/assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="{{url('/video-call')}}" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
			@endsection
		   
		</div>
		<!-- /Main Wrapper -->
		
		
		
		<!-- jQuery -->
		<script src="{{ url('Frontend/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{  url('Frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{  url('Frontend/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Fancybox JS -->
		<script src="{{  url('Frontend/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('Frontend/assets/js/script.js') }}"></script>
		
	</body>


</html>
