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
						<h3>Login Us</h3>
						<form method="post" enctype="multipart/form-data" >
							
							<input type="text" name="username" placeholder="User Name:" class="form-control" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}?>" />
							<br>
							<input type="password" name="password" placeholder="Password:" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>" class="form-control" />
							<br>
							<input type="checkbox" name="rem" value="rem"> Remember Me
							<br>
							<br>
							
							<div>
								<div class="clear"></div>
								<div class="btns">
									<input type="submit" name="login" data-type="submit" class="btn" value="Login">
									<a href="signup" class="float-right">Click here for Registration</a>
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