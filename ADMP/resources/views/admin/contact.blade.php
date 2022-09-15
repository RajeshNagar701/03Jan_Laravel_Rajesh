@extends('admin.Layout.main_layout') 	
@section('main_container')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Contact</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Contact</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
						@if(session()->has('success'))
							<i class="alert alert-success">{{session('success')}}</i>
						@endif
						<div class="table-responsive">
													<table id="table" class="table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>ID</th>
																<th>Name</th>
																<th>Email</th>
																<th>Mobile no</th>
																<th>Comment</th>
																<th class="text-right">Actions</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach($contact as $contact) 
																{
															?>
															<tr>
																<td><?php echo $contact->id?></td>
																<td><?php echo $contact->name?></td>
																<td><?php echo $contact->email?></td>
																<td><?php echo $contact->mobileno?></td>
																<td><?php echo $contact->comment?></td>
																<td class="text-right">
																	<div class="actions">
																		<a  href="{{url('contact/'. $contact->id)}}" class="btn btn-sm bg-danger-light">
																			<i class="fe fe-trash"></i> Delete
																		</a>
																	</div>
																</td>
															</tr>
															<?php
															}
															?>	
														</tbody>
													</table>
												</div>	
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
       
		<!-- Bootstrap Core JS -->
        <script src="{{url('Backend/assets/js/popper.min.js')}}"></script>
        <script src="{{url('Backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('Backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('Backend/assets/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/{{url('/admin-blank-page')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>
@endsection