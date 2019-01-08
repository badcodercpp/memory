<?php
session_start();
$email=$_SESSION["email"];
$connect=mysqli_connect('localhost','root','','shreya');
$l1=mysqli_real_escape_string($connect,$_POST["l1"]);
$qr=mysqli_query($connect," SELECT likes FROM video WHERE ph_no='$l1' ");
$rs=mysqli_fetch_array($qr);
$like=$rs["likes"];
$l=$like+1;
$likes=mysqli_real_escape_string($connect,$l);
$qrr=mysqli_query($connect," UPDATE  video SET likes='$likes' WHERE ph_no='$l1' ");
$emails=mysqli_real_escape_string($connect,$email);
$ql=mysqli_query($connect," INSERT INTO vlikes VALUES('$l1','$emails')");

echo $likes;
?>