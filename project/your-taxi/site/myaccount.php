<?php
include_once('header.php');
?>
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div align="center" class="container_12">
					<div class="grid_12" align="center">
						<h3>Edit My Account</h3>
					</div>
					<div >
					<div class="grid_3">.</div>
					<div class="grid_6">
						<div class="box">
							<div class="maxheight">
								<img src="upload/customer/<?php echo $fetch->img;?>" style="width:70%; border-radius:50%" align="center" alt="">
								<div class="text1 color2">
									<a href="#">Name : <?php echo $fetch->name;?></a>
								</div>
								<p>User Name:  <?php echo $fetch->username;?></p>
								<p>Gender:  <?php echo $fetch->gender;?></p>
								<p>Languages:  <?php echo $fetch->languages;?></p>
								<p>Email:  <?php echo $fetch->email;?></p>
								<p>Mobile:  <?php echo $fetch->mobile;?></p>
								
								<br>
								<a href="edit_user?btn_cust_id=<?php echo $fetch->cust_id;?>" class="btn">Edit Profile</a>
							</div>
						</div>
					</div>
					<div class="grid_3">.</div>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
<?php
include_once('footer.php');
?>