<?php
$connect=mysqli_connect('localhost','root','','shreya');
$hide=mysqli_real_escape_string($connect,$_POST["hide1"]);
$qr=mysqli_query($connect,"SELECT liked FROM pcomments WHERE cm_no='$hide' ");
$res=mysqli_fetch_array($qr);
$likes=$res["liked"];
$lk=$likes-1;
$like=mysqli_real_escape_string($connect,$lk);
$qr1=mysqli_query($connect,"UPDATE pcomments SET liked='$like',liker='0'  WHERE cm_no='$hide' ");
echo $like;
?>