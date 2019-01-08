<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pictures Zone</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$.ajax({
url:'post1.php',
type:'POST',

success:function(daa){
$(".new2").html(daa);
$(".new2").append("<button class='jada'>See More Post</button>");

},


});


$(".post").click(function(){
var val=$(".textarea").val();
if(val=='')
{
alert("sorry empty post cannot be added");
}else{
//var oo=$(".new2").find(".dabba").length;

$.ajax({
url:'post.php',
data:{val:val},
type:'POST',
success:function(data){
$(".new2").prepend(data);

},
async:false
});
}
});
$(document).on("click",'.like',function(){
var th=$(this);
var l1=$(this).closest(".dabba").find(".hider").val();
alert(l1)
$.ajax({
url:'L.php',
type:'POST',
data:{l1:l1},
success:function(d1){
var ll=th.closest(".dabba").find(".likeVal");
ll.empty();
ll.html(d1);
$(th).replaceWith("<button class='unlike'>Unlike</button>");
},
async:false
});
});
$(document).on("click",'.unlike',function(){
var th1=$(this);
var ht=$(th1).closest(".dabba").find(".likeVal");
var u1=$(th1).closest(".dabba").find(".hider").val();
$.ajax({
url:'U.php',
data:{u1:u1},
type:'POST',
success:function(dat){
ht.empty();
ht.html(dat);
$(th1).replaceWith("<button class='like'>Like</button>");
},
async:false
});
});
$(document).on("click",'.comment',function(){
var th1=$(this);
var d2=$(this).closest(".dabba").find(".hider").val();
var ss=$(this).closest(".dabba").find(".maa").length;
var ss2=$(this).closest(".dabba").find(".mother").length;
if(ss==0 && ss2==0)
{
var s=$(this).closest(".dabba").append("<div class='maa'><table class='texta'><td><textarea class='tq1' rows='2' cols='65'></textarea></td><td><button class='send'>Comment</button></td></table></div><div class='mother'></div>");
$.ajax({
url:'dbC.php',
type:'POST',
data:{d2:d2},
success:function(data){
$(th1).closest(".dabba").find(".mother").append(data+"<button class='btMore'>See More Comments</button>");
},
async:false
});
}

});
$(document).on("click",'.send',function(){
var tth=$(this);
var val=$(this).closest(".dabba").find(".tq1").val();
var post_no=$(this).closest(".dabba").find(".hider").val();
$.ajax({
url:'sb.php',
type:'POST',
data:{post_no:post_no,val:val},
success:function(data){
$(tth).closest(".dabba").find(".mother").prepend(data);
},
async:false
});
$.ajax({
url:'cm.php',
type:'POST',
data:{post_no:post_no},
success:function(data){
$(tth).closest(".dabba").find(".commentVal").html(data);
},
async:false
});
});
$(document).on("click",'.jada',function(){
var oo1=$(".new2").find(".dabba").length;
$.ajax({
url:'jada.php',
type:'POST',
data:{oo1:oo1},
success:function(ddd){
$(".new2").find(".jada").remove();
$(".new2").append(ddd);
$(".new2").append("<button class='jada'>See More Post</button>");
},
async:false
});

});
$(document).on("click",'.btMore',function(){
var tth12=$(this);
var no=$(tth12).closest(".dabba").find(".mother").find(".commentdb").length;
var post_no=$(tth12).closest(".dabba").find(".hider").val();
$.ajax({
url:'moreC.php',
type:'POST',
data:{post_no:post_no,no:no},
success:function(data){
if(data==0)
{
alert("!!!!!!!!!!!!!!! Sorry No More Comments Left To Display !!!!!!!!!!!!!");
}else{
$(tth12).closest(".dabba").find(".mother").append(data+"<button class='btMore'>See More Comments</button>");
$(tth12).closest(".dabba").find(".mother").find(".btMore").eq(0).remove();
}
},
async:false
});
});
$(document).on("click",'.cLike',function(){
var thg=$(this);
var hide=$(this).closest(".kr").find(".chhupa").val();
$.ajax({
url:'cnew.php',
type:'POST',
data:{hide:hide},
success:function(data){
$(thg).closest(".kr").find(".CLvaL").empty();
$(thg).closest(".kr").find(".CLvaL").html(data+"   Likes");
$(thg).replaceWith("<button class='cUnlike'>Unlike</button>");

},
async:false
});
});
$(document).on("click",'.cUnlike',function(){
var tgh=$(this);
var hide1=$(this).closest(".kr").find(".chhupa").val();
$.ajax({
url:'cnew1.php',
type:'POST',
data:{hide1:hide1},
success:function(data1){
$(tgh).closest(".kr").find(".CLvaL").empty();
$(tgh).closest(".kr").find(".CLvaL").html(data1+"   Likes");
$(tgh).replaceWith("<button class='cLike'>Like</button>");
},
async:false
});

});
$(document).on("click",'.remove',function(){
var taj=$(this);
var hide2=$(taj).closest(".kr").find(".chhupa").val();
var hide3=$(taj).closest(".dabba").find(".hider").val();
$.ajax({
url:'removeC.php',
type:'POST',
data:{hide2:hide2,hide3:hide3},
success:function(datav){
$(taj).closest(".dabba").find(".commentVal").html(datav);
$(taj).closest(".kr").remove();

},
async:false
});
});

$(".pictures").click(function(){
top.location.href='Pictures.php';
});
});
</script>
<style>
.bottle{
background-color:blue;
}
.seeMore{
margin-top:2px;
float:right;
}
.seeMore1{
margin-top:2px;
float:left;
}
.send{
float:left;
}

.kr{
background-color:white;
margin-top:3px;
margin-bottom:3px;
margin-left:0px;
margin-right:0px;
width:693px;
}

.kr1{
width:600px;
height:200px;
overflow-y:scroll;
}
.commentdb tr{

background-color:none;
}
.dabba{
border:2px solid black;
background-color:red;
margin-top:5px;
margin-bottom:3px;
margin-left:0px;
margin-right:0px;
}

.a{
float: left;
height:960px;
margin:0.7%;
width: 20%;

background-color:green;
}
.b{
float:left;
height:960px;
width:54%;

margin:0.7%;
background-color:none;
overflow-y:scroll;
}
.c{
float:left;
height:960px;
width:21.3%;
margin:0.7%;
background-color:yellow;

}
.container{
width: 100%;
overflow:hidden;
}
.head{
height:70px;
background-color:blue;
}
.new1{
border:solid 3px black;
}
</style>
</head>
<body >
<header class="head">
</header>
<div class="container">
<div class="a">

</div>
<div class="b">
<div class="new1">
<table class="upload">
<tr><td><button class="upButton>Upload Picture</button></td>
</tr>
</table>
</div>
<div class="new2">

</div>
</div>
<div class="c">
<p>hello</p>
</div>

</div>
</body>
</html>