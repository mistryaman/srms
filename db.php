<?php
$hostname= "localhost";
$user="root";
$pass ="root";
$db ="collage";


$conn =mysqli_connect($hostname,$user,$pass,$db);

if(!$conn){
	echo "error";
}else{
	echo "";
}
?>
