<?php

$host="localhost";
$user="root";
$pass="";
$db="24128448";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>