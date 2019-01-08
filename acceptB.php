<?php
session_start();

$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_POST["xx"]);
$me=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr=mysqli_query($connect,"INSERT INTO myfriend VALUES('$me','$em') ");

?>