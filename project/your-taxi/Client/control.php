<?php
include_once('../admin/model.php'); // step 1 


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
			if(isset($_REQUEST['submit']))
			{
				$email=$_REQUEST['email'];
				$pass=$_REQUEST['pass'];
				$enc_pass=md5($pass);
				
				$where=array("email"=>$email,"pass"=>$enc_pass);
				$res=$this->select_where('client',$where);
				$ans=$res->num_rows;
				if($ans==1) // one means true / 0 means false
				{
					$fetch=$res->fetch_object();
					$status=$fetch->status;
					if($status=="Unblock")
					{
						$email=$fetch->email;
						$client_id=$fetch->client_id;
						
						$_SESSION['client']=$email;
						$_SESSION['client_id']=$client_id;
						if(isset($_REQUEST['rem']))
						{
							setcookie('email',$email,time()+(24*60*60));
							setcookie('pass',$pass,time()+(24*60*60));
						}
						echo "<script>
						alert('Login Success');
						window.location='dashboard';
						</script>";
					}
					else
					{
						echo "<script>
						alert('Login Failed due to Client Block');
						window.location='index';
						</script>";
					}
				}
				else
				{
					echo "<script>
					alert('Login Failed Due To wrong credantial !');
					window.location='index';
					</script>";	
				}
			}
			include_once('index.php');
			break;
			
			case '/logout':
			unset($_SESSION['client']);
			unset($_SESSION['client_id']);
			echo "<script>
					alert('Logout Success');
					window.location='index';
					</script>";
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/add_car':
			include_once('add_car.php');
			break;
			
			
			
		
			
			case '/manage_car':
			$client_id=$_SESSION['client_id'];
			$where=array("client.client_id"=>$client_id);
			$res=$this->select_where_join3('advertisement','location','advertisement.loc_id=location.loc_id','client','advertisement.client_id=client.client_id',$where);
			while($fetch=$res->fetch_object()) // data db fetch 
			{
				$adv_arr[]=$fetch;
			}
			include_once('manage_car.php');
			break;
			
			case '/manage_booking':
			$client_id=$_SESSION['client_id'];
			$where=array("client_id"=>$client_id);
			$res=$this->select_where('booking',$where);
			while($fetch=$res->fetch_object()) // data db fetch 
			{
				$book_arr[]=$fetch;
			}
			include_once('manage_booking.php');
			break;
			
			
			
			case '/delete':
			
			if(isset($_REQUEST['del_book_id']))
			{
				$book_id=$_REQUEST['del_book_id'];
				$where=array("book_id"=>$book_id);
				$res=$this->delete_where('booking',$where);
				if($res)
				{
					echo "<script>
					alert('booking Delete Success');
					window.location='manage_booking';
					</script>";
				}
			}
			
			
			if(isset($_REQUEST['del_adv_id']))
			{
				$adv_id=$_REQUEST['del_adv_id'];
				$where=array("adv_id"=>$adv_id);
				$res=$this->delete_where('advertisement',$where);
				if($res)
				{
					echo "<script>
					alert('advertisement Delete Success');
					window.location='manage_car';
					</script>";
				}
			}
			
			
			break;
			
			default:
			echo "Page Not Found";
			break;
			
		}
	}
	
}
$obj=new control;

?>