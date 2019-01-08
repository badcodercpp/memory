<?php
session_start();
$email=$_SESSION["email"];
$connect=mysqli_connect('localhost','root','','shreya');
$u1=mysqli_real_escape_string($connect,$_POST["u1"]);
$qr=mysqli_query($connect," SELECT likes FROM video WHERE ph_no='$u1' ");
$rs=mysqli_fetch_array($qr);
$like=$rs["likes"];
$l=$like-1;
$likes=mysqli_real_escape_string($connect,$l);
$qrr=mysqli_query($connect," UPDATE  video SET likes='$likes' WHERE ph_no='$u1' ");
$emails=mysqli_real_escape_string($connect,$email);
$ql=mysqli_query($connect," DELETE FROM vlikes WHERE ph_no='$u1' ");


echo $likes;
?>