<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										
												@if(Session('ptprofile_img'))
												<a href="#" class="booking-doc-img">
													<img src="{{url('upload/patient/'. Session('ptprofile_img'))}}" alt="User Image">
												</a>
												@else
												<a href="#" class="booking-doc-img">
													<img src="{{url('Frontend/assets/img/patients/user.png')}}" alt="User Image">
												</a>
												@endif
										
										<div class="profile-det-info">
											<h3>{{Session('name')}}</h3>
											<div class="patient-details">
										<!--		<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>-->
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="{{url('/patient-dashboard')}}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="{{url('/favourites')}}">
													<i class="fas fa-user-plus"></i>
													<span>My Doctor</span>
												</a>
											</li>
											
											<li>
												<a href="{{url('/editpatient')}}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="{{url('/change-password')}}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="{{url('/patientlogout')}}">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
