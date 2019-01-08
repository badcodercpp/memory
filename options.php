<?php
session_start();
$email=$_SESSION["email"];
$temp=$_SESSION["temp"];
if($email==$temp)
{
echo '<button class="changess">Change Cover Pic</button>';
}else{
echo "other";
}
?>