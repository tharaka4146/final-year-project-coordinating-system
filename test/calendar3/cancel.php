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
    echo 'Connected successfully';
    echo '<br>';
}

$sql = "UPDATE events SET publish = 0";

if ($conn->query($sql) === true) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

header('Location:http://localhost/fypcs/test/calendar3/lecs.php');
