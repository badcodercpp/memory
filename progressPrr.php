<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["temp"]);



$target_dir="C:\wamp\www\shreya\ajay\a";
$target_file=$target_dir.basename($_FILES["file1"]["name"]);
$tname='a'.basename($_FILES["file1"]["name"]);
$tnam=mysqli_real_escape_string($connect,$tname);
$ttf=mysqli_real_escape_string($connect,$target_file);
if(move_uploaded_file($_FILES["file1"]["tmp_name"],$target_file))
{
$qr=mysqli_query($connect,"INSERT INTO cover1(id,pic) values('$email','$tnam') ");

if($qr)
{

echo '<img src="'.$tnam.'" height="400" width="780" >';
}
}else{
echo "error";
}
?>