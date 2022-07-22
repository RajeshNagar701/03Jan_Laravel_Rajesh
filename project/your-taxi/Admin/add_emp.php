<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Employee
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Add Employee</a></li>
            <li class="active">Add Employee</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">General Elements</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form method="post" enctype="multipart/form-data" role="form">
                    <!-- text input -->
                   <div class="form-group">
                      <label>emp_name</label>
                      <input type="text" name="emp_name" class="form-control" placeholder="Enter Name"/>
                    </div>
					<div class="form-group">
                      <label>emp_unm</label>
                      <input type="text" name="emp_unm" class="form-control" placeholder="Enter unm"/>
                    </div>
					<div class="form-group">
                      <label>emp_pass</label>
                      <input type="text" name="emp_pass" class="form-control" placeholder="Enter pass"/>
                    </div>
					<div class="form-group">
                      <label>email</label>
                      <input type="text" name="email" class="form-control" placeholder="Enter email"/>
                    </div>
					<div class="form-group">
                      <label>mobile</label>
                      <input type="text" name="mobile" class="form-control" placeholder="Enter mobile"/>
                    </div>
					<div class="form-group">
                      <label>file</label>
                      <input type="file" name="img" class="form-control" placeholder="Enter file"/>
                    </div>

                 
					<div class="form-group">
                      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php
include_once('footer.php');
?>
