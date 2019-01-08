<?php
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_POST["email"]);
$sequirity=mysqli_real_escape_string($connect,$_POST["sequirity"]);
$qr=mysqli_query($connect,"SELECT sequirity FROM shreya_user1 WHERE email='$email' ");
$rs=mysqli_fetch_array($qr);
if($rs["sequirity"]==$sequirity)
{
$res="ok";
}else{
$res="not ok";
}
$json=json_encode($res);
echo $json;
?>