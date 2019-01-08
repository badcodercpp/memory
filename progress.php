<?php
session_start();
$connect=mysqli_connect('localhost','root','','shreya');
$email=mysqli_real_escape_string($connect,$_SESSION["email"]);
$likes=0;
$comments=0;
$qrr=mysqli_query($connect,"SELECT name FROM shreya_user1 WHERE email='$email' ");
$rss=mysqli_fetch_array($qrr);
$name=$rss["name"];

$target_dir="C:\wamp\www\shreya\ajay\a";
$target_file=$target_dir.basename($_FILES["file1"]["name"]);
$tname='a'.basename($_FILES["file1"]["name"]);
$tnam=mysqli_real_escape_string($connect,$tname);
$ttf=mysqli_real_escape_string($connect,$target_file);
if(move_uploaded_file($_FILES["file1"]["tmp_name"],$target_file))
{
$qr=mysqli_query($connect,"INSERT INTO photo(poster_email,poster_name,posted_data,likes,comments) VALUES('$email','$name','$tnam','$likes','$comments') ");

if($qr)
{
$qr1=mysqli_query($connect,"SELECT ph_no,posted_data,likes,comments FROM photo  WHERE poster_email='$email' ORDER BY ph_no DESC  ");
$rs1=mysqli_fetch_array($qr1);
echo '<div class="dabba"><table><tr><td><div class="posterP" >'.$name.'</div> </td><td> Posted this</td></tr></table><img src="'.$rs1["posted_data"].'" height="570" width="600" alt="ajay"></img>'.'<input type="hidden" name="hider" class="hider" value='.$rs1["ph_no"] .'><input type="hidden" name="hiderNASA" class="hiderNASA" value='.$email .'><table class="tabLikes"><tr><td><div class="likeVal">'.$rs1["likes"].'</td><td>Likes</div></td><td><div class="commentVal">'.$rs1["comments"].'</td><td>Comments</div></td></tr></table><button class="like">Like</button><button class="comment">Comment</button></div>';

}
}else{
echo "error";
}
?>