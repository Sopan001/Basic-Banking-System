<?php
$servername = "localhost";
$username = "root";
$password = "thakur@123";
$database = "banker";
$con = mysqli_connect($servername,$username,$password,$database);
if(!$con){
     //echo "connection successful";
     die("sorry we failed to connect:" .mysqli_connect_error());
}
?>
