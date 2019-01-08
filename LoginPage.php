<!DOCTYPE HTML>
<html>
<head>
<title>Login Page</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$(".submit").click(function(){
var email=$(".email").val();
var password=$(".password").val();
if(email=='')
{
alert("please provide email");
}else if(password=='')
{
alert("please provide password");
}else if(email=='@saj')
{
top.location.href='Admin.php';
}else{

$.ajax({
url:'verify.php',
type:'POST',
dataType:'json',
data:{email:email,password:password},
success:function(datas){

if(datas=='ok')
{
$.ajax({
url:'session.php',
data:{email:email},
type:'POST',
success:function(){
top.location.href='HomePage.php';
},
async:false
});
}else{
alert("incorrect user id  & password");
$(".table").after("<button class='fPass'>Forgot Password</button>");
}
},
async:false
});
}
});
$(".signup").click(function(){
top.location.href='/shreya/ajay/SignupPage.php';
});
var no=1;
setInterval(function(){
$.ajax({
url:'img.php',
method:'POST',
data:{no:no},
success:function(data)
{
if(no<=5)
{
no=no+1;
}else{no=1;}

$(".b").html(data);
},
async:false,
});

},5000);
$(document).on("click",'.fPass',function(){
top.location.href='/shreya/ajay/forgot.php';
});
$(".email").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".password").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".submit").hover(function(){
$(this).css({'cursor':'pointer'});
});
$(".signup").hover(function(){
$(this).css({'cursor':'pointer'});
});
});


</script>
<style>
.a{
float: left;
height:570px;
margin:0.7%;
width: 41%;
background-color:none;
border:1px solid black;
}
.b{
float:left;
height:570px;
width:56%;
margin:0.7%;
background-color:none;
overflow:hidden;
}
.container{
width: 100%;
}
.head{
height:70px;
background-color:#8FBC8F;
}
.table{
color:black;
font-size:16px;
font-weight:700;
margin-left:775px;
margin-top:auto;
margin-bottom:auto;
margin-right:auto;
}
.signup{


background-color:#8FBC8F;
         background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
border:none;
font-family:'Helvetica Neue',Arial,sans-serif;
font-size:16px;
font-weight:700;
height:35px;
width:250px;
text-shadow:#FE6 0 1px 0;
float:right;
margin-top:530px;
}

.fPass{

background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:30px;
float:right;
}
body{
background-color:#F0F8FF;
}
.submit{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:30px;

}
</style>
</head>
<body >
<header class="head">

<table class="table">

<tr>
<td>Email::</td><td><input type="text" name="email" class="email" /></td>
<td>Password::</td><td><input type="password" name="password" class="password" /></td>
<td><input type="submit" name="submit" class="submit" value="Login" /></td>
</tr>

</table>

</header>
<div class="container">
<div class="a">
<button class="signup">Sign Up</button>
</div>
<div class="b">
<img src="g.jpg"></img>
</div>

</div>
</body>
</html>