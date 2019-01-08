<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$me=mysqli_real_escape_string($connect,$_SESSION["temp"]);

$ar=array();
$qr=mysqli_query($connect,"SELECT me FROM myfriend WHERE me='$me' || friend='$me' ");
while($rs=mysqli_fetch_array($qr))
{
$ar[]=$rs["me"];
}
$x=sizeof($ar);
$qr1=mysqli_query($connect,"SELECT name,gender,mobile,interest,location FROM shreya_user1 WHERE email='$me' ");
$rs1=mysqli_fetch_array($qr1);
echo '<table class="infoTabb"><tr><td>Name </td><td>'.$rs1["name"].'</td></tr>
<tr><td>Contact Info</td><td>'.$me.'</td></tr>
<tr><td></td><td>'.$rs1["mobile"].'</td></tr>
<tr><td>Gender </td><td>'.$rs1["gender"].'</td></tr>
<tr><td>Interested In</td><td>'.$rs1["interest"].'</td></tr>
<tr><td>Home Town</td><td>'.$rs1["location"].'</td></tr>
<tr><td>Total Friends</td><td>'.$x.'</td></tr></table>';
?>