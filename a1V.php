<?php
session_start();

$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$qr1=mysqli_query($connect,"SELECT ph_no,poster_name,poster_email,posted_data,likes,comments FROM video  ORDER BY ph_no DESC LIMIT 5  ");
$ar=array();
while($rs1=mysqli_fetch_array($qr1))
{
$phId=$rs1["ph_no"];
$qr=mysqli_query($connect,"SELECT liker_id FROM vlikes WHERE ph_no='$phId' ");
$res=mysqli_fetch_array($qr);
if($res["liker_id"]==$email)
{
echo '<div class="dabba"><table><tr><td><div class="posterP" ><font size="4">'.$rs1["poster_name"].'</font></div></td><td>  Posted this</td></tr></table><table><tr><td><video width="715" height="320" controls>
<source src="'.$rs1["posted_data"].'"></td></tr><tr><td><input type="hidden" name="hider" class="hider" value='.$rs1["ph_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rs1["poster_email"] .'></tr></td><tr><td><table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table></tr></td><tr><td><button class="unlike">Unlike</button><button class="comment">Comment</button></tr></td></table></div>';
}else{
echo '<div class="dabba"><table><tr><td><div class="posterP" ><font size="4"> '.$rs1["poster_name"].'</font></div></td><td> Posted this</td></tr></table><table><tr><td><video width="715" height="320" controls>
<source src="'.$rs1["posted_data"].'"></td></tr><tr><td><input type="hidden" name="hider" class="hider" value='.$rs1["ph_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$rs1["poster_email"] .'></tr></td><tr><td><table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table></tr></td><tr><td><button class="like">Like</button><button class="comment">Comment</button></tr></td></table></div>';

}
}


?>