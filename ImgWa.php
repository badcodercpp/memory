<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_SESSION["temp"]);
$qr=mysqli_query($connect,"SELECT pic FROM cover1 WHERE id='$em' ORDER BY no DESC");
$rs=mysqli_fetch_array($qr);

echo '<img src="'.$rs["pic"].'" height="400" width="780" >';
?>