<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$post_no=mysqli_real_escape_string($connect,$_SESSION["post_no"]);
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$x=mysqli_real_escape_string($connect,$_POST["value"]);
$var=mysqli_query($connect,"INSERT INTO comments(post_no,commenter,comment) VALUES('$post_no','$email','$x') ");

$qr=" SELECT MAX(cm_no),MIN(cm_no)  FROM comments WHERE post_no='$post_no' ";
$qr1=mysqli_query($connect," $qr");
$rs=mysqli_fetch_row($qr1);
$_SESSION["max"]=$rs[0];
$_SESSION["min"]=$rs[1];
echo '{
	"max":'.$rs[0].',
	"min":'.$rs[1].'
          }';
?>