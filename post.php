<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$post=mysqli_real_escape_string($connect,$_POST["val"]);
$likes=0;
$comments=0;
$qrr=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$email' ");
$rss=mysqli_fetch_array($qrr);
$name=$rss["name"];
//$qq=mysqli_query($connect," SELECT post_no FROM likes WHERE liker_id='$email' ");
//$xxa=array();
//$oo=mysqli_real_escape_string($connect,$_POST["oo"]);
//while($ss=mysqli_fetch_array($qq))
//{
//$xxa[]=$ss["post_no"];
//}

$qr=mysqli_query($connect,"INSERT INTO post1(poster_email,poster_name,posted_data,likes,comments) VALUES('$email','$name','$post','$likes','$comments') ");
$qr1=mysqli_query($connect,"SELECT post_no,poster_name,posted_data,likes,comments FROM post1  WHERE poster_email='$email' ORDER BY post_no DESC  ");
/*while($rs=mysqli_fetch_array($qr1))
{
if(in_array($rs["post_no"],$xxa))
{
echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$rs["poster_name"].'</div></td><td><font size="4">Posted this</font></td></tr></table><p>'.$rs["posted_data"].'</p>'.'<input type="hidden" name="hider" class="hider" value='.$rs["post_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rrees["poster_email"] .'>'.'<table class="tabLikes"><tr><td><div class="likeVal">'.$rs["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rrees["comments"].'</td><td>Comments</div></td></tr></table><button class="unlike">Unlike</button><button class="comment">Comment</button></div>';
}else{
echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$rs["poster_name"].'</div></td><td><font size="4">Posted this</font></td></tr></table><p>'.$rs["posted_data"].'</p>'.'<input type="hidden" name="hider" class="hider" value='.$rs["post_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rrees["poster_email"] .'>'.'<table class="tabLikes"><tr><td><div class="likeVal">'.$rs["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rrees["comments"].'</td><td>Comments</div></td></tr></table><button class="like">Like</button><button class="comment">Comment</button></div>';
}
}
*/
$rs1=mysqli_fetch_array($qr1);



echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$rs1["poster_name"].'</div></td><td><font size="4">Posted this</font></td></tr></table><p>'.$rs1["posted_data"].'</p>'.'<input type="hidden" name="hider" class="hider" value='.$rs1["post_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$email.'>'.'<table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table><button class="like">Like</button><button class="comment">Comment</button></div>';
?>

