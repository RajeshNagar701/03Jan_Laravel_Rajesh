@extends('admin.Layout.main_layout') 	
@section('main_container')
			
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Add Doctor</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Horizontal Form</li>
								</ul>
								
							</div>
							@if(session()->has('success'))
								<i class="alert alert-success">{{session('success')}}</i>
							@endif
						</div>
					</div>
					<!-- /Page Header -->
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									<h4 class="card-title">Personal Information</h4><br>
									<form action="{{url('/admin-add-doctor')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-xl-6">
											
											    <div class="row">
													<label class="col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" placeholder="First Name" value="{{old('first_name')}}" class="form-control" name="first_name">
																	@if ($errors->has('first_name'))
            															<span class="text-danger">{{ $errors->first('first_name') }}</span>
       																@endif
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" placeholder="Last Name" value="{{old('last_name')}}" class="form-control" name="last_name">
																	@if ($errors->has('last_name'))
            															<span class="text-danger">{{ $errors->first('last_name') }}</span>
       																@endif
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">DOB</label>
													<div class="col-lg-9">
														<input type="date" value="{{old('dob')}}" class="form-control" name="dob">
														@if ($errors->has('dob'))
            												<span class="text-danger">{{ $errors->first('dob') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Gender</label>
													<div class="col-lg-9">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" >
															<label class="form-check-label" for="gender_male">
															Male
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
															<label class="form-check-label" for="gender_female">
															Female
															</label>
														</div>

													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Specialist ID</label>
													<div class="col-lg-9">
														<select class="select" value="{{old('specialist_id')}}" name="specialist_id">
															<option value="">Select</option>
															<?php
															foreach($special_id_arr as $data)
															{
															?>
															<option value="<?php echo $data->id;?>">
														        <?php echo $data->name ?></option>
															<?php
															}
															?>
														</select>
														@if ($errors->has('specialist_id'))
            												<span class="text-danger">{{ $errors->first('specialist_id') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Liacence No</label>
													<div class="col-lg-9">
														<input type="text" value="{{old('liacence_no')}}" class="form-control" name="liacence_no">
														@if ($errors->has('liacence_no'))
            												<span class="text-danger">{{ $errors->first('liacence_no') }}</span>
       													@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Experience</label>
													<div class="col-lg-9">
														<input type="text" value="{{old('experience')}}" class="form-control" name="experience">
														@if ($errors->has('experience'))
            												<span class="text-danger">{{ $errors->first('experience') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Dr. Mobile</label>
													<div class="col-lg-9">
														<input type="tel" value="{{old('dr_mobile')}}" class="form-control" name="dr_mobile">
														@if ($errors->has('dr_mobile'))
            												<span class="text-danger">{{ $errors->first('dr_mobile') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">About</label>
													<div class="col-lg-9">
														<textarea name="about" value="{{old('about')}}" rows="4" cols="5" class="form-control" placeholder="About"></textarea>
														@if ($errors->has('about'))
            												<span class="text-danger">{{ $errors->first('about') }}</span>
       													@endif
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Short Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('short_tittle')}}" name="short_tittle">
														@if ($errors->has('short_tittle'))
            												<span class="text-danger">{{ $errors->first('short_tittle') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Email</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('email')}}" name="email">
														@if ($errors->has('email'))
            												<span class="text-danger">{{ $errors->first('email') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Password</label>
													<div class="col-lg-9">
														<input type="password" class="form-control" value="{{old('password')}}" name="password">
														@if ($errors->has('password'))
            												<span class="text-danger">{{ $errors->first('password') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Profile Img</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{old('profile_img')}}" name="profile_img">
														@if ($errors->has('profile_img'))
            												<span class="text-danger">{{ $errors->first('profile_img') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Education</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('education')}}" name="education">
														@if ($errors->has('education'))
            												<span class="text-danger">{{ $errors->first('education') }}</span>
       													@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Visiting Card</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{old('visit_card')}}" name="visit_card">
														@if ($errors->has('visit_card'))
            												<span class="text-danger">{{ $errors->first('visit_card') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Office no</label>
													<div class="col-lg-9">
														<input type="tel" class="form-control" value="{{old('office_no')}}" name="office_no">
														@if ($errors->has('office_no'))
            												<span class="text-danger">{{ $errors->first('office_no') }}</span>
       													@endif
													</div>
												</div>
											</div>
											
										</div>

										 <h4 class="card-title">Hospital Details</h4><br>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hospital Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('hospital_name')}}" name="hospital_name">
														@if ($errors->has('hospital_name'))
            												<span class="text-danger">{{ $errors->first('hospital_name') }}</span>
       													@endif
													</div>
												</div>
												
												

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Notification</label>
													<div class="col-lg-9">
														<textarea  class="form-control" value="{{old('notification')}}" name="notification"></textarea>
														@if ($errors->has('notification'))
            												<span class="text-danger">{{ $errors->first('notification') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Followup Fees</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('followup_fees')}}" name="followup_fees">
														@if ($errors->has('followup_fees'))
            												<span class="text-danger">{{ $errors->first('followup_fees') }}</span>
       													@endif
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hospital Img</label>
													<div class="col-lg-9">
														<input type="file"  class="form-control" name="hospital_img[]" multiple >
														@if ($errors->has('hospital_img'))
            												<span class="text-danger">{{ $errors->first('hospital_img') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Consulting </label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('consulting_fees')}}" name="consulting_fees">
														@if ($errors->has('consulting_fees'))
            												<span class="text-danger">{{ $errors->first('consulting_fees') }}</span>
       													@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<select class="select" id="sid" value="{{old('state')}}" name="sid">
															<option value="">Select</option>
															<?php
															foreach($state_id_arr as $d)
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
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<textarea name="address" rows="4" value="{{old('address')}}" class="form-control"></textarea>
														@if ($errors->has('address'))
            												<span class="text-danger">{{ $errors->first('address') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Postal Code</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="{{old('pincode')}}" name="pincode">
														@if ($errors->has('pincode'))
            												<span class="text-danger">{{ $errors->first('pincode') }}</span>
       													@endif
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<select class="select" id="city_id" value="{{old('city')}}" name="city_id">
															
														</select>
														@if ($errors->has('city'))
            												<span class="text-danger">{{ $errors->first('city') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area</label>
													<div class="col-lg-9">
														<select class="select"  id="area_id" value="{{old('area')}}" name="area_id">
															
														</select>
														@if ($errors->has('area'))
            												<span class="text-danger">{{ $errors->first('area') }}</span>
       													@endif
													</div>
												</div>
												
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Google Map URL</label>
													<div class="col-lg-9">
														<input type="text" class="form-control"  name="google_map">
														
													</div>
												</div>
											</div>
										</div>
                                      

										<h4 class="card-title">Hospital Timings</h4><br>
										<div class="row">
											<div class="col-xl-6">
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">Days</label>
													<div class="col-lg-9">
														Monday <input type="checkbox" name="day[]" value="Monday"><br>
														Tuesday <input type="checkbox" name="day[]" value="Tuesday"><br>
														Wednesday <input type="checkbox" name="day[]" value="Wednesday"><br>
														Thursday <input type="checkbox" name="day[]" value="Thursday"><br>
														Friday <input type="checkbox" name="day[]" value="Friday"><br>
														Saturday <input type="checkbox" name="day[]" value="Saturday"><br>
														Sunday <input type="checkbox" name="day[]" value="Sunday"> 

														@if ($errors->has('day'))
            												<span class="text-danger">{{ $errors->first('day') }}</span>
       													@endif
													</div>
												</div>
											
											</div>
											<div class="col-xl-6">
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">Morning Time</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group ">
																	To:
																	<input type="time" name="hospital_morning_to"  class="form-control">
																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_morning_from"  class="form-control">
																	
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Afternoon timing</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group ">
																	To:
																	<input type="time" name="hospital_afternoon_to"  class="form-control">
																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_afternoon_from"  class="form-control">
																	
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Evening timing</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group ">
																	To:
																	<input type="time" name="hospital_evening_to"  class="form-control">
																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_evening_from"  class="form-control">
																	
																</div>
															</div>
														</div>
													</div>
												</div>

														</div>
											
											
												
												
												
												
												
												
												
											</div>
											
												
												
												
												
												
												
											
											
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="send">Submit</button>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>


<script>
$('#sid').on('change', function () {
                var sid = this.value;
                $('#city_id').html('');
                $.ajax({
				url:"{{url('/getCity')}}",
				type: "POST",
				data: {
				sid: sid,
				_token: '{{csrf_token()}}'
				},
				
				success: function(result) {
                        $('#city_id').html('<option value="">Select City</option>');
                        $.each(result.cities, function (key, value) {
                            $('#city_id').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                        
                    }
                });
            });
			
$('#city_id').on('change', function () {
                var city_id = this.value;
                $('#area_id').html('');
                $.ajax({
				url:"{{url('/getArea')}}",
				type: "POST",
				data: {
				city_id: city_id,
				_token: '{{csrf_token()}}'
				},
				
				success: function(result) {
                        $('#area_id').html('<option value="">Select City</option>');
                        $.each(result.areas, function (key, value) {
                            $('#area_id').append('<option value="' + value.id + '">' + value.area_name + '</option>');
                        });
                        
                    }
                });
            });			
</script>

					
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		
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