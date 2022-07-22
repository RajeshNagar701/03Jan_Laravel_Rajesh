<?php 
include_once('header.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Employee
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Employee</a></li>
            <li class="active">Manage Employee</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Employee</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
				  
				  <form>
					<input type="search"  name="search" class="form-control" placeholder="Search Name" value="" >
					<br>
					<input type="submit"  name="btn_search" value="search" class="btn btn-primary"> 
					<br>
					
				  </form>
				  
				  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>emp_id</th>
						<th>Img</th>
						<th>emp_name</th>
                        <th>emp_unm </th>
                        <th>email</th>
                        <th>mobile</th>
						<th>Created/Updated</th>
						<th>Delete</th>
						<th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					foreach($emp_arr as $data)
					{
					?>  
					  <tr>
					    <td><?php echo $data->emp_id?></td>
						<td><img src="upload/employee/<?php echo $data->img?>" width="50px" height="50px"></td>
						<td><?php echo $data->emp_name?></td>
						<td><?php echo $data->emp_unm?></td>
						<td><?php echo $data->email?></td>
						<td><?php echo $data->mobile?></td>
						<td><?php echo $data->created_dt?>/<?php echo $data->updated_dt?></td>
						<td><a href="delete?del_emp_id=<?php echo $data->emp_id?>" class="btn btn-danger">Delete</a></td>
						<td><a href="" class="btn btn-p
						rimary">Edit</a></td>
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