<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_SESSION["temp"]);
$qr=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$em' ");
$rs=mysqli_fetch_array($qr);
if($rs==TRUE)
{
echo '<img src="'.$rs["pic"].'" height="400" width="300"></img>';
}
?>