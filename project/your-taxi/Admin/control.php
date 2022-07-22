<?php
include_once('model.php'); // step 1 


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
				$unm=$_REQUEST['unm'];
				$pass=$_REQUEST['pass'];
				$enc_pass=md5($pass);
				
				$where=array("unm"=>$unm,"pass"=>$enc_pass);
				$res=$this->select_where('admin',$where);
				$ans=$res->num_rows;
				if($ans==1) // one means true / 0 means false
				{
					$fetch=$res->fetch_object();
					$unm=$fetch->unm;
					$admin_id=$fetch->admin_id;
					
					$_SESSION['admin']=$unm;
					$_SESSION['admin_id']=$admin_id;
					if(isset($_REQUEST['rem']))
					{
						setcookie('unm',$unm,time()+(24*60*60));
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
					alert('Login Failed Due To wrong credantial !');
					window.location='index';
					</script>";	
				}
			}
			include_once('index.php');
			break;
			
			case '/logout':
			unset($_SESSION['admin']);
			unset($_SESSION['admin_id']);
			echo "<script>
					alert('Logout Success');
					window.location='index';
					</script>";
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/add_emp':
			
			if(isset($_REQUEST['submit']))
			{
				$emp_name=$_REQUEST['emp_name'];
				$emp_unm=$_REQUEST['emp_unm'];
				$emp_pass=$_REQUEST['emp_pass'];
				$enc_pass=md5($emp_pass);
				$email=$_REQUEST['email'];
				$mobile=$_REQUEST['mobile'];
				
				//img upload
				$img=$_FILES['img']['name'];
				$path='upload/employee/'.$img;
				$dup_img=$_FILES['img']['tmp_name'];
				move_uploaded_file($dup_img,$path);
				
				//current dt
				date_default_timezone_set("asia/calcutta");
				$curent_dt=date("Y-m-d H:i:s");
				
				$data=array("emp_name"=>$emp_name,"emp_unm"=>$emp_unm,"emp_pass"=>$enc_pass,"email"=>$email,"mobile"=>$mobile,"img"=>$img,"created_dt"=>$curent_dt,
				"updated_dt"=>$curent_dt);
				
				$res=$this->insert('employee',$data);
				if($res)
				{
					echo "<script>
					alert('Employee Add Success');
					window.location='add_emp';
					</script>";
				}
				else
				{
					echo "Not success";
				}
			}
			
			include_once('add_emp.php');
			break;
			
			case '/manage_emp':
			//$search=$_REQUEST['search'] ? "" ;
			
			
			$emp_arr=$this->select('employee');
			include_once('manage_emp.php');
			break;
			
			case '/manage_user':
			$customer_arr=$this->select_order('customer','name');
			include_once('manage_user.php');
			break;
		
			case '/manage_client':
			$client_arr=$this->select('client');
			include_once('manage_client.php');
			break;
			
			case '/manage_car':
			$adv_arr=$this->select_join3('advertisement','location','advertisement.loc_id=location.loc_id','client','advertisement.client_id=client.client_id');
			include_once('manage_car.php');
			break;
			
			case '/manage_booking':
			$booking_arr=$this->select('booking');
			include_once('manage_booking.php');
			break;
			
			case '/manage_contact':
			$contact_arr=$this->select('contact');
			include_once('manage_contact.php');
			break;
			
			
			case '/delete':
			if(isset($_REQUEST['del_cont_id']))
			{
				$cont_id=$_REQUEST['del_cont_id'];
				$where=array("cont_id"=>$cont_id);
				$res=$this->delete_where('contact',$where);
				if($res)
				{
					echo "<script>
					alert('Contact Delete Success');
					window.location='manage_contact';
					</script>";
				}
			}
			
			if(isset($_REQUEST['del_cust_id']))
			{
				$cust_id=$_REQUEST['del_cust_id'];
				$where=array("cust_id"=>$cust_id);
				
				$res=$this->select_where('customer',$where);
				$fetch=$res->fetch_object();
				$img=$fetch->img;
				
				$res=$this->delete_where('customer',$where);
				if($res)
				{
					unlink('../site/upload/customer/'.$img);
					echo "<script>
					alert('customer Delete Success');
					window.location='manage_customer';
					</script>";
				}
			}
			
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
			
			if(isset($_REQUEST['del_client_id']))
			{
				$client_id=$_REQUEST['del_client_id'];
				$where=array("client_id"=>$client_id);
				$res=$this->delete_where('client',$where);
				if($res)
				{
					echo "<script>
					alert('client Delete Success');
					window.location='manage_client';
					</script>";
				}
			}
			break;
			
			if(isset($_REQUEST['del_emp_id']))
			{
				$emp_id=$_REQUEST['del_emp_id'];
				$where=array("emp_id"=>$emp_id);
				$res=$this->delete_where('employee',$where);
				if($res)
				{
					echo "<script>
					alert('employee Delete Success');
					window.location='manage_emp';
					</script>";
				}
			}
			break;
			
			
			case '/status':
			if(isset($_REQUEST['status_client_id']))
			{
				$client_id=$_REQUEST['status_client_id'];
				$where=array("client_id"=>$client_id);
				
				$res=$this->select_where('client',$where);
				$fetch=$res->fetch_object();
				$status=$fetch->status;
				if($status=="Block")
				{
					$data=array("status"=>"Unblock");
					$res1=$this->update_where('client',$data,$where);
					{
						
						echo "<script>
						alert('Client Unblock Success');
						window.location='manage_client';
						</script>";
					}
				}
				else
				{
					$data=array("status"=>"Block");
					$res1=$this->update_where('client',$data,$where);
					{
						
						echo "<script>
						alert('Client Block Success');
						window.location='manage_client';
						</script>";
					}
				}
			}
			
			if(isset($_REQUEST['status_cust_id']))
			{
				$cust_id=$_REQUEST['status_cust_id'];
				$where=array("cust_id"=>$cust_id);
				
				$res=$this->select_where('customer',$where);
				$fetch=$res->fetch_object();
				$status=$fetch->status;
				if($status=="Block")
				{
					$data=array("status"=>"Unblock");
					$res1=$this->update_where('customer',$data,$where);
					{
						
						echo "<script>
						alert('customer Unblock Success');
						window.location='manage_user';
						</script>";
					}
				}
				else
				{
					$data=array("status"=>"Block");
					$res1=$this->update_where('customer',$data,$where);
					{
						
						echo "<script>
						alert('customer Block Success');
						window.location='manage_user';
						</script>";
					}
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