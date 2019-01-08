<?php
$connect=mysqli_connect('localhost','root','','shreya');
$qr=mysqli_query($connect,"SELECT name,gender,subject,department,mobile FROM shreya_user1 WHERE designation='HOD' ");
while($rs=mysqli_fetch_array($qr))
{
echo '<table class="hodT"><tr><td>Name </td><td>'.$rs["name"].'</td></tr><tr><td>Gender </td><td>'.$rs["gender"].'</td></tr><tr><td>Department </td><td>'.$rs["department"].'</td></tr><tr><td>Subject </td><td>'.$rs["subject"].'</td></tr><tr><td>Contact No</td><td>'.$rs["mobile"].'</td></tr></table><br>';
}
?>