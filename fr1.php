<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr=mysqli_query($connect,"SELECT name,email,gender,interest FROM shreya_user1 WHERE email !='$email' ");
$ar=array();
$qr2=mysqli_query($connect,"SELECT to1 FROM request  WHERE from1='$email' AND to1 !='$email' ");
while($rs2=mysqli_fetch_array($qr2))
{
$ar[]=$rs2["to1"];

}

while($rs=mysqli_fetch_array($qr))
{

$em=$rs["email"];
$qr5=mysqli_query($connect,"SELECT me,friend FROM myfriend WHERE me='$email' && friend='$em' || me='$em' && friend='$email' ");
$rs5=mysqli_fetch_array($qr5);
$qr3=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$em' ");
$rs3=mysqli_fetch_array($qr3);
 if(in_array($em,$ar))
{
if($rs5["me"]==$email || $rs5["friend"]==$email)
{
}else{
echo '<div class="user"><img src="'.$rs3["pic"].'" width="100" height="100" ><br>Name ::'.$rs["name"].'<input type="hidden" class="hide" value="'.$rs["email"].'"><br>gender::: '.$rs["gender"].'<br> Interested In :: '.$rs["interest"].'<br><button class="cancel">Cancel Request </button></div>';
}
}else{
if($rs5["me"]==$email || $rs5["friend"]==$email)
{
}else{
echo '<div class="user"><img src="'.$rs3["pic"].'" width="100" height="100" ><br>Name ::'.$rs["name"].'<input type="hidden" class="hide" value="'.$rs["email"].'"><br>gender::: '.$rs["gender"].'<br> Interested In :: '.$rs["interest"].'<br><button class="add">Add Friend</button></div>';
}
}
}
?>