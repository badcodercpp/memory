<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$ar=array();
$qr1=mysqli_query($connect,"SELECT friend FROM myfriend WHERE me='$email' ");

while($rs1=mysqli_fetch_array($qr1))
{
$ar[]=$rs1["friend"];
}

$qr=mysqli_query($connect,"SELECT name,gender,interest,location,department,designation,subject,college FROM shreya_user1 WHERE email='$email' ");
$rs=mysqli_fetch_array($qr);
echo '<br><table class="infoT"><tr><td>Name</td><td>'.$rs["name"].'</td></tr><tr><td>Gender</td><td>'.$rs["gender"].'</td></tr><tr><td>Interested In</td><td>'.$rs["interest"].'</td></tr><tr><td>Total Friends</td><td>'.sizeof($ar).'</td></tr><tr><td>Designation</td><td>'.$rs["designation"].'</td></tr><tr><td>Department</td><td>'.$rs["department"].'</td></tr><tr><td>Favourite Subject</td><td>'.$rs["subject"].'</td></tr><tr><td>College</td><td>'.$rs["college"].'</td></tr></table>';
?>