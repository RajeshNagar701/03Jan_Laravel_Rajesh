<?php
if(isset($_SESSION['cust_id']))
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
						<h3>Signup Us</h3>
						<form method="post" enctype="multipart/form-data" >
							<input type="text" name="name" placeholder="Name:" class="form-control" />
							<br>
							<input type="text" name="username" placeholder="User Name:" class="form-control" />
							<br>
							<input type="password" name="password" placeholder="Password:" class="form-control" />
							
							<br>
							<b>Gender:</b>
							<br>
							<br>
							Male:<input type="radio" name="gender" value="Male" >
							Female:<input type="radio" name="gender" value="Female">
							<br>
							<br>
							<b>Lag:</b>
							<br>
							<br>
							Hindi:<input type="checkbox" name="languages[]" value="Hindi" >
							English:<input type="checkbox" name="languages[]" value="English" >
							Gujarati:<input type="checkbox" name="languages[]" value="Gujarati" >
							<br>
							<br>
							<input type="email" name="email" placeholder="email:" class="form-control" />
							
							<br>
							<input type="number" name="mobile" placeholder="mobile:" class="form-control" />
							
							<br>
							<input type="file" name="img" class="form-control" />
							
							<br>
							
							<div>
								<div class="clear"></div>
								<div class="btns">
									<input type="submit" name="signup" data-type="submit" class="btn" value="Signup">
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