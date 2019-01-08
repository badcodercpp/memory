<!DOCTYPE HTML>
<html>
<head>
<title>Ajay Jha/Admin</title>
<script src="jquery-1.11.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$(".send").click(function(){
var val=$(".text").val();
if(val=='')
{
alert("sorry but empty data cannot be send");
}else{
$.ajax({

url:'adminPost.php',
data:{val:val},
type:'POST',
success:function(d){

if(d=='ok')
alert("data inserted");
},

});
}
});
$(".delB1").click(function(){
var dataV=$(this).closest(".del1").find(".textDel1").val();

if(dataV=='')
{alert("sorry but you have to provide the actual post no of posted data which you want to delete from database permanently");
}else{
$.ajax({
url:'byData.php',
type:'POST',
data:{dataV:dataV},
dataType:'json',
success:function(datac){
if(datac=='ok')
{
alert("congo deleted!!!!!!!!!!!!!!!!!");
}

},
async:false
});
}
});
$(".send1").click(function(){
var user=$(this).closest(".userD").find(".text1").val();
if(user=='')
{
alert("sorry !!!!!!!!!!!1 but you need to provide email of user to be delete");
}else{
$.ajax({
url:'userDe.php',
type:'POST',
data:{user:user},
dataType:'json',
success:function(da){
if(da=='ok')
{
alert("congo !!!!!!!!!!!!!!!!!!! user deleted");
}
},
async:false
});
}
});
});
</script>
<style>
.delB1
{
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
height:70px;
background-color:#8FBC8F;
}
.send{
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
<header class="head"></header>
<div class="container">
<div class="a">
</div>
<div class="b"><table class="tab"><tr><td>
<textarea class="text" rows="3" cols="90"></textarea></td><td><button class="send">Add News</button></td></table>



<br><br>delete by post no<br>
<div class="del1">
<table class="tabDel1"><tr><td>
<textarea class="textDel1" rows="3" cols="3"></textarea></td><td><button class="delB1">Delete News</button></td></table>
</div>
<br><br>delete user<br>
<div class="userD">
<table class="tab"><tr><td>
<textarea class="text1" rows="2" cols="40"></textarea></td><td><button class="send1">Delete User</button></td></table>
</div>
</div>


<div class="c">
</div>
</div>
</body>
</html>