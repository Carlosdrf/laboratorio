<?php
$conexion = mysqli_connect("localhost", "root","","laboratorio");
// Check connection
if(mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
//echo 'conectado';
}
$timezone_identifier = 'America/Caracas';
date_default_timezone_set($timezone_identifier);
?>