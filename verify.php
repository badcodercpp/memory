<?php
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_POST["email"]);
$password=mysqli_real_escape_string($connect,$_POST["password"]);
$qr=mysqli_query($connect,"SELECT password FROM shreya_user1 WHERE email='$email' ");
$rs=mysqli_fetch_array($qr);
if($rs["password"]==$password)
{
$var="ok";
}
else{
$var="not ok";
}
$json=json_encode($var);
echo $json;
?> 
