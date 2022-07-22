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
	
	function select_like($tbl,$col,$value)
	{
		$sel="select * from $tbl  where $col like '$value%'";  // query
		$run=$this->conn->query($sel); // run on db
		while($fetch=$run->fetch_object()) // data db fetch 
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	
	
	
	function select_order($tbl,$col)
	{
		$sel="select * from $tbl order by $col";  // query
		$run=$this->conn->query($sel); // run on db
		while($fetch=$run->fetch_object()) // data db fetch 
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	
	function select_join2($tbl1,$tbl2,$cond)
	{
		$sel="select * from $tbl1 join $tbl2 on $cond";  // query
		$run=$this->conn->query($sel); // run on db
		while($fetch=$run->fetch_object()) // data db fetch 
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	
	function select_join3($tbl1,$tbl2,$cond1,$tbl3,$cond2)
	{
		$sel="select * from $tbl1 join $tbl2 on $cond1 join $tbl3 on $cond2";  // query
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
	
	function select_where_join2($tbl1,$tbl2,$cond,$where)
	{
		$key_arr=array_keys($where);
		$value_arr=array_values($where);
		
		$sel="select * from $tbl1 join $tbl2 on $cond where 1=1";  // 1=1 query continue
		$i=0;
		foreach($where as $w)
		{
			$sel.=" and $key_arr[$i]='$value_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel); // run on db
		return $run;	
	}
	
	function select_where_join3($tbl1,$tbl2,$cond1,$tbl3,$cond2,$where)
	{
		$key_arr=array_keys($where);
		$value_arr=array_values($where);
		
		echo $sel="select * from $tbl1 join $tbl2 on $cond1 join $tbl3 on $cond2 where 1=1 ";  // 1=1 query continue
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
	
	
	function update_where($tbl,$data,$where)
	{
		$key_arr=array_keys($data);
		$value_arr=array_values($data);
		
		$upd="update $tbl set ";  // 1=1 query continue
		$j=0;
		$total=count($data);
		foreach($data as $d)
		{
			if($total==$j+1)
			{
				$upd.=" $key_arr[$j]='$value_arr[$j]'";
			}
			else
			{
				$upd.=" $key_arr[$j]='$value_arr[$j]',";
				$j++;
			}
		}
		
		$wkey_arr=array_keys($where);
		$wvalue_arr=array_values($where);
		$upd.=" where 1=1";  // 1=1 query continue
		$i=0;
		foreach($where as $w)
		{
			$upd.=" and $wkey_arr[$i]='$wvalue_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($upd); // run on db
		return $run;	
	}
	
}
$obj=new model;


?>
