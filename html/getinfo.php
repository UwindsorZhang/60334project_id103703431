<?php
//receiving email and password from the form
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
//connecting to database to check whether the login combo (username and password ) exists or not.

if (!$link = mysql_connect('localhost', 'zhang16i_project', 'mypassword')) {
    echo 'Could not connect to mysql';
    exit;
}
if (!mysql_select_db('zhang16i_project', $link)) {
    echo 'Could not select database';
    exit;
}

$sql    = 'SELECT email,password FROM `Profiles` WHERE email = "'.$email.'" and password ="'.$password.'"';
$result = mysql_query($sql, $link);

$hint .= "username and password do not match our records or do not exists";

while ($rs = mysql_fetch_assoc($result)) {
    $hint ="";
     if ($rs['email'] == "")
     {
        $hint .= "Not Match";
     }
    else if($rs['email'] == $email)
     {
        $hint .= "ok";
     }
}

while ($rs = mysql_fetch_assoc($result)) {
    $hint ="";
     if ($rs['email'] == "")
     {
        $hint .= "Not Match";
     }
    else if($rs['password'] == $password)
     {
        $hint .= "ok";

     }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>