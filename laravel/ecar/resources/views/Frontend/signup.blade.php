@extends('Frontend.Layout.mainlayout')

@push('title')
<title>Signup</title>
@endpush

@section('remaining_content')
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Signup Us</h3>
						@if(session()->has('success'))
						<br>
						<i class="alert alert-success">{{session('success')}}</i>
						<br>
						@endif	
						<form action="{{url('/signup')}}" method="post" enctype="multipart/form-data" >
							@csrf
							
							<input type="text" name="name" placeholder="Name:" class="form-control" />
							@error('name')
								<br>
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							
							<br>
							<input type="text" name="username" placeholder="User Name:" class="form-control" />
							@error('name')
								<br>
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							<br>
							<input type="password" name="pass" placeholder="Password:" class="form-control" />
							
							<br>
							<b>Gender:</b>
							<br>
							<br>
							Male:<input type="radio" name="gen" value="Male" >
							Female:<input type="radio" name="gen" value="Female">
							<br>
							<br>
							<b>Lag:</b>
							<br>
							<br>
							Hindi:<input type="checkbox" name="lag[]" value="Hindi" >
							English:<input type="checkbox" name="lag[]" value="English" >
							Gujarati:<input type="checkbox" name="lag[]" value="Gujarati" >
							<br>
							
							<input type="file" name="img" class="form-control" />
							@error('img')
								<br>
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							<br>
							
							<select name="cid" class="form-control" />
								<option value="">Select Country</option>
								<?php
								foreach($country_arr as $c)
								{
								?>
								<option value="<?php echo $c->cid?>">
											<?php echo $c->cnm?>
								</option>
								<?php
								}
								?>
							</select>
							<br>
							
							
							
							<div>
								<div class="clear"></div>
								<div class="btns">
								<div class="btns">
									<input type="submit" name="signup" data-type="submit" class="btn" value="Signup">
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