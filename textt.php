<?php 
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_SESSION["temp"]);
$qr=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$em' ");
$rs=mysqli_fetch_array($qr);
echo '<h3>Post Timeline Of '.$rs["name"].'</h3>';
?> 