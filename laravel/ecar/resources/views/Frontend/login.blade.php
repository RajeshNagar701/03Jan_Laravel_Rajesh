@extends('Frontend.Layout.mainlayout')


@push('title')
<title>Login</title>
@endpush

@section('remaining_content')
<!--==============================Content=================================-->			
			
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Login Us</h3>
						<p>
						@if(Session::has('fail'))
							<i class="alert alert-danger">
								{{session('fail')}}
							</i>
						@endif
						
						</p>
						<form action="{{ url('/userlogin') }}" method="post" enctype="multipart/form-data" >
							@csrf
							<input type="text" name="username" placeholder="User Name:" class="form-control">
							@error('username')
								<br>
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							<br>
							<input type="password" name="pass" placeholder="Password:"  class="form-control" />
							@error('pass')
								<br>
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							
							<br>
							<input type="checkbox" name="rem" value="rem"> Remember Me
							<br>
							<br>
							
							<div>
								<div class="clear"></div>
								<div class="btns">
									<input type="submit" name="login" data-type="submit" class="btn" value="Login">
									<a href="signup" class="float-right">Click here for Registration</a>
								</div>
							</div>
						</form>
					</div>
					
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
@endsection