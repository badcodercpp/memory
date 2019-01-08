<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$x1=mysqli_real_escape_string($connect,$_POST["x1"]);
$qr=mysqli_query($connect,"SELECT post_no FROM likes WHERE liker_id='$email' ");
while($rs=mysqli_fetch_array($qr))
{
if(in_array($x1,$rs))
{
$d="liked";
}else{
$d="unliked";
}
}
echo $d;
?>
