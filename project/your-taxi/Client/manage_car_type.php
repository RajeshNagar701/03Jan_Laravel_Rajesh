<?php 
include_once('header.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Car
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Car</a></li>
            <li class="active">Manage Car</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Car</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>adv_id</th>
						<th>client_id</th>
                        <th>loc_id</th>
                        <th>car_type_id</th>
                        <th>title</th>
                        <th>adv_desc</th>
						<th>price</th>
						<th>price_type</th>
						<th>adv_img</th>
						<th>car_status</th>
						<th>adv_status</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					if(!empty($adv_arr))
					{						
						foreach($adv_arr as $data)
						{
						?>  
						  <tr>
							<td><?php echo $data->adv_id?></td>
							<td><?php echo $data->client_id?></td>
							<td><?php echo $data->loc_id?></td>
							<td><?php echo $data->car_type_id?></td>
							<td><?php echo $data->title?></td>
							<td><?php echo $data->adv_desc?></td>
							<td><?php echo $data->price?></td>
							<td><?php echo $data->price_type?></td>
							<td><?php echo $data->adv_img?></td>
							<td><?php echo $data->car_status?></td>
							<td><?php echo $data->adv_status?></td>
							<td><a href="delete?del_adv_id=<?php echo $data->adv_id?>" class="btn btn-danger">Delete</a></td>
						  </tr>
						  </tr>
                    <?php
						}
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
    <?php
	include_once('footer.php');
	?>