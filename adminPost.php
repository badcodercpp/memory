<?php
$connect=mysqli_connect('localhost','root','','shreya');
$data=mysqli_real_escape_string($connect,$_POST["val"]);
$qr=mysqli_query($connect,"INSERT INTO news(news) VALUES('$data') ");
if($qr)
{
echo "ok";
}
?>