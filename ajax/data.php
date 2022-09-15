<?php
$con=new mysqli("localhost","root","","onlinegtpl");
$sql="select * from user";
$res=$con->query($sql);
while($fetch=$res->fetch_object())
{
	$arr[]=$fetch;		
}

foreach($arr as $c)
{
	echo $c->uid . "<br>";
	echo $c->unm . "<br>";
	echo $c->pass . "<br>";
	echo $c->gen . "<br><br><br>";
}


?>
 