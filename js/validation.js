function validate_password(){
var p1 = document.getElementById("pwd").value;
var p2 = document.getElementById("cpwd").value;
var plength = p1.toString().length;

if(plength  < 4 || plength  > 20){
alert("password length must be lees than 20 and greater than 3");
return false;
}
if (p1 =="" || p2=="")
{
alert("password or confirm password field is not entered");
return false;
}
if (p1 == p2){
return true;
}else
{
alert("password and confirm password fields are mismatch");
return false;
}
}

function validate_matching(){
if (document.getElementById("signal").value == "green")
{
return true;
}
else
{
//event.preventDefault() in onsubmit event very important to turn on "return false;" for some browsers

event.preventDefault();
return false;
}
}