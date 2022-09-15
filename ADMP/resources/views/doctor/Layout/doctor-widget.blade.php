							<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{url('upload/doctor/'. Session('profile_img'))}}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Dr.{{Session('drname')}}</h3>
											
											<div class="patient-details">
												<h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
											</div>
										</div>
									</div>
								</div>
							<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="{{url('/doctor-dashboard')}}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											<li class="">
												<a href="{{url('/editdoctor')}}">
													<i class="fas fa-user-cog"></i>
													<span>Doctor Profile</span>
												</a>
											</li>

											<li>
												<a href="{{url('/doctor-service-specialization')}}">
													<i class="fas fa-user-injured"></i>
													<span>Services & Specializations</span>
												</a>
											</li>

											<li>
												<a href="{{url('/doctor-my-patients')}}">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											
											<li>
												<a href="{{url('/doctor-appointments')}}">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											
											<li>
												<a href="{{url('/doctor-patient-schedule-timings')}}">
													<i class="fas fa-hourglass-start"></i>
													<span>Patient Schedule</span>
												</a>
											</li>
											
											<li>
												<a href="{{url('/doctor-visitor_timings')}}">
													<i class="fas fa-hourglass-start"></i>
													<span>Visitor Schedule</span>
												</a>
											</li>

											<li>
												<a href="{{url('/doctor-my-medicine')}}">
													<i class="fas fa-user-injured"></i>
													<span>My Medicine</span>
												</a>
											</li>
											
											<li>
												<a href="doctor-social-media">
													<i class="fas fa-share-alt"></i>
													<span>Social Media</span>
												</a>
											</li>
											
											<li>
												<a href="{{url('/doctor-change-password')}}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="{{url('/doctorlogout')}}">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>