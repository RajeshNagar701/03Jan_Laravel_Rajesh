<?php

$conn=new mysqli('localhost','root','','ecar');
$myFile = "country.xml";
$file = fopen($myFile, 'w') or die("can't open file");
$xmltag = '<?xml version="1.0" encoding="utf-8"?>';
$xmltag .= '<country>';

$se="select *from countries";
$res=$conn->query($se);
while($x=$res->fetch_object())
{
	
	$xmltag .= '<cid>' . $x->cid .'</cid>';
	$xmltag .= '<cnm>'.$x->cnm.'</cnm>';
	
}
$xmltag .= '</country>';

fwrite($file, $xmltag);
fclose($file);

$myFile = "country.xml";
$file = fopen($myFile,'r');
echo fread($file,filesize($myFile));
fclose($file);
?>