<?php
$connect=mysqli_connect('localhost','root','','shreya');
$qr=mysqli_query($connect,"SELECT news FROM news ORDER BY no DESC ");
while($rs=mysqli_fetch_array($qr))
{
echo '<table class="newsT"><tr><td><a class="admin" href="#">Admin</a>     '.$rs["news"].'</td></tr></table><br>';
}
?>