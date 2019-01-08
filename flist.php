<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$me=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr=mysqli_query($connect,"SELECT me,friend FROM myfriend WHERE me='$me' || friend='$me' ");
while($rs=mysqli_fetch_array($qr))
{
$f=$rs["friend"];
$x=$rs["me"];
if($x==$me)
{
$qr1=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$f' ");
$rs1=mysqli_fetch_array($qr1);
$qr2=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$f' ");
$rs2=mysqli_fetch_array($qr2);
echo '<div class="frndL"><table class="list"><tr><td><img src="'.$rs2["pic"].'" height="40" width="40" ></img></td><td><a  class="anc" href="#">'.$rs1["name"].'</a></td></tr></table><input type="hidden" class="hhd" value="'.$f.'"/></div>';
}else if($f==$me)
{
$qr1=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$x' ");
$rs1=mysqli_fetch_array($qr1);
$qr2=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$x' ");
$rs2=mysqli_fetch_array($qr2);
echo '<div class="frndL"><table class="list"><tr><td><img src="'.$rs2["pic"].'" height="40" width="40" ></img></td><td><a  class="anc" href="#">'.$rs1["name"].'</a></td></tr></table><input type="hidden" class="hhd" value="'.$x.'"/></div>';
}
}
?>