<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$me=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qrw=mysqli_query($connect,"SELECT friend FROM myfriend WHERE me='$me' ");

while($rss=mysqli_fetch_array($qrw))
{
$from=$rss["friend"];
$qr3=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$from' ");
$rs3=mysqli_fetch_array($qr3);
$qrbs=mysqli_query($connect,"SELECT name,gender,interest FROM shreya_user1 WHERE email='$from' ");
$Rq=mysqli_fetch_array($qrbs);
echo '<div class="user"><img src="'.$rs3["pic"].'" width="100" height="100" ><br>Name ::'.$Rq["name"].'<input type="hidden" class="hide" value="'.$from.'"><br>gender::: '.$Rq["gender"].'<br> Interested In :: '.$Rq["interest"].'  </div>';
}
?>