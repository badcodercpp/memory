<?php
$connect=mysqli_connect('localhost','root','','shreya');
$pno=mysqli_real_escape_string($connect,$_POST["post_no"]);
$arr=array();
$qqer=mysqli_query($connect,"SELECT comments FROM photo WHERE ph_no='$pno' ORDER BY ph_no DESC ");
$res=mysqli_fetch_array($qqer);
$cm=mysqli_real_escape_string($connect,$res["comments"]);
$cm1=$cm+1;
$cm2=mysqli_real_escape_string($connect,$cm1);
$qq=mysqli_query($connect,"UPDATE photo SET comments='$cm2' WHERE ph_no='$pno' ");
echo $cm2;
?>