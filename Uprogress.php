<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);


$target_dir="C:\wamp\www\shreya\ajay\a";
$target_file=$target_dir.basename($_FILES["file1"]["name"]);
$tname='a'.basename($_FILES["file1"]["name"]);
$tnam=mysqli_real_escape_string($connect,$tname);

if(move_uploaded_file($_FILES["file1"]["tmp_name"],$target_file))
{
$qr1=mysqli_query($connect,"DELETE FROM profile WHERE id='$email' ");
$qr=mysqli_query($connect,"INSERT INTO profile VALUES('$email','$tnam') ");
echo "uploaded";
}
?>