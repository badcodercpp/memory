<!DOCTYPE html>
<html>
<head><title>Change Profile Pic</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$(".upld").click(function(){
var formdata=new FormData($(".myform")[0]);


$.ajax({
url:'Uprogress.php',
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
if(data=='uploaded')
{
alert("congrats!!!!!!! your file have uploaded successfully");
}else{
alert("it seems that there is some error in uploading please try again");
}
},
data:formdata,
cache:false,
contentType:false,
processData:false,
});
});
function progressHandlingFunction(e){
if(e.lengthComputable){
var p=((e.loaded/e.total)*100);
$("#progressBar").attr({value:p});
$(".h").html("upload "+p+"% complete and total uploaded size is "+(e.total)/1024+"kb");
}
}
$(".redirectH").click(function(){
top.location.href='HomePage.php';
});
$(".redirectP").click(function(){
top.location.href='photo.php';
});
$(".redirectV").click(function(){
top.location.href='video.php';
});
$(".redirectF").click(function(){
top.location.href='fr.php';
});
$(".redirectH").hover(function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".redirectP").hover(function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".redirectV").hover(function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".redirectF").hover(function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".upld").hover(function(){
$(this).css({'background-color':'#556B2F'});
$(this).css({'cursor':'pointer'});
},function(){
$(this).css({'background-color':'transparent'});
});
$.ajax({
url:'PrPic.php',
type:'POST',
success:function(data){
$(".profile").html(data);
},
async:false
});
});
</script>
<style>
body{
background-color:#F0F8FF;
}
.a{
float: left;
height:960px;
margin:0.7%;
width: 20%;

background-color:none;
}
.b{
float:left;
height:960px;
width:54%;
margin:0.7%;
background-color:none;
}
.c{
float:left;
height:960px;
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
.input{
border:2px solid black;
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
.redirectF{

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
.profile{
width:250px;
height:350px;
border:1px solid;

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
</style>

<body>
</head>
<header class="head">
<table class="HtA">
<tr>
<td><div class="redirectH">
Home Page
</div>
</td>
<td><div class="redirectP">Photos Zone</div></td>
<td><div class="redirectF">Friends Zone</div></td>
<td><div class="redirectV">Videos Zone</div></td></tr></table>
</header>
<div class="container">
<div class="a">

<div class="profile"></div>
</div>
<div class="b">
<table class='input'><tr><td><form class='myform'><input type='file' name='file1' class='file1'></form></td></tr><tr><td><button class='upld'>Upload</button></td></tr><tr><td><p>Upload Status</p></td></tr><tr><td><progress id='progressBar' value='0' max='100' style='width:718px; height:25px;'></progress></td></tr><tr><td><p class='h'></p></td></tr></table>
<div class="n2"></div>
</div>
<div class="c">
</div>

</div>
</body>
</html>