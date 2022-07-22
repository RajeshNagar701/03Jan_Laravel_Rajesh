@extends('Backend.Layout.mainlayout');


@section('remaining_content');

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Contact
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Contact</a></li>
            <li class="active">Manage Contact</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Contact</h3>
				  <p>
				  @if(Session('success'))
				  <i class="alert alert-success">{{session('success')}}</i>
				  @endif
				  </p>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Contact Id</th>
						<th>Name</th>
                        <th>Email</th>
						<th>Mobile</th>
                        <th>Comment</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					foreach($contact_arr as $data)
					{
					?>  
					  <tr>
                        <td><?php echo $data->id?></td>
						<td><?php echo $data->name?></td>
						<td><?php echo $data->email?></td>
						<td><?php echo $data->mobile?></td>
						<td><?php echo $data->msg?></td>
						<td><a href="{{url('contact/'. $data->id)}}" class="btn btn-danger">Delete</a></td>
                      </tr>
                    <?php
					}
					?>  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   @endsection