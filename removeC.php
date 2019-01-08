<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_SESSION["email"]);
$hide=mysqli_real_escape_string($connect,$_POST["hide2"]);
$hide1=mysqli_real_escape_string($connect,$_POST["hide3"]);
$qrt=mysqli_query($connect,"SELECT commenter FROM comments WHERE cm_no='$hide' ");
$rst=mysqli_fetch_array($qrt);
$qrt1=mysqli_query($connect,"SELECT poster_email FROM post1 WHERE post_no='$hide1' ");
$rst1=mysqli_fetch_array($qrt1);
if($rst["commenter"]==$em || $rst1["poster_email"]==$em)
{
$qr=mysqli_query($connect,"DELETE FROM comments WHERE cm_no='$hide' ");
$q=mysqli_query($connect,"SELECT comments FROM post1 WHERE post_no='$hide1' ");
$rs=mysqli_fetch_array($q);

$cmt=$rs["comments"];
$cmtt=$cmt-1;
$cmt1=mysqli_real_escape_string($connect,$cmtt);
$query=mysqli_query($connect,"UPDATE post1 SET comments='$cmt1' WHERE post_no='$hide1' ");
echo $cmt1;
}else{ echo "no";}
?>