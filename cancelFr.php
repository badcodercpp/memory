<?php
$connect=mysqli_connect('localhost','root','','shreya');
$em=mysqli_real_escape_string($connect,$_POST["xx"]);
$qr=mysqli_query($connect,"DELETE FROM request WHERE to1='$em' ");
if($qr)
{
echo "deleted";
}
?>