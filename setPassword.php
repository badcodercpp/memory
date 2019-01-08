<?php
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_POST["email"]);
$password=mysqli_real_escape_string($connect,$_POST["password"]);
$qr=mysqli_query($connect,"UPDATE shreya_user1 SET password='$password' WHERE email='$email' ");
if($qr==TRUE)
{
echo "password changed";
}
?>