@extends('Frontend.Layout.mainlayout')


@push('title')
<title>Car Advertisement</title>
@endpush

@section('remaining_content')
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_12" align="center">
						<h3>Book Cars</h3>
					</div>
					<?php
					/*
					foreach($adv_arr as $d)
					{
					?>
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="{{url('Frontend/images/page4_img1.jpg')}}" alt="">
								<div class="text1 color2">
									<a href="#"><?php echo $d->title;?></a>
								</div>
								Sit meter ultricies erat rutrum. Cras er te facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuad nibh odio ut velit.
								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					<?php
					}
					*/
					?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
@endsection