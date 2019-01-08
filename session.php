<?php
session_start();
$email=$_POST["email"];
$_SESSION["email"]=$email;
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$email);
$qr=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$em' ");
$rs=mysqli_fetch_array($qr);
$_SESSION["name"]=$rs["name"];

?>
