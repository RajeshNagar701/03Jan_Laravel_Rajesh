@extends('admin.Layout.main_layout') 	
@section('main_container')
			
			
			
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
							@if(session()->has('doctor'))
												
									<i class="alert alert-success">{{session('doctor')}}</i>
												
								@endif
						</div>
					</div>
					<!-- /Page Header -->
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									<h4 class="card-title">Personal Information</h4><br>
									<form action="{{url('/edit/'.$fetch->id)}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-xl-6">
											
											    <div class="row">
													<label class="col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" placeholder="First Name" value="<?php echo $fetch->first_name?>" class="form-control" name="first_name">
																	@if ($errors->has('first_name'))
            															<span class="text-danger">{{ $errors->first('first_name') }}</span>
       																@endif
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" placeholder="Last Name" value="<?php echo $fetch->last_name?>" class="form-control" name="last_name">
																	@if ($errors->has('first_name'))
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
														<input type="date" value="<?php echo $fetch->dob?>" class="form-control" name="dob">
														@if ($errors->has('first_name'))
            															<span class="text-danger">{{ $errors->first('dob') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Gender</label>
													<div class="col-lg-9">
														<div class="form-check form-check-inline">
														<?php
															$gender=$fetch->gender;
															if($gender=="Male")
															{
														?>
															<input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" checked>
															<label class="form-check-label" for="gender_male">
															Male
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
															<label class="form-check-label" for="gender_female">
															Female
															<?php
																}
																else
																{
															?>	
															<input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" >
															<label class="form-check-label" for="gender_male">
															Male
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" checked>
															<label class="form-check-label" for="gender_female">
															Female
															<?php
																}
															?>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Specialist ID</label>
													<div class="col-lg-9">
														<select class="select" name="specialist_id" value="<?php echo $fetch->name?>">
															<option value="">Select</option>
															<?php
															foreach($special_id_arr as $data)
															{
																if($data->id==$fetch->specialist_id)
															 	{
															?>
															<option value="<?php echo $data->id;?>" selected>
														        <?php echo $data->name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $data->id;?>">
                                                            <?php echo $data->name;?></option>
															<?php
															    }
														    }
														  ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Liacence No</label>
													<div class="col-lg-9">
														<input type="text" value="<?php echo $fetch->liacence_no?>" class="form-control" name="liacence_no">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Experience</label>
													<div class="col-lg-9">
														<input type="text" value="<?php echo $fetch->experience?>" class="form-control" name="experience">
														@if ($errors->has('experience'))
            												<span class="text-danger">{{ $errors->first('experience') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Dr. Mobile</label>
													<div class="col-lg-9">
														<input type="tel" value="<?php echo $fetch->dr_mobile?>" class="form-control" name="dr_mobile">
														@if ($errors->has('dr_mobile'))
            												<span class="text-danger">{{ $errors->first('dr_mobile') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">About</label>
													<div class="col-lg-9">
														<textarea name="about" value="" rows="4" cols="5" class="form-control" placeholder="About"><?php echo $fetch->about?></textarea>
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Short Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->short_tittle?>" name="short_tittle">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Email</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->email?>" name="email" readonly>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Profile Img</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{asset('upload/doctor/'.$fetch->profile_img)}}" name="profile_img">
														<img src="{{asset('upload/doctor/'.$fetch->profile_img)}}" height="50px" width="50px"> 
														@if ($errors->has('profile_img'))
            												<span class="text-danger">{{ $errors->first('profile_img') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Education</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->education?>" name="education">
														@if ($errors->has('education'))
            												<span class="text-danger">{{ $errors->first('education') }}</span>
       													@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Visiting Card</label>
													<div class="col-lg-9">
														<input type="file" class="form-control" value="{{asset('upload/visitingcard/'.$fetch->visit_card)}}" name="visit_card">
														<img src="{{asset('upload/visitingcard/'.$fetch->visit_card)}}" height="50px" width="50px"> 
														@if ($errors->has('visit_card'))
            												<span class="text-danger">{{ $errors->first('visit_card') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Office no</label>
													<div class="col-lg-9">
														<input type="tel" class="form-control" value="<?php echo $fetch->office_no?>" name="office_no">
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
														<input type="text" class="form-control" value="<?php echo $fetch->hospital_name?>" name="hospital_name">
														@if ($errors->has('hospital_name'))
            												<span class="text-danger">{{ $errors->first('hospital_name') }}</span>
       													@endif
													</div>
												</div>
												
												

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Notification</label>
													<div class="col-lg-9">
														<textarea  class="form-control" value="<?php echo $fetch->notification?>" name="notification"><?php echo $fetch->notification?></textarea>
														@if ($errors->has('notification'))
            												<span class="text-danger">{{ $errors->first('notification') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Followup Fees</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->followup_fees?>" name="followup_fees">
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
														<input type="file" value="{{asset('upload/hospital/'.$fetch->hospital_img)}}" class="form-control" name="hospital_img[]" multiple>
														<img src="{{asset('upload/hospital/'.$fetch->hospital_img)}}" height="50px" width="50px"> 
														@if ($errors->has('hospital_img'))
            												<span class="text-danger">{{ $errors->first('hospital_img') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Consulting </label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->consulting_fees?>" name="consulting_fees">
														@if ($errors->has('consulting_fees'))
            												<span class="text-danger">{{ $errors->first('consulting_fees') }}</span>
       													@endif
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<select class="select" name="state" value="<?php echo $fetch->state?>">
															<option value="">Select</option>
															<?php
															foreach($state_id_arr as $d)
															{
																if($d->id==$fetch->state)
															 	{
															?>
															<option value="<?php echo $d->id;?>"selected>
															<?php echo $d->state_name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $d->id;?>" >
															<?php echo $d->state_name ?></option>
															<?php
															    }
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
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<select class="select" name="city" value="<?php echo $fetch->city_name?>">
															<option value="">Select</option>
															<?php
															foreach($city_id_arr as $c)
															{
																if($c->id==$fetch->city)
															 	{
															?>
															<option value="<?php echo $c->id;?>"selected>
														       <?php echo $c->city_name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $c->id;?>" >
														       <?php echo $c->city_name ?></option>
															<?php
															    }
														    }
														    ?>
														</select>
														@if ($errors->has('city'))
            												<span class="text-danger">{{ $errors->first('city') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<textarea name="address" rows="4" value="<?php echo $fetch->address?>" class="form-control"><?php echo $fetch->address?></textarea>
														@if ($errors->has('address'))
            												<span class="text-danger">{{ $errors->first('address') }}</span>
       													@endif
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
											
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area</label>
													<div class="col-lg-9">
														<select class="select" name="area" value="<?php echo $fetch->area_name?>">
															<option value="">Select</option>
															<?php
															foreach($area_id_arr as $a)
															{
																if($a->id==$fetch->area)
															 	{
															?>
															<option value="<?php echo $a->id;?>"selected>
														       <?php echo $a->area_name ?></option>
															<?php
															    }
																else
                                                                {
															?>
															<option value="<?php echo $a->id;?>">
														       <?php echo $a->area_name ?></option>
															<?php
															    }
														    }
														    ?>
														</select>
														@if ($errors->has('area'))
            												<span class="text-danger">{{ $errors->first('area') }}</span>
       													@endif
													</div>
												</div>	
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Postal Code</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->pincode?>" name="pincode">
														@if ($errors->has('pincode'))
            												<span class="text-danger">{{ $errors->first('pincode') }}</span>
       													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Google Map URL</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" value="<?php echo $fetch->google_map?>" name="google_map">
													</div>
												</div>
											</div>
										</div>
                                      

										<h4 class="card-title">Hospital Timings</h4><br>
										<div class="row">
										<div class="form-group row">
													<label class="col-lg-3 col-form-label">Days</label>
													<div class="col-lg-9">
														Monday <input type="checkbox" name="day[]" value="Monday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Monday",$day_arr))
																{
																	echo "checked";
																}
																?> >&nbsp;&nbsp;
														Tuesday <input type="checkbox" name="day[]" value="Tuesday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Tuesday",$day_arr))
																{
																	echo "checked";
																}
																?>>&nbsp;&nbsp;&nbsp;&nbsp;
														Wednesday <input type="checkbox" name="day[]" value="Wednesday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Wednesday",$day_arr))
																{
																	echo "checked";
																}
																?>>&nbsp;&nbsp;
														Thursday <input type="checkbox" name="day[]" value="Thursday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Thursday",$day_arr))
																{
																	echo "checked";
																}
																?>>
														Friday <input type="checkbox" name="day[]" value="Friday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Friday",$day_arr))
																{
																	echo "checked";
																}
																?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Saturday <input type="checkbox" name="day[]" value="Saturday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Saturday",$day_arr))
																{
																	echo "checked";
																}
																?>>&nbsp;&nbsp;&nbsp;&nbsp;
														Sunday <input type="checkbox" name="day[]" value="Sunday" <?php
																$day=$fetch->day;
																$day_arr=explode(",",$day);
																if(in_array("Sunday",$day_arr))
																{
																	echo "checked";
																}
																?>>
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
																	<input type="time" name="hospital_morning_to" value="<?php echo $fetch->hospital_morning_to?>" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_morning_from" value="<?php echo $fetch->hospital_morning_from?>" class="form-control">
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
																	<input type="time" name="hospital_afternoon_to" value="<?php echo $fetch->hospital_afternoon_to?>" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_afternoon_from" value="<?php echo $fetch->hospital_afternoon_from?>" class="form-control">
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
																	<input type="time" name="hospital_evening_to" value="<?php echo $fetch->hospital_evening_to?>" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	From:
																	<input type="time" name="hospital_evening_from" value="<?php echo $fetch->hospital_evening_from?>" class="form-control">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>						
									</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary" name="submit" value="send">Update</button>
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