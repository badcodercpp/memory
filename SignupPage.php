<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up Page</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
var no=1;
setInterval(function(){
$.ajax({
url:'dev.php',
type:'POST',
data:{no:no},
success:function(data){
if(no<=4)
{
no=no+1;
}else{no=1;}

$(".b").html(data);
},async:false
});
},5000);


$(".submit").click(function(){
var name=$(".name").val();
var email=$(".email").val();
var password=$(".password").val();
var sequirity=$(".sequirity").val();
var mobile=$(".mobile").val();
var gender=$(".gender").val();
var interest=$(".interest").val();
var location=$(".location").val();
var department=$(".department").val();
var subject=$(".subject").val();
var college=$(".college").val();
var designation=$(".designation").val();

if(name=='' || name=='Ajay Kumar Jha')
{
alert("you need to provide a valid name for signup");
}else if(email=='' || email=='ajaykrjha93@gmail.com')
{
alert("please enter email");
}else if(password=='')
{
alert("please enter your password");
}else if(sequirity=='' || sequirity=='anything which is very necessary in password changing')
{
alert("please provide this it will helpif u lost ur password");
} else if(mobile=='' || mobile=='8981778391')
{
alert("please enter mob no");
}else if(gender=='')
{
alert("please select gender");
} else if(interest=='')
{
alert("please select interest");
}else if(location=='')
{
alert("please select location");
} else if(department=='')
{
alert("please select department");
}  else if(subject=='')
{
alert("please select subject");
}else if(college=='')
{
alert("please select college");
} else if(designation=='')
{
alert("please select designation");
} else{
$.ajax({
url:'db.php',
type:'POST',
data:{name:name,email:email,password:password,sequirity:sequirity,mobile:mobile,gender:gender,interest:interest,
location:location,department:department,subject:subject,college:college,designation:designation},
success:function(){
top.location.href='/shreya/ajay/LoginPage.php';
},
async:false,

});
}

//alert(name + email +password + sequirity + mobile + gender + interest + location + department + subject + college + designation);
});
$(document).on("focus",'.name',function(){
$(this).val('');
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("blur",'.name',function(){

var val=$(this).val();
if(val==''){$(this).val('Ajay Kumar Jha');}
});
$(document).on("focus",'.email',function(){
$(this).val('');
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("blur",'.email',function(){

var val=$(this).val();
if(val==''){$(this).val('ajaykrjha93@gmail.com');}
});
$(document).on("focus",'.password',function(){
$(this).val('');
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.sequirity',function(){
$(this).val('');
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("blur",'.sequirity',function(){

var val=$(this).val();
if(val==''){$(this).val('anything which is very necessary in password changing');}
});
$(document).on("focus",'.mobile',function(){
$(this).val('');
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("blur",'.mobile',function(){

var val=$(this).val();
if(val==''){$(this).val('8981778391');}
});
$(document).on("focus",'.gender',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.interest',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.location',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.department',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.subject',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.college',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(document).on("focus",'.designation',function(){
$(this).css({'background-color':'#123123','color':'white'});
});
$(".submit").hover(function(){
$(this).css({'cursor':'pointer'});
});

});
</script>
<style>

.a{
float: left;
height:570px;
margin:0.7%;
width: 56%;
background-color:none;
}
.b{
float:left;
height:570px;
width:41%;
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
td{
border-top:2px solid black;
border-bottom:2px solid black;
border-left:2px solid black;
border-right:2px solid black;
padding:4px 4px 4px 4px;
}
.submit{
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
}
legend{
border-top: 1px dashed;
border-left:1px dashed;
border-right:1px dashed;
border-bottom:1px dashed;
}
.tab{
border-top:1px dashed;
border-left:1px dashed;
border-right:1px dashed;
border-bottom:1px dashed;
}
body{
background-color:#F0F8FF;
}
</style>
</head>
<body >
<header class="head">

</header>
<div class="container">
<div class="a">
<table class="tab">
<legend><font size="18" color="red"><b><em>Enter ALL MENTIONED DETAILS FOR SIGNUP</b></em></font></legend>
<tr><td>
Name :::</td><td><input type="text" size="80" class="name" value="Ajay Kumar Jha"  /></td>
</tr>
<tr><td>
Email :::</td><td><input type="text" size="80" class="email" value="ajaykrjha93@gmail.com" /></td>
</tr>
<tr><td>
Password :::</td><td><input type="password" size="80" class="password" /></td>
</tr>
<tr><td>
Sequirity :::</td><td><input type="text" size="80" class="sequirity" value="anything which is very necessary in password changing"/></td></tr>
<tr><td>Mobile No :::</td><td><input type="text" size="80" class="mobile" value="8981778391"/></td>
</tr>
<tr><td>
Gender :::</td><td>
<select class="gender">
<option></option>
<option>MALE</option>
<option>FEMALE</option>
<option>OTHER</option>
</select></td></tr>
<tr><td>
Interested In :::</td><td>
<select class="interest">
<option></option>
<option>MALE</option>
<option>FEMALE</option>
</select>
</td></tr>
<tr><td>Location :::</td><td>
<select class="location">
<option></option>
<option>BIHAR</option> 
<option>DELHI</option>
<option>KOLKATA</option>
<option>CHENNAI</option>
</select>
</td></tr>
<tr><td>Department :::</td><td>

<select class="department">
<option></option>
<option>CSE</option>
<option>IT<option>
<option>EE</option>
<option>ECE</option>
<option>CE</option>
<option>AEIE</option>
<option>MCA</option>
<option>BCA</option>
</select>
</td></tr>
<tr><td>
Favourite Subject :::</td><td>
<select class="subject">
<option></option>
<option>MATHEMATICS</option>
<option>COMPUTER ORGANIZATION</option>
<option>C</option>
<option>JAVA</option>
<option>PHP</option>
<option>JQUERY</option>
<option>NODE.JS</option>
<option>PERL</option>
<option>PYTHON</option>
</select>
</td></tr>
<tr><td>
College Name :::</td><td><select class="college" >
<option></option>
<option>TECHNO INDIA COLLEGE OF TECHNOLOGY</option>
<option>TECHNO INDIA</option>
<option>NETAJI SUBHASH ENGINEERING COLLEGE</option>
<option>B.P. PODDAR INSTITUTE OF TECHNOLOGY</option>
</select>
</td>
</tr>
<tr><td>
Designation :::</td><td>
<select class="designation">
<option></option>
<option>STUDENT</option>
<option>TEACHER</option>
<option>HOD</option>
</select>
</td></tr>
</table>
<button class="submit" >Sign Up</button>
</div>
<div class="b">
<img src="g.jpg"></img>
</div>

</div>
</body>