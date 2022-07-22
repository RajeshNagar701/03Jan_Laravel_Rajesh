<?php
/* 
operators


Arithmetic operators    = - * / %
Assignment operators    =     += -= *= /=  %= 
Comparison operators    == === > < >= <= !=
Increment/Decrement operators    ++    --
Logical operators   &&     ||     !
String operators    .    .=
Conditional assignment operators   (cond)?'if':'else';
Array operators 

*/
// Arithmetic + - * / %

/*

$a=10;
$b=20;
$sum=$a+$b;
echo $sum;

*/

//increement & decrimrent 

/*

$a=5;
$a++;
echo "increement value of a++ :".$a."<br>";

$b=10;
$b--;
echo "decreement value is a-- :".$b; 

*/

//logical operators

/*
$a=5;
$b=10;
$c=2;

//logical operators   &&  ||   !

if($a>$b && $a>$c)   // !($a>$b)
{
echo "both condition true";
}
else
{
echo "Not Condition true";
}
*/


// comparision operators   == === > < >= <= !=

/*
$a=100;
$b="100";

if($a==$b) // check value equl to 
{
	echo "true";
}
else
{
	echo "False";
}

*/

/*

if($a===$b) // check data type  & ans
{
	echo "true";
}
else
{
	echo "False";
}

*/

//Assignment Operators / Shorthand operators  =     += -= *= /=  %= 

//$a+=$b   means $a=$a+$b;

/*

$y = 20;
$x=10;  
$x += $y;     // $x=$x+$y

echo $x;

*/

//String Operators   .   .=

/*

$a="Raj";
echo "Hello" . $a . "<br>";


$name="raj";

$name.="Nagar";
$name.="N";

echo $name;
*/

// conditional operators / turnory 

/*
$age=18;

if($age>18)
{
	echo "Man";
}
else
{
	echo "Child";
}


// turnory operator conditional   (cond)? yes : No

echo $ans=($age>18)? "Man" : "Child";  // codition ? "yes":"no";   ?:

*/


?>