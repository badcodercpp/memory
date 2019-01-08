<!DOCTYPE html>
<html>
<head>
<title>Friends Zone</title>
<script src="jquery-1.11.2.js"></script>
<script>
$(document).ready(function(){
$.ajax({
url:'fr1.php',
type:'POST',
success:function(d){
$(".suggestion").html(d);
},
async:true
});
$(document).on("click",'.add',function(){
var th=$(this);
var xx=$(this).closest(".user").find(".hide").val();
$.ajax({
url:'req.php',
type:'POST',
data:{xx:xx},
success:function(){
$(th).replaceWith("<button class='cancel'>Cancel Request </button>");
},
async:true
});
});
$.ajax({
url:'accept.php',
type:'POST',
success:function(d){

$(".req1").html(d);
},
async:true
});
$(document).on("click",'.cancel',function(){
var th=$(this);
var xx=$(this).closest(".user").find(".hide").val();
$.ajax({
url:'cancelFr.php',
type:'POST',
data:{xx:xx},
success:function(d){

$(th).replaceWith("<button class='add'>Add Friend</button>");
},
async:true
});
});
$(document).on("click",'.accept',function(){
var th=$(this);
var xx=$(this).closest(".user").find(".hide").val();
$.ajax({
url:'acceptB.php',
type:'POST',
data:{xx:xx},
success:function(){
var tthh=$(th).closest(".user");
$(tthh).appendTo(".frnd");
$(tthh).remove();
},
async:true
});
});
$.ajax({
url:'PrPic.php',
type:'POST',
success:function(data){
$(".profile").html(data);
},
async:false
});
$.ajax({
url:'yrFrnd.php',
type:'POST',
success:function(data){
$(".frnd").html(data);
},
async:false
});
$(".redirectH").click(function(){
top.location.href='HomePage.php';
});
$(".redirectV").click(function(){
top.location.href='video.php';
});
$(".redirectP").click(function(){
top.location.href='photo.php';
});
$(document).on("mouseenter",'.add',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
});
$(document).on("mouseleave",'.add',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.cancel',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
});
$(document).on("mouseleave",'.cancel',function(){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.accept',function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
});
$(document).on("mouseleave",'.accept',function(){
$(this).css({'background-color':'transparent'});

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
$(document).on("mouseleave",'.redirectV',function(e){
$(this).css({'background-color':'transparent'});

});
$(document).on("mouseenter",'.redirectP',function(){

$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
});
$(document).on("mouseleave",'.redirectP',function(e){
$(this).css({'background-color':'transparent'});

});
});
</script>
<style>
.user{
border:1px solid blue;
width:150px;
display:inline-block;
margin:20px;

}
.container{
width:100%;
}
.a{
width:22%;
background-color:none;
float:left;
}
.b{
width:75%;
float:right;
}
.suggestion{


border:1px solid;
}
.req1{


border:1px solid;
}
.head{
height:40px;
background-color:#8FBC8F;
}
body{
background-color:#F0F8FF;
}
.profile{
width:250px;
height:350px;
border:1px solid;

}
.frnd{


border:1px solid;
}
.redirectH{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;
width:200px;
height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;

}
.add{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:150px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.cancel{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:150px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.accept{
background-color: #F0F8FF;
            background-repeat:no-repeat;
width:150px;
height:40px;

-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
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
.redirectP{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;
width:200px;
height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
.redirectV{
background-color: #8FBC8F;
            background-repeat:no-repeat;
font-size:25px;
color:black;
float:right;
width:200px;
height:30px;

border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}
</style>
</head>
<body>
<header class="head">
<table class="HtA">
<tr>
<td><div class="redirectH">
Home Page
</div>
</td>

<td><div class="redirectV">Videos Zone</div></td>
<td><div class="redirectP">Photos Zone</div></td></tr></table>
</header>
<div class="container">
<div class="a">
<div class="profile"></div>
</div>
<div class="b">
<h1>suggestion</h1>
<div class="suggestion">

</div>
<h1>requests</h1>
<div class="req1"></div>
<h1>Your Friends</h1>
<div class="frnd">
</div>
</div>
</div>
</body>
</html>