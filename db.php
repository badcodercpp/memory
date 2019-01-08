<?php
$connect=mysqli_connect('localhost','root','','shreya');
if($connect==TRUE)
{
echo "hehe";
}
$name=mysqli_real_escape_string($connect,$_POST["name"]);
$email=mysqli_real_escape_string($connect,$_POST["email"]);
$password=mysqli_real_escape_string($connect,$_POST["password"]);
$sequirity=mysqli_real_escape_string($connect,$_POST["sequirity"]);
$mobile=mysqli_real_escape_string($connect,$_POST["mobile"]);
$gender=mysqli_real_escape_string($connect,$_POST["gender"]);
$interest=mysqli_real_escape_string($connect,$_POST["interest"]);
$location=mysqli_real_escape_string($connect,$_POST["location"]);
$department=mysqli_real_escape_string($connect,$_POST["department"]);
$subject=mysqli_real_escape_string($connect,$_POST["subject"]);
$college=mysqli_real_escape_string($connect,$_POST["college"]);
$designation=mysqli_real_escape_string($connect,$_POST["designation"]);
echo $name.$email.$password.$sequirity.$mobile.$gender.$interest.$location.$department.$subject.$college.$designation;
$qr=mysqli_query($connect,"INSERT INTO shreya_user1 VALUES('$name','$email','$password','$sequirity','$mobile',
'$gender','$interest','$location','$department','$subject','$college','$designation')");
if($qr==TRUE)
{
echo "ok";
}else{
echo " not ok";
}
?>