<!DOCTYPE HTML>
<html>
<head>
<title>Login Page</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
function isValidEmail(emailText) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailText);
};
$(".email").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".email").blur(function(){
var email=$(this).val();
if(email==''){
alert("email cannot be empty");}else{
if( !isValidEmail(email) ){
alert("email is not valid");
$(this).val('');
}
}
});
$(".email1").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".email1").blur(function(){
var email1=$(this).val();
if(email1==''){
alert("email cannot be empty");}else{
if( !isValidEmail(email1) ){
alert("email is not valid");
$(this).val('');
}
}
});
$(".password1").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".password1").blur(function(){
var password1=$(this).val();
if(password1=='')
{alert("password cannot be null");
}
});
$(".name").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".name").blur(function(){
var name=$(this).val();
if(name==''){alert("name cannot be null");}
});
$(".password").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".password").blur(function(){
var password=$(this).val();
if(password==''){alert("password cannot be null");}
});
$(".sequirity").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".sequirity").blur(function(){
var sequirity=$(this).val();
if(sequirity==''){alert("sequirity cannot be null");}
});
$(".mobile").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".mobile").blur(function(){
var mobile=$(this).val();
if(mobile==''){alert("mobile no cannot be null");}
});
$(".submit").hover(function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".signup").hover(function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
},function(){
$(this).css({'background-color':'transparent'});
});
$(".gender").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});

});
$(".interest").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});

});
$(".location").focus(function(){
$(this).css({'background-color':'#123123','color':'white'});

});
$(".signup").click(function(){
var names=$(".name").val();
var emails=$(".email").val();
var passwords=$(".password").val();
var sequiritys=$(".sequirity").val();
var mobiles=$(".mobile").val();
var genders=$(".gender").val();
var interests=$(".interest").val();
var locations=$(".location").val();
if(names=='' || emails=='' || passwords=='' || sequiritys=='' || genders=='' || interests=='' || locations=='')
{alert("please provide all given fields");}else{
$.ajax({
url:'dbN.php',
type:'POST',
data:{name:names,email:emails,password:passwords,sequirity:sequiritys,mobile:mobiles,gender:genders,interest:interests,
location:locations},
success:function(data){
if(data=='ok')
{
$(".SignupMsg").html("<h3>You Have Successfully SignedUp on SaJ Now You Need To Login Again To continue.........Thank You And Have A Nice Day Ahead</h3");
}
},
async:false,

});
}
});
$(".submit").click(function(){

var email2=$(".email1").val();
var password2=$(".password1").val();

$.ajax({
url:'verify.php',
type:'POST',
dataType:'json',
data:{email:email2,password:password2},
success:function(datas){

if(datas=='ok')
{
$.ajax({
url:'session.php',
data:{email:email2},
type:'POST',
success:function(){
top.location.href='HomePage.php';
},
async:false
});
}else{
alert("incorrect user id  & password");
var len=$(document).find(".fPass").length;
if(len==0){
$(".table").after("<button class='fPass'>Forgot Password</button>");}
}
},
async:false
});
});
$(document).on("mouseenter",'.fPass',function(){
$(this).css({'cursor':'pointer','background-color':'#556B2F'});
});
$(document).on("mouseleave",'.fPass',function(){
$(this).css({'background-color':'transparent'});
});
$(document).on("click",'.fPass',function(){
top.location.href='forgot.php';
});
});
</script>
<style>
.a{
float: left;

margin:0.7%;
width: 41%;
background-color:none;

}
.b{
float:left;

width:56%;
margin:0.7%;
background-color:none;
overflow:hidden;
}
.container{
width: 100%;
}
.head{
height:80px;
background-color:#8FBC8F;
}
.table{
color:black;
font-size:20px;
font-weight:700;
margin-left:400px;
margin-top:10px;
margin-bottom:auto;
margin-right:auto;
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
.name{
height:30px;

border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.tab{
font-size:25px;
}

.email{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.password{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.mobile{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.sequirity{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:20px;
}
.gender{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.interest{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.location{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
font-size:25px;
}
.email1{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
}
.password1{
height:30px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
}
.signup{
background-color: Transparent;
            background-repeat:no-repeat;
-webkit-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
-moz-box-shadow:rgba(2,2,2,2) 5px 5px 5px 5px;
box-shadow:rgba(1,1,1,2) 5px 5px 5px 5px #898177;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
height:40px;
width:100px;
}

</style>
</head>
<body >
<header class="head">
<table class="table">

<tr>
<td>
<h3 class="nsname">Friends Zone</h3>                                                             </td>
<td>Email::</td><td><input type="text" name="email1" class="email1" /></td>
<td>Password::</td><td><input type="password" name="password1" class="password1" /></td>
<td><input type="submit" name="submit" class="submit" value="Login" /></td>
</tr>

</table>
</tr></table>
</header>
<div class="container">
<div class="a">
</div>
<div class="b">
<div class="SignupMsg">
</div>
<table class="tab">
<legend><font size="18" ><b><em>SIGNUP ZONE</b></em></font></legend>
<tr><td><input type="text" size="41" class="name" placeholder="Enter Your Name"/></td>
</tr>
<tr><td><input type="text" size="41" class="email" placeholder="Enter Your Email"/ ></td>
</tr>
<tr><td><input type="password" size="41" class="password" placeholder="Enter New Password"/></td>
</tr>
<tr><td><input type="text" size="54" class="sequirity" placeholder="Enter A Sequirity Question It Will Help You To Recover Password"/></td></tr>
<tr><td><input type="text" size="41" class="mobile" placeholder="Enter Your Mobile No" /></td>
</tr>
<tr><td>
<select class="gender">
<option value='' disabled selected>Your Gender</option>
<option>MALE</option>
<option>FEMALE</option>
<option>OTHER</option>
</select></td></tr>
<tr><td>
<select class="interest">
<option value='' disabled selected>You Are Interested In </option>
<option>MALE</option>
<option>FEMALE</option>
</select>
</td></tr>
<tr><td>
<select class="location">
<option value='' disabled selected>Your Location</option>
<option>BIHAR</option> 
<option>DELHI</option>
<option>KOLKATA</option>
<option>CHENNAI</option>
</select>
</td></tr>
<tr><td><button class="signup">Sign Up</button></td></tr>
</table>
</div>

</div>
</body>
</html>