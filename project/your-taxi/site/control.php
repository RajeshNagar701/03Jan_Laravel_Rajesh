<?php

include_once('../Admin/model.php'); // step 1 


class control extends model  // step 2  extend model into control
{ 
	function __construct()
	{
		session_start();
		$path=$_SERVER['PATH_INFO']; 	// GET URL PATH 
		model::__construct(); // step 3
		
		
		
		switch($path)
		{
			case '/index':
			include_once('index.php');
			break;
			
			case '/about':
			include_once('about.php');
			break;
			
			case '/adv_car':
			$adv_arr=$this->select('advertisement');
			include_once('adv_car.php');
			break;
			
			case '/services':
			include_once('services.php');
			break;
			
			case '/contact':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$comment=$_REQUEST['comment'];

				$data=array("name"=>$name,"email"=>$email,"comment"=>$comment);
				
				$res=$this->insert('contact',$data);
				if($res)
				{
					
					echo "<script>
					alert('contact Add Success');
					window.location='contact';
					</script>";
				}
				else
				{
					echo "Not success";
				}
			}
			include_once('contact.php');
			break;
			
			case '/signup':
			if(isset($_REQUEST['signup']))
			{
				$name=$_REQUEST['name'];
				$username=$_REQUEST['username'];
				$password=$_REQUEST['password'];
				$enc_pass=md5($password);
				$gender=$_REQUEST['gender'];
				$languages_arr=$_REQUEST['languages'];
				$languages=implode(",",$languages_arr);
				$email=$_REQUEST['email'];
				$mobile=$_REQUEST['mobile'];
				
				//img upload
				$img=$_FILES['img']['name'];
				$path='upload/customer/'.$img;
				$dup_img=$_FILES['img']['tmp_name'];
				move_uploaded_file($dup_img,$path);
				
				//current dt
				date_default_timezone_set("asia/calcutta");
				$curent_dt=date("Y-m-d H:i:s");
				
				$data=array("name"=>$name,"username"=>$username,"password"=>$enc_pass,"gender"=>$gender,"languages"=>$languages,"email"=>$email,"mobile"=>$mobile,"img"=>$img,"created_dt"=>$curent_dt,
				"updated_dt"=>$curent_dt);
				
				$res=$this->insert('customer',$data);
				if($res)
				{
					echo "<script>
					alert('customer Add Success');
					window.location='signup';
					</script>";
				}
				else
				{
					echo "Not success";
				}
			}
			include_once('signup.php');
			break;
			
			case '/login':
			if(isset($_REQUEST['login']))
			{
				$username=$_REQUEST['username'];
				$password=$_REQUEST['password'];
				$enc_pass=md5($password);
				
				$where=array("username"=>$username,"password"=>$enc_pass);
				$res=$this->select_where('customer',$where);
				$ans=$res->num_rows;
				if($ans==1) // one means true / 0 means false
				{
					$fetch=$res->fetch_object();
					$status=$fetch->status;
					if($status=="Unblock")
					{
						$name=$fetch->name;
						$cust_id=$fetch->cust_id;
						
						$_SESSION['name']=$name;
						$_SESSION['cust_id']=$cust_id;
						
						if(isset($_REQUEST['rem']))
						{
							setcookie('username',$username,time()+(24*60*60));
							setcookie('password',$password,time()+(24*60*60));
						}
						echo "<script>
						alert('Login Success');
						window.location='index';
						</script>";
					}
					else
					{
						echo "<script>
					alert('Login Failed Due To User Blocked');
					window.location='login';
					</script>";	
					}
				}
				else
				{
					echo "<script>
					alert('Login Failed Due To wrong credantial !');
					window.location='login';
					</script>";	
				}
			}
			include_once('login.php');
			break;
			
			
			case '/logout':
			unset($_SESSION['name']);
			unset($_SESSION['cust_id']);
			echo "<script>
					alert('Logout Success');
					window.location='index';
					</script>";
			break;
			
			case '/myaccount':
			
			$cust_id=$_SESSION['cust_id'];
			$where=array("cust_id"=>$cust_id);
			$res=$this->select_where('customer',$where);
			$fetch=$res->fetch_object();
			include_once('myaccount.php');
			break;
			
			case '/edit_user':
			if(isset($_REQUEST['btn_cust_id']))
			{
				$cust_id=$_REQUEST['btn_cust_id'];
				$where=array("cust_id"=>$cust_id);
				$res=$this->select_where('customer',$where);
				$fetch=$res->fetch_object();
				$old_img=$fetch->img;
				
				if(isset($_REQUEST['update']))
				{
					$name=$_REQUEST['name'];
					$username=$_REQUEST['username'];
					$gender=$_REQUEST['gender'];
					$languages_arr=$_REQUEST['languages'];
					$languages=implode(",",$languages_arr);
					$email=$_REQUEST['email'];
					$mobile=$_REQUEST['mobile'];
					//current dt
					date_default_timezone_set("asia/calcutta");
					$updated_dt=date("Y-m-d H:i:s");
					
					if($_FILES['img']['size']>0)
					{
						//img upload
						$img=$_FILES['img']['name'];
						$path='upload/customer/'.$img;
						$dup_img=$_FILES['img']['tmp_name'];
						move_uploaded_file($dup_img,$path);
		
						$data=array("name"=>$name,"username"=>$username,"gender"=>$gender,"languages"=>$languages,"email"=>$email,"mobile"=>$mobile,"img"=>$img,"updated_dt"=>$updated_dt);
						$res=$this->update_where('customer',$data,$where);
						if($res)
						{
							unlink('upload/customer/'.$old_img);
							echo "<script>
							alert('customer Update Success');
							window.location='myaccount';
							</script>";
						}
					}
					else
					{
						$data=array("name"=>$name,"username"=>$username,"gender"=>$gender,"languages"=>$languages,"email"=>$email,"mobile"=>$mobile,"updated_dt"=>$updated_dt);
						$res=$this->update_where('customer',$data,$where);
						if($res)
						{
							echo "<script>
							alert('customer Update Success');
							window.location='myaccount';
							</script>";
						}
					}
					
				}
				
			}
			include_once('edit_user.php');
			break;
			
			default:
			echo "Page Not Found";
			break;
			
		}
	}
	
}
$obj=new control;

?>