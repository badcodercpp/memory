<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Home Page</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>

$(document).ready(function(){
$(".videos").click(function(){
top.location.href='video.php';
});
$(".friends").click(function(){
top.location.href='fr.php';
});
$(".logout").click(function(){
$.ajax({
url:'logout.php',
type:'POST',
success:function(){
alert("successfully logout !!!!!!!!!!!!!!!!!!!! HAVE A GOOD DAY ");
top.location.href='Login.php';
},
async:true
});
});
$.ajax({
url:'post1.php',
type:'POST',

success:function(daa){
$(".new2").html(daa);


},


});


$(".post").click(function(){
var val=$(".textarea").val();
if(val=='')
{
alert("sorry empty post cannot be post please do write something to post");
}else{
//var oo=$(".new2").find(".dabba").length;

$.ajax({
url:'post.php',
data:{val:val},
type:'POST',
success:function(data){
$(".new2").prepend(data);
$(".textarea").css({'background-color':'white','color':'black'});
$(".textarea").val('');
},
async:true
});
}
});
$(document).on("click",'.like',function(){
var th=$(this);
var l1=$(this).closest(".dabba").find(".hider").val();

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
async:true
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
var s=$(this).closest(".dabba").append("<div class='maa'><br><table class='texta'><td><textarea class='tq1' placeholder='Wana Comment On This Stuff..  ?? Then Just Do It...  :)'></textarea></td><td><button class='send'>Comment</button></td></table></div><div class='mother'></div>");
$.ajax({
url:'dbC.php',
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
{alert("sorry empty subject cannot be commented please do write something to comment");}else{
var post_no=$(this).closest(".dabba").find(".hider").val();
$.ajax({
url:'sb.php',
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
url:'cm.php',
type:'POST',
data:{post_no:post_no},
success:function(data){
$(tth).closest(".dabba").find(".commentVal").html(data);
},
async:false
});
}
});


$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           
var bgd32=$(".new2").find(".dabba").length;
$.ajax({
url:'jada.php',
type:'POST',
data:{oo1:bgd32},
success:function(ddd){

$(".new2").append(ddd);

},
async:true
});

    }
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
async:true
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
async:true
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
async:true
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

$(".notification").click(function(){
$.ajax({
url:'sesa.php',
type:'POST',
success:function(){
top.location.href='profile.php';
},
async:true
});
});



$(".settings").click(function(){
alert("this part is under developement phase");
});

$(document).on("mouseenter",'.messageBT',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.messageBT',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.notification',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.notification',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.settings',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.settings',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.logout',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.logout',function(){
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
$(document).on("mouseenter",'.friends',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});

$(document).on("mouseleave",'.friends',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.pictures',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.pictures',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.videos',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.videos',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.post',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.post',function(){
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

});
$(document).on("mouseenter",'.change',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});

});
$(document).on("mouseleave",'.change',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("focus",'.textarea',function(){
$(this).css({'background-color':'#123123','color':'white'});

});

$(document).on("focus",'.tq1',function(){
$(this).css({'background-color':'#123123','color':'white'});

});

$(".profile").hover(function(){
$(this).css({'cursor':'pointer'});
});

$.ajax({
url:'flist.php',
type:'POST',
success:function(data){
$(".flist").html(data);
},
async:true
});
$(document).on("click",'.anc',function(e){
e.preventDefault();
var ty=$(this);
$(this).closest(".frndL").append("<div class='allW'><div class='sms'><header class='hdsr'><font size='5'><b><em>Messages</em></b></font><button class='CutBt' ><font color='red'>&#9747</font></button></header><div class='bdy'></div></div><div class='zoneS'></div></div>");
$(".bdy").css({'width':'300px','height':'300px','background-color':'white','overflow-y':'scroll'});
$(".hdsr").css({'background-color':'#8FBC8F','width':'300px','height':'30px','text-align':'center'});
$(".CutBt").css({'float':'right','width':'30px','height':'30px','background-color':'transparent'});
$(".zoneS").html("<table><tr><td><textarea class='TQAS' rows='2' cols='30' ></textarea></td><td><button class='SNDa'>send</button></td></tr></table>");
var to=$(ty).closest(".frndL").find(".hhd").val();
setInterval(function(){
$.ajax({
url:'MsG.php',
data:{to:to},
type:'POST',
success:function(data){

$(ty).closest(".frndL").find(".bdy").html(data);
},
async:true

});
},200);

});
$(document).on("click",'.SNDa',function(){
var ty=$(this);
var val=$(".TQAS").val();
var to=$(ty).closest(".frndL").find(".hhd").val();
$.ajax({
url:'MsG12.php',
data:{to:to,val:val},
type:'POST',
success:function(data){

$(ty).closest(".frndL").find(".bdy").append(data);
$(".TQAS").val('');
},
async:true
});

});

$(document).on("click",'.CutBt',function(){
$(this).closest(".frndL").find(".allW").remove();
});
$(document).on("mouseenter",'.CutBt',function(){
$(this).css({'cursor':'pointer'});
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
.SNDa{
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
.anc{

text-decoration:none !important;

font-size:30px;
font-weight:250px;

}
.MsG{
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
.tq1{
font-size:20px;
width:627px;
}
.textarea{
font-size:20px;
width:627px;
}
.posterP{

text-decoration:none !important;

font-size:25px;
font-weight:250px;
}
.admin{

text-decoration:none !important;

font-size:25px;
font-weight:250px;
}
.MSGt{
border-top:2px solid black;
border-bottom:2px solid black;
background-color:#F0F8FF;
}
.aname{

text-decoration:none !important;

font-size:25px;
font-weight:250px;
}

body{
background-color:#F0F8FF;
}
.bottle{
background-color:blue;
}
.seeMore{
margin-top:2px;
sfloat:right;
}
.seeMore1{
margin-top:2px;
float:left;
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

.logout{
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
.like{
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
.comment{
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
.unlike{
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
.cLike{
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
.profile{
width:250px;
height:350px;
border:1px solid;

}
.change{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:250px;
}
.post{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:75px;
}
.friends{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:235px;
}
.pictures{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:235px;
}
.videos{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:235px;
}
.new2{
border-top:6px solid;
margin-top:15px;
}
.settings{
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
 


.notification{
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
.newsT{
border-top:2px solid black;
border-bottom:2px solid black;
background-color:#F0F8FF;
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
.barakObama{
border-top:1px solid black;'
}
.frndL{
border-bottom:1px solid black;
}

</style>
</head>
<body >
<header class="head">
<table class="HtA">
<tr>
<td><div class="notification">
<?php echo $_SESSION["name"]; ?>
</div>
</td>
<td><div class="settings">Settings</div></td>
<td><div class="logout">LogOut</div></td></tr></table>
</header>

<div class="container">
<div class="a">
<div class="profile"></div>
<button class="change">Change Profile Pic</button>

</div>
<div class="b">
<div class="new1">
<table class="newTab">
<tr>
<td>
<textarea name="textarea"  class="textarea"  align="left" placeholder="Anything In Your Mind Which You Want To Share ........ ?? Then Just Do It........ :) "></textarea>
</td><td><input type="submit" class="post" value="Post"  name="post" />
</td>
</tr>
</table>

<table class="buttTab">
<tr>
<td>
<input type="submit" class="friends" value="Friends" />
</td>
<td>
<input type="submit" class="pictures" value="Pictures" />
</td>
<td>
<input type="submit" class="videos" value="videos" />
</td>
</tr>
</table>
</div>
<div class="new2">

</div>
</div>
<div class="c">
<h1>Your Friends</h1>
<div class="flist">
</div>
</div>

</div>

</body>
</html>