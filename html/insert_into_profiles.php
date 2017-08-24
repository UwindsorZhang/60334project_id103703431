
<?php

if (!$link = mysql_connect('localhost', 'zhang16i_project', 'mypassword')) {
    echo 'Could not connect to mysql';
    exit;
}
if (!mysql_select_db('zhang16i_project', $link)) {
    echo 'Could not select database';
    exit;
}

$sql    = 'SELECT MAX(id) as id FROM Profiles';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mfnameysql_error();
    exit;
}

//print the return record from table
while ($row = mysql_fetch_assoc($result)) {
    $id = $row['id'] ;
}
$id = $id + 1;
mysql_free_result($result);

?>

<?php

// get all elements that have been sent by form,
$fname = $_REQUEST['fname'];
$dob = $_REQUEST['dob'];
$lname = $_REQUEST['lname'];
//adding email and password
$email = $_REQUEST['email'];
$pwd = $_REQUEST['pwd'];
//echo $email;
$user_code = $_REQUEST['user_code'];
//echo $user_code;
 $link = new mysqli('localhost', 'zhang16i_project', 'mypassword', 'zhang16i_project');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
if(isset($_FILES['picture'])) {
    // Make sure the file was sent without errors
    if($_FILES['picture']['error'] == 0) {


        // Connect to the database
       
 
        // Gather all required data
        $name = $link->real_escape_string($_FILES['picture']['name']);
        $mime = $link ->real_escape_string($_FILES['picture']['type']);
        $data = $link ->real_escape_string(file_get_contents($_FILES  ['picture']['tmp_name']));
        $size = intval($_FILES['picture']['size']);
//echo $data; 
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['picture']['error']);
    }
 
    
}
else {
    echo 'Error! A file was not sent!';
}
$link->close();
?>







<?php
if (!$link = mysql_connect('localhost', 'zhang16i_project', 'mypassword')) {
    echo 'Could not connect to mysql';
    exit;
}
if (!mysql_select_db('zhang16i_project', $link)) {
    echo 'Could not select database';
    exit;
}

//STR_TO_DATE('22,3,1990', '%d,%m,%Y')

    $hn = 'localhost'; //hostname
    $db = 'zhang16i_project'; //database
    $un = 'zhang16i'; //username
    $pw = 'Howard082412'; //password
    $conn = new mysqli($hn, $un, $pw, $db);

    $stmt= $conn->prepare('INSERT INTO Profiles VALUES (?,?,?,?,?,?,?,?)');

    $stmt->bind_param("ssssbsss",$id,$fname, $lname,$dob,$data,$user_code,$email,$pwd); 

    if($stmt->execute()){
$sql_insert1 = "INSERT INTO Profiles (picture)
VALUES ('".$data."')"; 

$result1 = mysql_query($sql_insert1 , $link);
    echo "successfully sign up, jump to login page in 3 seconds\n";
    header('Refresh: 3; url=login.php');
    }


else {
    echo "DB Error, could not insert into the database, jump back in 3 seconds\n";
    header('Refresh: 3; url=profiles_form.php');
    echo 'MySQL Error: ' . mfnameysql_error();
    exit;
}


    $link->commit();

?>