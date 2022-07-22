<?php
if(isset($_SESSION['cust_id']))
{
	
}
ELSE
{
	echo "<script>			
		window.location='index';
		</script>";
}
include_once('header.php');
?>
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Edit Profile</h3>
						<form method="post" enctype="multipart/form-data" >
							<input type="text" name="name" value="<?php echo $fetch->name?>" placeholder="Name:" class="form-control" />
							<br>
							<input type="text" name="username" value="<?php echo $fetch->username?>" placeholder="User Name:" class="form-control" />
							
							<br>
							<b>Gender:</b>
							<br>
							<br>
							<?php
							$gender=$fetch->gender;
							if($gender=="Male")
							{
							?>
							Male:<input type="radio" name="gender" value="Male" checked>
							Female:<input type="radio" name="gender" value="Female">
							<?php
							}
							else
							{
							?>
							Male:<input type="radio" name="gender" value="Male" >
							Female:<input type="radio" name="gender" value="Female" checked>
							<?php
							}
							?>
							<br>
							<br>
							<b>Lag:</b>
							<br>
							<br>
							
							Hindi:<input type="checkbox" name="languages[]" value="Hindi" <?php
							$languages=$fetch->languages;
							$languages_arr=explode(",",$languages);
							if(in_array("Hindi",$languages_arr))
							{
								echo "checked";
							}
							?> >
							English:<input type="checkbox" name="languages[]" value="English" <?php
							$languages=$fetch->languages;
							$languages_arr=explode(",",$languages);
							if(in_array("English",$languages_arr))
							{
								echo "checked";
							}
							?>>
							Gujarati:<input type="checkbox" name="languages[]" value="Gujarati" <?php
							$languages=$fetch->languages;
							$languages_arr=explode(",",$languages);
							if(in_array("Gujarati",$languages_arr))
							{
								echo "checked";
							}
							?>>
							<br>
							<br>
							<input type="email" name="email" value="<?php echo $fetch->email?>" placeholder="email:" class="form-control" />
							
							<br>
							<input type="number" name="mobile" value="<?php echo $fetch->mobile?>" placeholder="mobile:" class="form-control" />
							
							<br>
							<input type="file" name="img" value="<?php echo $fetch->img?>" class="form-control" />
							<img src="upload/customer/<?php echo $fetch->img?>" height="50px" width="50px">
							<br>
							<br>
							<br>
							<div>
								<div class="clear"></div>
								<div class="btns">
									<input type="submit" name="update" data-type="submit" class="btn" value="Save">
									<a href="login" class="float-right">Click here for Login</a>
								</div>
							</div>
						</form>
					</div>
					
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
<?php
include_once('footer.php');
?>