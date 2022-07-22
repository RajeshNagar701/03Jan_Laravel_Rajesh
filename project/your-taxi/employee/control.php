<?php

class control
{ 
	function __construct()
	{
		$path=$_SERVER['PATH_INFO']; 	// GET URL PATH 
		
		switch($path)
		{
			case '/index':
			include_once('index.php');
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/add_emp':
			include_once('add_emp.php');
			break;
			
			case '/manage_emp':
			include_once('manage_emp.php');
			break;
			
			case '/manage_user':
			include_once('manage_user.php');
			break;
		
			case '/manage_client':
			include_once('manage_client.php');
			break;
			
			case '/manage_car':
			include_once('manage_car.php');
			break;
			
			case '/manage_booking':
			include_once('manage_booking.php');
			break;
			
			
			default:
			echo "Page Not Found";
			break;
			
		}
	}
	
}
$obj=new control;

?>