<?php
session_start();

$connect=mysqli_connect('localhost','root','','shreya');
$eid=mysqli_real_escape_string($connect,$_SESSION["email"]);
$post_no=mysqli_real_escape_string($connect,$_POST["d2"]);
$var1=mysqli_query($connect, "SELECT cm_no,comment,commenter,liked,liker from comments WHERE post_no='$post_no'  ORDER BY cm_no DESC LIMIT 3 ");

while($rs=mysqli_fetch_array($var1))
{
$email=$rs["commenter"];
$var=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$email' ");
$rs1=mysqli_fetch_array($var);

$cm=$rs["cm_no"];
$qcs=mysqli_query($connect,"SELECT liker FROM comments WHERE cm_no='$cm'  ");
$rsc=mysqli_fetch_array($qcs);
$em1=$rsc["liker"];
if($em1==$eid)
{
echo '<div class="kr"><table class="commentdb"><tr><td><div class="posterPMC" ><font size="4">'.$rs1["name"].'</font></div>   </td><td>Comments This</td></tr></table><table><tr><td><font  size="3"><b><em>'.$rs["comment"].'</em></b></font></td></tr></table><input type="hidden" class="chhupa" value= '.$rs["cm_no"].'><input type="hidden" class="chhupaBH" value= '.$email.'><div class="CLvaL">'.$rs["liked"].' Likes </div>  <button class="cUnlike">Unlike</button>     <button class="remove">Remove Comment</button></div>';
}
else{
echo '<div class="kr"><table class="commentdb"><tr><td><div class="posterPMC" ><font size="4">'.$rs1["name"].'</font></div>  </td><td> Comments This</td></tr></table><table><tr><td><font  size="3"><b><em>'.$rs["comment"].'</em></b></font></td></tr></table><input type="hidden" class="chhupa" value= '.$rs["cm_no"].'><input type="hidden" class="chhupaBH" value= '.$email.'><div class="CLvaL">'.$rs["liked"].' Likes </div>  <button class="cLike">Like</button>     <button class="remove">Remove Comment</button></div>';
}
}
?>