<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$liker=mysqli_real_escape_string($connect,$_SESSION["email"]);
$hide=mysqli_real_escape_string($connect,$_POST["hide"]);
$qr=mysqli_query($connect,"SELECT liked FROM vcomments WHERE cm_no='$hide' ");
$res=mysqli_fetch_array($qr);
$likes=$res["liked"];
$lk=$likes+1;
$like=mysqli_real_escape_string($connect,$lk);
$qr1=mysqli_query($connect,"UPDATE vcomments SET liked='$like',liker='$liker' WHERE cm_no='$hide' ");
$ql=mysqli_query($connect," INSERT INTO vclikes VALUES('$hide','$liker')");
echo $like;
?>