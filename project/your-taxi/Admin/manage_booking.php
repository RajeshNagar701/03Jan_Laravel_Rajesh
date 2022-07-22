<?php 
include_once('header.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Booking
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Booking</a></li>
            <li class="active">Manage Booking</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Booking</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Book Id</th>
						<th>Cust Id</th>
                        <th>Adv Id</th>
                        <th>Book Date & Time</th>
                        <th>Days</th>
                        <th>Total Ammount</th>
						<th>Delete</th>
						
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					foreach($booking_arr as $data)
					{
					?>  
					  <tr>
                        <td><?php echo $data->book_id?></td>
						<td><?php echo $data->cust_id?></td>
						<td><?php echo $data->adv_id?></td>
						<td><?php echo $data->book_date_time?></td>
						<td><?php echo $data->day_km?></td>
						<td><?php echo $data->total_amount?></td>
						<td><a href="delete?del_book_id=<?php echo $data->book_id?>" class="btn btn-danger">Delete</a></td>
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
    <?php
	include_once('footer.php');
	?>