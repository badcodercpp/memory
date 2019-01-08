<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$my=mysqli_real_escape_string($connect,$_SESSION["email"]);
$ar=array();
$qra=mysqli_query($connect,"SELECT friend FROM myfriend WHERE me='$my' ");
while($gg=mysqli_fetch_array($qra))
{
$ar[]=$gg["friend"];
}

$qr=mysqli_query($connect,"SELECT from1 FROM request WHERE to1='$my' ");

while($rs11=mysqli_fetch_array($qr))
{
$from=$rs11["from1"];
$qr3=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$from' ");
$rs3=mysqli_fetch_array($qr3);
$qrb=mysqli_query($connect,"SELECT name,gender,interest FROM shreya_user1 WHERE email='$from' ");
while($rs=mysqli_fetch_array($qrb))
{
if(in_array($from,$ar))
{



}else{
$qr=mysqli_query($connect,"SELECT name,gender,interest FROM shreya_user1 WHERE email='$from' ");
$rs=mysqli_fetch_array($qr);
echo '<div class="user"><img src="'.$rs3["pic"].'" width="100" height="100" ><br>Name ::'.$rs["name"].'<input type="hidden" class="hide" value="'.$from.'"><br>gender::: '.$rs["gender"].'<br> Interested In :: '.$rs["interest"].' <button class="accept">Accept Friend Request</button></div>';
}
}

}

?>