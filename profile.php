<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile Page</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

$(".coverImg").hover(function(){
$(this).css({'cursor':'pointer'});

});

$.ajax({
url:'profileImgh.php',
type:'POST',
success:function(dat){

$(".prImg").html(dat);
},
async:false
});
$.ajax({
url:'FRNDth.php',
type:'POST',
success:function(data){
$(".frnd").html(data);
},
async:true
});
$.ajax({
url:'options.php',
type:'POST',
success:function(data){
if(data!=='other')
{
$(".op").html(data);
}
},
async:true
});
$.ajax({
url:'basicinfy.php',
type:'POST',
success:function(data){
$(".infy").html(data);
},
async:true
});
$(document).on("click",'.changess',function(){

$(".coverImg").html("<table class='input'><tr><td><form class='myform'><input type='file' name='file1' class='file1'></form></td></tr><tr><td><button class='upld'>Upload</button></td></tr><tr><td><p>Upload Status</p></td></tr><tr><td><progress id='progressBar' value='0' max='100' style='width:700px; height:25px;'></progress></td></tr><tr><td><p class='h'></p></td></tr></table>");

$(".upld").click(function(){

var formdata=new FormData($(".myform")[0]);
if(!formdata){
alert("sorry !!!!!!!! firstly you have to choose file to upload");
}else{
$.ajax({
url:'progressPrr.php',
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
$(".coverImg").html(data);
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


function progressHandlingFunction(e){
if(e.lengthComputable){
var p=((e.loaded/e.total)*100);
$("#progressBar").attr({value:p});
$(".h").html("upload "+p+"% complete and total uploaded size is "+(e.total)/1024+"kb");
}
}
});
$.ajax({
url:'ImgWa.php',
type:'POST',
success:function(data){
$(".coverImg").html(data);
},
async:true
});
$.ajax({
url:'newpppo.php',
type:'POST',
success:function(data){
$(".current").html(data);
},
async:true
});
$.ajax({
url:'textt.php',
type:'POST',
success:function(data){
$(".current").prepend(data);
},
async:true
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
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
          
var bgd32=$(".current").find(".dabba").length;

$.ajax({
url:'njada.php',
type:'POST',
data:{oo1:bgd32},
success:function(ddd){

$(".current").append(ddd);

},
async:true
});

    }
});
$(document).on("click",'.anc',function(){

var vf=$(this).closest(".frndL").find(".hidevcg").val();
$.ajax({
url:'red.php',
type:'POST',
data:{vf:vf},
success:function(){
top.location.href='profile.php';

},
async:true
});
});
$(document).on("mouseenter",'.anc',function(){
$(this).css({'cursor':'pointer'});
});
$(".home").click(function(){
top.location.href='HomePage.php';
});
$(".home").hover(function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".photo").click(function(){
top.location.href='photo.php';
});
$(".photo").hover(function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".video").click(function(){
top.location.href='video.php';
});
$(".video").hover(function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
},function(){
$(this).css({'background-color':'transparent'});
});
});
</script>
<style>
.frndL{
margin-top:-2px;
}
.anc{

text-decoration:none !important;
hover:underline;
font-size:17px;
font-weight:50px;

}
body{
background-color:#F0F8FF;
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
.container{
width:100%;
background-color:#F0F8FF;
}
.a{
width:23%;
background-color:none;
float:left;
}
.b{
width:56%;
background-color:none;
float:left;
}
.c{
width:17%;
float:right;
}
.coverImg{
border:1px solid black;
height:400px;
width:780px;
}
.popup{
display:none;
position:relative;
}
.head{
height:40px;
background-color:#8FBC8F;
}
.infy{
height:200px;
width:300px;
border:1px solid black;
}
.changess{
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
.video{
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
.photo{
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
.home{
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
.prImg{
height:400px;
width:300px;
border:1px solid black;
}
</style>
</head>
<body>
<header class="head">
<table class="HtA">
<tr>
<td><div class="home">
Home Page</div>
</td>
<td><div class="photo">Photos Zone</div></td>
<td><div class="video">Videos Zone</div></td></tr></table>
</header>

<div class="container">
<div class="a">

<div class="prImg">
</div>
Basic Information
<div class="infy"></div>
</div>
<div class="b">
<div class="coverImg">
</div>
<div class="op">
</div>
<div class="current">
</div>
</div>

<div class="c">
<div class="frnd">
</div>
</div>
</div>
</body>
</html>