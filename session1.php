<?php
session_start();
$no=$_POST["post"];
$_SESSION["post_no"]=$no;
echo $_SESSION["post_no"];
?>