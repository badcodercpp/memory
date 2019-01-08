<!DOCTYPE HTML>
<html>
<head>
<title>forgot password</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$(".submit").click(function(){
var email=$(".email").val();
var answer=$(".answer").val();
if(email=='')
{
alert("please provide email");
}else if(answer=='')
{
alert("please provide sequirity answer");
}else{
$.ajax({
url:'password.php',
data:{email:email,sequirity:answer},
type:'POST',
dataType:'json',
success:function(datas)
{
var xx1=datas;
if(xx1=='ok')
{

 $(".zone").html("<font><b><em>Please enter your email and then provide new password</em></b></font><br><br><table class='pass'><tr><td>Email :::</td><td><input type='text' class='emails' size='73' /></td></tr><tr><td>New Password :::</td><td><input type='password' class='password' size='73' /></td></tr><tr><td>Confirm Password :::</td><td><input type='password' class='password1' size='73' /></tr></table><button class='change'>change</button></table>");

}else{
alert("you didnot provide currect sequirity answer please provide that");
}
},
async:false
});
}
});
$(document).on("click",'.change',function(){
var p1=$(".password").val();
var p2=$(".password1").val();
var email=$(".emails").val();
if(email=='')
{
alert("please rewrite your email id");
}else if(p1=='' || p2=='')
{
alert("please enter new password");
}else{
if(p1==p2)
{
$.ajax({
url:'setPassword.php',
type:'POST',
data:{email:email,password:p1},
success:function(){
top.location.href='/shreya/ajay/Login.php';
},
async:false
});

}else{
alert("passwords didnot match");
}
}
});
});
</script>
<style>
td{
border-top:2px solid;
border-bottom:2px solid;
border-left:2px solid;
border-right:2px solid;
color:#556B2F;
}
.head{
width:100%;
height:70px;
background-color:#8FBC8F;
}
.zone{
border:3px solid #556B2F;
width:700px;
height:200px;
margin-left:300px;
margin-top:160px;
background-color:none;
color:#556B2F;
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
height:40px;
float:right;
}
body{
background-color:#F0F8FF;
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
float:right;
}
</style>
</head>
<body>
<header class="head">
</header>
<div class="zone">
<p><font color="#556B2F"><b><em>IT SEEMS YOU HAVE FORGOT YOUR PASSWORD
PLEASE ENTER YOUR SEQUIRITY QUESTION TO CHANGE PASSWORD</em></b></font></p><br>
<table class="tab">
<tr><td>Email :::</td><td><input type="text" class="email" size="73"/></td></tr>
<tr><td>Sequirity Question :::</td><td><input type="text" class="answer" size="73"/></td></tr>
</table>
<button class="submit">Submit</button>
</div>
</body>
<html>