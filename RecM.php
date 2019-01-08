<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr=mysqli_query($connect,"SELECT msg,from2 FROM message WHERE to2='$email' ORDER BY no DESC");
while($rs=mysqli_fetch_array($qr))
{
$from=$rs["from2"];
$qr1=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$from' ");
$rs1=mysqli_fetch_array($qr1);
echo '<table class="MSGt"><tr><td><a class="aname" href="#">'.$rs1["name"].'</a>  text you</td></tr><tr><td>'.$rs["msg"].'</td></tr></table><br>';
}
?>