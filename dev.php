<?php 
$connect=mysqli_connect('localhost','root','','user');
$no=mysqli_real_escape_string($connect,$_POST["no"]);
$qr=mysqli_query($connect,"SELECT name FROM dev WHERE no='$no' ");
$rs=mysqli_fetch_array($qr);
echo '<img src='.$rs["name"].' height="570" width="600" alt="ajay"></img>';
?>