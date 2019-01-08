<?php
$connect=mysqli_connect('localhost','root','','shreya');
$use=mysqli_real_escape_string($connect,$_POST["user"]);
$qr=mysqli_query($connect,"DELETE FROM shreya_user1 WHERE email='$use' ");
if($qr==TRUE)
{
$s="ok";
$json=json_encode($s);
echo $json;
}
else {echo "lol";}
?>