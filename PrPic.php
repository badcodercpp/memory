<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$email' ");
$rs=mysqli_fetch_array($qr);
if($rs)
{
echo '<img src="'.$rs["pic"].'" height="350" width="250" ></img>';
}
?>
