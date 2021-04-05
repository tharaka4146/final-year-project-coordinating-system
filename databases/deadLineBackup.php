<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
} else {
    //echo 'Connected successfully';
    echo '<br>';
}

$deadLine = $_POST['deadLine'];
//$deadLine = "2020-08-20 00:00:00";

$sql = "UPDATE deadlines SET deadLine = '$deadLine' where form = 'norm'";

if ($conn->query($sql) === true) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: '.$conn->error;
}

header('Location:../pages/viewFormsSupervisor.php');

?>