<?php
$rs1["name"]="xx";
$arr1["data"]= '<div class="kr"><table class="commentdb"><tr><td><font color="red" size="4"><b><em>$rs1["name"]</em><b></font></td><td><font color="red" size="3"><b><em>  comments this</em></b></font></td></tr><tr><td><font color="green" size="3"><b><em>$arr["$i"]</em></b></font></td></tr></table><button class="seeMore">See More Comment</button></div>';
$json=json_encode($arr1);
echo $json;

?>
