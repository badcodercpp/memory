<?php
session_start();

$connect=mysqli_connect('localhost','root','','shreya');
$oo1=mysqli_real_escape_string($connect,$_POST["oo1"]);
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr1=mysqli_query($connect,"SELECT ph_no,poster_name,poster_email,posted_data,likes,comments FROM photo  ORDER BY ph_no DESC LIMIT 5 OFFSET $oo1 ");
$ar=array();
while($rs1=mysqli_fetch_array($qr1))
{
$phId=$rs1["ph_no"];
$qr=mysqli_query($connect,"SELECT liker_id FROM plikes WHERE ph_no='$phId' ");
$res=mysqli_fetch_array($qr);
if($res["liker_id"]==$email)
{
echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$rs1["poster_name"].'</div></td><td>  Posted this</td></tr></table><img src="'.$rs1["posted_data"].'" height="570" width="600" alt="ajay"></img>'.'<input type="hidden" name="hider" class="hider" value='.$rs1["ph_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rs1["poster_email"] .'><table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table><button class="unlike">Unlike</button><button class="comment">Comment</button></div>';
}else{
echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$rs1["poster_name"].'</div></td><td>  Posted this</td></tr></table><img src="'.$rs1["posted_data"].'" height="570" width="600" alt="ajay"></img>'.'<input type="hidden" name="hider" class="hider" value='.$rs1["ph_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rs1["poster_email"] .'><table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table><button class="like">Like</button><button class="comment">Comment</button></div>';
}
}


?>