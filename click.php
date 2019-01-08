<?php
session_start();
$x=$_POST["emailFSR"];
$_SESSION["temp"]=$x;
echo $_SESSION["temp"];
?>