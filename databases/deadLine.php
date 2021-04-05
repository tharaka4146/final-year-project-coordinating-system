<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    //echo 'Connected successfully';
    echo '<br>';
}

$deadLine = $_POST['deadLine'];
$formName = $_POST['formName'];

$sql = "UPDATE deadlines SET deadLine = '$deadLine' where form = '$formName'";

if ($conn->query($sql) === true) {
} else {
    echo 'Error updating record: ' . $conn->error;
}

header('Location:../pages/viewFormsCoordinator.php');
