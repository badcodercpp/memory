<!DOCTYPE HTML>
<html>
<head>
<title>Pictures Zone</title>
<script src="jquery-1.11.2.js"></script>
<script>
$(document).ready(function(){
$(document).on("click",'.redirectH',function(){
top.location.href='HomePage.php';
});
$(".uploadB").click(function(){
$(".new1").html("<table class='input'><tr><td><form class='myform'><input type='file' name='file1' class='file1'></form></td></tr><tr><td><button class='upld'>Upload</button></td></tr><tr><td><p>Upload Status</p></td></tr><tr><td><progress id='progressBar' value='0' max='100' style='width:718px; height:25px;'></progress></td></tr><tr><td><p class='h'></p></td></tr></table>");




$(".upld").click(function(){
var formdata=new FormData($(".myform")[0]);
if(!formdata){
alert("sorry !!!!!!!! firstly you have to choose file to upload");
}else{
$.ajax({
url:'progress.php',
type:'POST',
xhr:function(){
var myXhr=$.ajaxSettings.xhr();
if(myXhr.upload)
{
myXhr.upload.addEventListener('progress',progressHandlingFunction,false);
}
return myXhr;
},
success:function(data){
if(data=='error')
{
alert("it seems that there is some error in uploading please try again");
}else{
$(".new2").prepend(data);

}
},
data:formdata,
cache:false,
contentType:false,
processData:false,
async:true
});
}
});

});
function progressHandlingFunction(e){
if(e.lengthComputable){
var p=((e.loaded/e.total)*100);
$("#progressBar").attr({value:p});
$(".h").html("upload "+p+"% complete and total uploaded size is "+(e.total)/1024+"kb");
}
}




$.ajax({
url:'a1.php',
type:'POST',
success:function(data){
$(".new2").html(data);
},

async:true
});
$(document).on("click",'.like',function(){
var th=$(this);
var l1=$(this).closest(".dabba").find(".hider").val();

$.ajax({
url:'pL.php',
type:'POST',
data:{l1:l1},
success:function(d1){
var ll=th.closest(".dabba").find(".likeVal");
ll.empty();
ll.html(d1);
$(th).replaceWith("<button class='unlike'>Unlike</button>");
},
async:true
});
});
$(document).on("click",'.unlike',function(){
var th1=$(this);
var ht=$(th1).closest(".dabba").find(".likeVal");
var u1=$(th1).closest(".dabba").find(".hider").val();
$.ajax({
url:'pU.php',
data:{u1:u1},
type:'POST',
success:function(dat){

ht.empty();
ht.html(dat);
$(th1).replaceWith("<button class='like'>Like</button>");
},
async:true
});
});
$(document).on("click",'.comment',function(){
var th1=$(this);
var d2=$(this).closest(".dabba").find(".hider").val();
var ss=$(this).closest(".dabba").find(".maa").length;
var ss2=$(this).closest(".dabba").find(".mother").length;
if(ss==0 && ss2==0)
{
var s=$(this).closest(".dabba").append("<div class='maa'><table class='texta'><td><textarea class='tq1' rows='2' cols='65' placeholder='Wana Comment On This Stuff..  ?? Then Just Do It...  :)'></textarea></td><td><button class='send'>Comment</button></td></table></div><div class='mother'></div>");
$.ajax({
url:'PdbC.php',
type:'POST',
data:{d2:d2},
success:function(data){
$(th1).closest(".dabba").find(".mother").append(data+"<button class='btMore'>See More Comments</button>");
},
async:true
});
}

});

$(document).on("click",'.send',function(){
var tth=$(this);
var val=$(this).closest(".dabba").find(".tq1").val();
if(val=='')
{alert("sorry empty comment cannot be send you need to write your own comment thank you");}else{
var post_no=$(this).closest(".dabba").find(".hider").val();
$.ajax({
url:'psb.php',
type:'POST',
data:{post_no:post_no,val:val},
success:function(data){

$(tth).closest(".dabba").find(".mother").prepend(data);
$(tth).closest(".dabba").find(".tq1").val('');
$(tth).closest(".dabba").find(".tq1").css({'background-color':'white','color':'black'});
},
async:false
});
$.ajax({
url:'pcm.php',
type:'POST',
data:{post_no:post_no},
success:function(data){
$(tth).closest(".dabba").find(".commentVal").html(data);
},
async:false
});
}
});
$(document).on("click",'.btMore',function(){
var tth12=$(this);
var no=$(tth12).closest(".dabba").find(".mother").find(".commentdb").length;
var post_no=$(tth12).closest(".dabba").find(".hider").val();
$.ajax({
url:'pmoreC.php',
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
async:true
});
});

$(document).on("click",'.cLike',function(){
var thg=$(this);
var hide=$(this).closest(".kr").find(".chhupa").val();
$.ajax({
url:'pcnew.php',
type:'POST',
data:{hide:hide},
success:function(data){
$(thg).closest(".kr").find(".CLvaL").empty();
$(thg).closest(".kr").find(".CLvaL").html(data+"   Likes");
$(thg).replaceWith("<button class='cUnlike'>Unlike</button>");

},
async:true
});
});
$(document).on("click",'.cUnlike',function(){
var tgh=$(this);
var hide1=$(this).closest(".kr").find(".chhupa").val();
$.ajax({
url:'pcnew1.php',
type:'POST',
data:{hide1:hide1},
success:function(data1){
$(tgh).closest(".kr").find(".CLvaL").empty();
$(tgh).closest(".kr").find(".CLvaL").html(data1+"   Likes");
$(tgh).replaceWith("<button class='cLike'>Like</button>");
},
async:true
});
});
$(document).on("click",'.remove',function(){
var taj=$(this);
var hide2=$(taj).closest(".kr").find(".chhupa").val();
var hide3=$(taj).closest(".dabba").find(".hider").val();
$.ajax({
url:'premoveC.php',
type:'POST',
data:{hide2:hide2,hide3:hide3},
success:function(datav){
if(datav!=='no')
{
$(taj).closest(".dabba").find(".commentVal").html(datav);
$(taj).closest(".kr").remove();
}else{alert("this is not your post Zone you cannot remove this");
$(this).prop("disabled",true);
}
},
async:true
});
});

$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           
var bgd32=$(".new2").find(".dabba").length;
$.ajax({
url:'pjada.php',
type:'POST',
data:{oo1:bgd32},
success:function(ddd){

$(".new2").append(ddd);

},
async:true
});

    }
});

$(".pictures").click(function(){
top.location.href='photo.php';
});
$(".change").click(function(){
top.location.href='changePic.php';
});
$.ajax({
url:'PrPic.php',
type:'POST',
success:function(data){
$(".profile").html(data);
},
async:true
});

$(".redirectV").click(function(){
top.location.href='video.php';
});
$(document).on("mouseenter",'.redirectH',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.redirectH',function(e){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.redirectV',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.redirectV',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.redirectF',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.redirectF',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.like',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.like',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.unlike',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.unlike',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.comment',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.comment',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.send',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.send',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.btMore',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.btMore',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.cLike',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.cLike',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.cUnlike',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.cUnlike',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.remove',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.remove',function(){
$(this).css({'background-color':'transparent'});
$(this).text("Remove Comment");
});
$(document).on("mouseenter",'.uploadB',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.uploadB',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.upld',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.upld',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("focus",'.tq1',function(){
$(this).css({'background-color':'#123123','color':'white'});

});

$(".redirectF").click(function(){
top.location.href='fr.php';
});

$(document).on("click",'.posterP',function(e){

var emailFSR=$(this).closest(".dabba").find(".hiderNASA").val();

$.ajax({
url:'click.php',
type:'POST',
data:{emailFSR:emailFSR},
success:function(){
top.location.href='profile.php';


},
async:true
});

});
$(document).on("click",'.posterPMC',function(e){

var emailFSR=$(this).closest(".dabba").find(".chhupaBH").val();

$.ajax({
url:'click.php',
type:'POST',
data:{emailFSR:emailFSR},
success:function(){
top.location.href='profile.php';


},
async:true
});

});
});
</script>
<style>
.posterPMC{
cursor:pointer;
}
.posterP{
cursor:pointer;
}
.upld{
float:left;
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;


}


.profile{
width:250px;
height:350px;
border:1px solid;

}
body{
background-color:#F0F8FF;
}
.a{
float: left;

margin:0.7%;
width: 20%;

background-color:none;
}
.b{
float:left;

width:54%;
margin:0.7%;
background-color:none;
}
.c{
float:left;

width:21.3%;
margin:0.7%;
background-color:none;

}
.container{
width: 100%;
overflow:hidden;
}
.head{
height:40px;
background-color:#8FBC8F;
}
.uploadT{
border:solid 2px black;
width:718px;
}
.uploadB{
float:right;
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;


}
.input{
border:solid 2px black;
}
.new2{

margin-top:15px;
width:718px;
}
.redirectH{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;

height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;


}
.dabba{

background-color:#F0F8FF;
margin-top:30px;
margin-bottom:30px;
margin-left:0px;
margin-right:0px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.like{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:359px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.comment{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:359px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.unlike{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:359px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.cLike{
background-color:#F0F8FF;
            background-repeat:no-repeat;
width:356px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.cUnlike{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:356px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.remove{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:356px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.btMore{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:716px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.send{
background-color: #F0F8FF;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;

}
.kr{
background-color:#F0F8FF;
margin-top:9px;
margin-bottom:9px;
margin-left:0px;
margin-right:0px;
width:718px;
border:1px solid;
border-radius:5px;


-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}

.posterP{

text-decoration:none !important;

font-size:25px;
font-weight:250px;
}
.redirectV{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;

height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;


}
.HtA{

float:right;


}
.HtA td{
height:30px;
border:2px solid #556B2F;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
}
.redirectF{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;

height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
</style>
</head>
<body >
<header class="head">
<table class="HtA">
<tr>
<td><div class="redirectH">
Home Page
</div>
</td>

<td><div class="redirectV">Videos Zone</div></td>
<td><div class="redirectF">Friends Zone</div></td></tr></table>
</header>
<div class="container">
<div class="a">

<div class="profile"></div>


</div>
<div class="b">
<div class="new1">
<table class="uploadT"><tr><td><p><em>If You Want To Upload Picture (Preferable jpg Image) Then Please Click On Upload Photo Button</em></p></td>
<td><button class="uploadB">Upload Photo</button></td></tr></table>
</div>
<div class="new2"></div>
</div>
<div class="c">

</div>

</div>
</body>
</html>