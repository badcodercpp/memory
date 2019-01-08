<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');

$status=1;
$id=mysqli_real_escape_string($connect,$_SESSION["email"]);
$st=mysqli_real_escape_string($connect,$status);
$to=mysqli_real_escape_string($connect,$_POST["xx"]);
$qr=mysqli_query($connect,"INSERT INTO request VALUES('$to','$id','$st') ");
?>
