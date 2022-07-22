@extends('Frontend.Layout.mainlayout')

@push('title')
<title>My Account</title>
@endpush


@section('remaining_content')
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div align="center" class="container_12">
					<div class="grid_12" align="center">
						<h3>Edit My Account</h3>
						@if(session()->has('success'))
						<br>
						<i class="alert alert-success">{{session('success')}}</i>
						<br>
						@endif
					</div>
					<div >
					<div class="grid_3">.</div>
					<div class="grid_6">
						<div class="box">
							<div class="maxheight">
								<img src="{{asset('upload/customer/'.$fetch->img)}}" style="width:70%; border-radius:50%" align="center" alt="">
								<div class="text1 color2">
									<a href="#">Name : <?php echo $fetch->name;?></a>
								</div>
								<p>User Name:  <?php echo $fetch->username;?></p>
								<p>Gender:  <?php echo $fetch->gen;?></p>
								<p>Languages:  <?php echo $fetch->lag;?></p>
								<p>Country:  <?php echo $fetch->cid;?></p>
								<br>
								<a href="{{url('edit/'.$fetch->id)}}" class="btn">Edit Profile</a>
							</div>
						</div>
					</div>
					<div class="grid_3">.</div>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
@endsection