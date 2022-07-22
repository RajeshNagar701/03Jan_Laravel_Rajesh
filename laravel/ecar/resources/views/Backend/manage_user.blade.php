@extends('Backend.Layout.mainlayout');


@section('remaining_content');

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
		  
			@if(Session::has('success'))
				<i class="alert alert-success">
					{{session('success')}}
				</i>
			@endif
            Manage Customer
			
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Customer</a></li>
            <li class="active">Manage Customer</li>
          </ol>
        </section>
		
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Customer</h3>
				  <form action="{{url('/manage_user')}}" method="post">
					@csrf
					<br>
					<input type="search" name="search" value="{{$value}}" class="form-control">
					<br>
					<input type="submit" name="submit" value="search" class="btn btn-primary">
					<br>
				  </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">  
				  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Cust_id</th>
						<th>Image</th>
						<th>Name</th>
                        <th>User Name</th>
                        <th>Gender</th>
                        <th>laung</th>
                        <th>cid</th>
						<th>Delete</th>
						<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  
					foreach($customer_arr as $data)
					{
					?>  
					  <tr>
                        <td><?php echo $data->id?></td>
						<td><img src="{{asset('upload/customer/' . $data->img)}}" height="50px" width="50px"/></td>
						<td><?php echo $data->name?></td>
						<td><?php echo $data->username?></td>
						<td><?php echo $data->gen?></td>
						<td><?php echo $data->lag?></td>
						<td><?php echo $data->cid?></td>
						<td><a href="{{url('delete/'.$data->id)}}" class="btn btn-danger">Delete</a></td>
						<td><a href="{{url('status/'.$data->id)}}" class="btn btn-primary"><?php echo $data->status?></a></a></td>
                      </tr>
                    <?php
					}
					
					?> 
					
                    </tfoot>
                  </table>
				  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   @endsection