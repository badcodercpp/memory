<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$val=$_POST["cb"];
$post_no=mysqli_real_escape_string($connect,$_SESSION["post_no"]);
//$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
//$x=mysqli_real_escape_string($connect,$val);
//$var=mysqli_query($connect,"INSERT INTO comments(post_no,commenter,comment) VALUES('$post_no','$email','$x') ");
$var1=mysqli_query($connect, "SELECT cm_no,comment,commenter from comments WHERE post_no='$post_no' ORDER BY cm_no DESC LIMIT 3 OFFSET $val ");
//$var2=mysqli_query($connect, " SELECT name FROM shreya_user1 WHERE email='$email' ");
//$rs1=mysqli_fetch_array($var2);
//$arr=array();
$i=0;
/*while($rs=mysqli_fetch_array($var1))
{
$i=$i+1;
$arr["$i"]=$rs["comment"];
}

$length=sizeof($arr);

if($length >=3)
{
for($i=1;$i<=3;$i++)
{
echo '<div class="kr"><table class="commentdb"><tr><td><font color="red" size="4"><b><em>'.$rs1["name"].'</em>   Comments This<b></font></td></tr><tr><td><font color="green" size="3"><b><em>'.$arr["$i"].'</em></b></font></td></tr></table>    <button class="cLike">Like</button>    <button class="cComment">Comment</button>    <button class="remove">Remove Comment</button></div>';
if($i===3)
{
echo '<div class="more"><button class="seeMore">See Next Comments</button></div>';
break;
}

}
}else{
for($i=1;$i<=$length;$i++)
{
echo '<div class="kr"><table class="commentdb"><tr><td><font color="red" size="4"><b><em>'.$rs1["name"].'</em>   Comments This<b></font></td></tr><tr><td><font color="green" size="3"><b><em>'.$arr["$i"].'</em></b></font></td></tr></table>    <button class="cLike">Like</button>    <button class="cComment">Comment</button>    <button class="remove">Remove Comment</button></div>';
}
}*/
/*while($rs=mysqli_fetch_array($var1))
{
$s=$rs["commenter"];
$qrr=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$s' ");
$rsss=mysqli_fetch_array($qrr);

echo '<div class="kr"><table class="commentdb"><tr><td><font color="red" size="4"><b><em>'.$rsss["name"].'</em>   Comments This<b></font></td></tr><tr><td><font color="green" size="3"><b><em>'.$rs["comment"].'</em></b></font></td></tr></table><input type="hidden" class="chhupa" value= '.$rs["cm_no"].'>  <button class="cLike">Like</button>     <button class="remove">Remove Comment</button></div>';


}
*/
while($rs=mysqli_fetch_array($var1))
{
echo '<div class="kr"><table class="commentdb"><tr><td><font color="red" size="4"><b><em>'.$rs["commenter"].'</em>   Comments This<b></font></td></tr><tr><td><font color="green" size="3"><b><em>'.$rs["comment"].'</em></b></font></td></tr></table><input type="hidden" class="chhupa" value= '.$rs["cm_no"].'>  <button class="cLike">Like</button>     <button class="remove">Remove Comment</button></div>';
}

?>