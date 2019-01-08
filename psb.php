<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$post_no=mysqli_real_escape_string($connect,$_POST["post_no"]);
$val=mysqli_real_escape_string($connect,$_POST["val"]);
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);

$var=mysqli_query($connect,"INSERT INTO pcomments(post_no,commenter,comment) VALUES('$post_no','$email','$val') ");
if($var==FALSE)
{
echo "lol";
}
$var1=mysqli_query($connect,"SELECT cm_no,commenter,comment,liked FROM pcomments WHERE post_no='$post_no' AND commenter='$email' ORDER BY cm_no DESC ");
$rs1=mysqli_fetch_array($var1);
$qer=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$email' ");
$nn=mysqli_fetch_array($qer);
echo '<div class="kr"><table class="commentdb"><tr><td><div class="posterPMC" ><font size="4">'.$nn["name"].'</font></div>   </td><td>Comments This</td></tr></table><table><tr><td><font  size="3"><b><em>'.$rs1["comment"].'</em></b></font></td></tr></table><input type="hidden" class="chhupa" value= '.$rs1["cm_no"].'><input type="hidden" class="chhupaBH" value= '.$email.'><div class="CLvaL">'.$rs1["liked"].' Likes </div>  <button class="cLike">Like</button>     <button class="remove">Remove Comment</button></div>';
?>