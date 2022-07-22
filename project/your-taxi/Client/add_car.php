<?php
include_once('header.php');
?>

 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Car Advertisement
           
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Car Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form   method="post" enctype="multipart/form-data" role="form">
                    
					
                    

                    
                     <div class="form-group form-inline">
                      <label>Car_type</label>
					  <input type="text" id="Cartype_id" name="Cartype_id" class="form-control" style="margin-left:150px;" ><br>
					 
                    </div>
					
                    <div class="form-group form-inline ">
					   <label for="img" style="margin-top:10px;">loc_id	</label>
                       <input type="text" id="loc_id" name="loc_id"  class="form-control" style="margin-left:150px;" ><br>
					   
                    </div> 
					
					 <div class="form-group form-inline ">
					   <label for="img" style="margin-top:10px;">Car_img	</label>
                       <input type="file" id="Car_img" name="Car_img" style="margin-left:150px;" accept="image/*"><br>
					   
                    </div> 
                    
					
				 
                    
                    <div class="form-group form-inline">
                      <label>title</label>
                      <input type="text" name="title" class="form-control" style="margin-left:119px;" placeholder="Enter title" name="title" >
                    </div>
					
					<div class="form-group form-inline ">
					  <label style="margin-top:30px;">adv_desc</label>
					  <textarea name="adv_desc" name="adv_desc" class="form-control" style="margin-left:77px;" placeholder="Enter description"  cols="85" rows="5"></textarea>
					</div>
					
					
					
					
					
                      <div class="form-group form-inline">
                      <label>price </label>
                      <input type="text" name="price" class="form-control" style="margin-left:119px;" placeholder="Enter Rent" name="Rent" >
                    </div>
                    
					 <div class="form-group form-inline">
                      <label>price_type </label>
                      <input type="text" name="price_type" class="form-control" style="margin-left:119px;" placeholder="Day/Km/Hour" >
                    </div>
                    
  
                    
					<div class="form-group">
                      <input type="submit" name="submit" style="margin-left:500px;" value="Submit" class="btn btn-primary">
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