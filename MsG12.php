<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$from=mysqli_real_escape_string($connect,$_SESSION["email"]);
$to=mysqli_real_escape_string($connect,$_POST["to"]);
$msg=mysqli_real_escape_string($connect,$_POST["val"]);
$qr=mysqli_query($connect,"INSERT INTO message(to2,from2,msg,curt) VALUES('$to','$from','$msg',now()) ");
//$nqr=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$to' ");
$nqr1=mysqli_query($connect,"SELECT pic FROM profile WHERE id='$from' ");
$p1=mysqli_fetch_array($nqr1);
/* $p=mysqli_fetch_array($nqr);

$qr1=mysqli_query($connect,"SELECT msg,from2 FROM message WHERE to2='$to' && from2='$from' || to2='$from' &&from2='$to' ");
 while($rs1=mysqli_fetch_array($qr1)){
if($rs1["from2"]==$to){
echo '<table class="messTabA"><tr><td><img src="'.$p["pic"].'" height="30" width="30" ></img></td><td>'.$rs1["msg"].'</td></tr></table>';

}else{
echo '<table class="messTabA"><tr><td><img src="'.$p1["pic"].'" height="30" width="30" ></img></td><td>'.$rs1["msg"].'</td></tr></table>';
}
}
*/
if($qr){
$qqer=mysqli_query($connect,"SELECT curt FROM message WHERE from2='$from' ORDER BY no DESC ");
$qqers=mysqli_fetch_array($qqer);
echo '<div class="barakObama"><table class="messTabA"><tr><td><img src="'.$p1["pic"].'" height="30" width="30" ></img></td><td>'.$msg.'</td></tr></table><table class="timeTab"><tr><td>'.$qqers["curt"].'</td></tr></table></div>';
}
?>
