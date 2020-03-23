<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "szakdolgozat";
$kapcsolat = mysqli_connect($host,$user,$pass,$database);
//a kapcsolat ellenőrzése
if(!$kapcsolat)
{
	die('Kapcsolódási hiba ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
mysqli_query($kapcsolat,"SET NAMES 'UTF8'");
mysqli_query($kapcsolat,"SET CHARACTER SET 'UTF8'");
?>