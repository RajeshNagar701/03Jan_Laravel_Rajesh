@extends('Frontend.Layout.mainlayout')


@push('title')
<title>Edit Account</title>
@endpush

@section('remaining_content')
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Edit Profile</h3>
						<form action="{{url('/edit/'.$fetch->id )}}" method="post" enctype="multipart/form-data" >
							@csrf
							<input type="text" name="name" value="<?php echo $fetch->name?>" placeholder="Name:" class="form-control" />
							<br>
							<input type="text" name="username" value="<?php echo $fetch->username?>" placeholder="User Name:" class="form-control" />
							
							<br>
							<b>Gender:</b>
							<br>
							<br>
							<?php
							$gender=$fetch->gen;
							if($gender=="Male")
							{
							?>
							Male:<input type="radio" name="gen" value="Male" checked>
							Female:<input type="radio" name="gen" value="Female">
							<?php
							}
							else
							{
							?>
							Male:<input type="radio" name="gen" value="Male" >
							Female:<input type="radio" name="gen" value="Female" checked>
							<?php
							}
							?>
							<br>
							<br>
							<b>Lag:</b>
							<br>
							<br>
							
							Hindi:<input type="checkbox" name="lag[]" value="Hindi" <?php
							$lag=$fetch->lag;
							$languages_arr=explode(",",$lag);
							if(in_array("Hindi",$languages_arr))
							{
								echo "checked";
							}
							?> >
							English:<input type="checkbox" name="lag[]" value="English" <?php
							$lag=$fetch->lag;
							$languages_arr=explode(",",$lag);
							if(in_array("English",$languages_arr))
							{
								echo "checked";
							}
							?>>
							Gujarati:<input type="checkbox" name="lag[]" value="Gujarati" <?php
							$lag=$fetch->lag;
							$languages_arr=explode(",",$lag);
							if(in_array("Gujarati",$languages_arr))
							{
								echo "checked";
							}
							?>>
							
							<br>
							<input type="file" name="img" value="<?php echo $fetch->img?>" class="form-control" />
							<img src="{{asset('upload/customer/'.$fetch->img)}}" height="50px" width="50px">
							<br>
							
							<select name="cid" class="form-control" />
								<option value="">Select Country</option>
								<?php
								foreach($country_arr as $c)
								{
									if($c->cid==$fetch->cid)
									{
								?>
									<option value="<?php echo $c->cid?>" selected >
												<?php echo $c->cnm?>
									</option>
								<?php
									}
									else
									{
								?>
									<option value="<?php echo $c->cid?>">
												<?php echo $c->cnm?>
									</option>
								<?php		
									}
								}
								?>
							</select>
							<br>
							
							<br>
							<br>
							<div>
								<div class="clear"></div>
								<div class="btns">
									<input type="submit" name="update" data-type="submit" class="btn" value="Save">
									<a href="login" class="float-right">Click here for Login</a>
								</div>
							</div>
						</form>
					</div>
					
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
@endsection