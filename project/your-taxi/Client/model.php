<?php

class model
{
	public $conn="";
	function __construct()
	{					// hostname  // username // pass // db
		$this->conn=new mysqli('localhost','root','','bmk');
	}
	function select($tbl)
	{
		$sel="select * from $tbl";  // query
		$run=$this->conn->query($sel); // run on db
		while($fetch=$run->fetch_object()) // data db fetch 
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	

	
	
	function insert($tbl,$arr)
	{
		$key_arr=array_keys($arr); // array("0"=>emp_name,"1"=>emp_unm)
		$col=implode(",",$key_arr); // emp_name,emp_unm
		
		$value_arr=array_values($arr); // array("0"=>emp_name,"1"=>emp_unm)
		$value=implode("','",$value_arr); // emp_name,emp_unm
		
	echo 	$ins="insert into $tbl($col)values('$value')";  //'raj','raj@123','123'
		$run=$this->conn->query($ins); // run on db
		return $run;
	}
	
	function select_where($tbl,$where)
	{
		$key_arr=array_keys($where);
		$value_arr=array_values($where);
		
		$sel="select * from $tbl where 1=1";  // 1=1 query continue
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $key_arr[$i]='$value_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel); // run on db
		return $run;	
	}
	
	function delete_where($tbl,$where)
	{
		$key_arr=array_keys($where);
		$value_arr=array_values($where);
		
		$del="delete from $tbl where 1=1";  // 1=1 query continue
		$i=0;
		foreach($where as $w)
		{
			$del.=" and $key_arr[$i]='$value_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($del); // run on db
		return $run;	
	}
	
	
}
$obj=new model;


?>
