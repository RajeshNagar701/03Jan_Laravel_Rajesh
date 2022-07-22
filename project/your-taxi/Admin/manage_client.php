<?php 
include_once('header.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Client
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Client</a></li>
            <li class="active">Manage Client</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Client</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">  
				  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>client_id</th>
						<th>name</th>
                        <th>email</th>
                        <th>pass</th>
                        <th>mobile</th>
                        <th>ano</th>
						<th>img</th>
						<th>address</th>
						<th>Status</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
					foreach($client_arr as $data)
					{
					?>  
					  <tr>
                        <td><?php echo $data->client_id?></td>
						<td><?php echo $data->name?></td>
						<td><?php echo $data->email?></td>
						<td><?php echo $data->pass?></td>
						<td><?php echo $data->mobile?></td>
						<td><?php echo $data->ano?></td>
						<td><?php echo $data->img?></td>
						<td><?php echo $data->address?></td>
						<td><a href="status?status_client_id=<?php echo $data->client_id?>" class="btn btn-primary"><?php echo $data->status?></a></td>
						<td><a href="delete?del_client_id=<?php echo $data->client_id?>" class="btn btn-danger">Delete</a></td>
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
    <?php
	include_once('footer.php');
	?>