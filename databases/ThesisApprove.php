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

session_start();

$kduEmail = $_POST['kduEmail'];
$review = '1';

$sql = "UPDATE thesisSubmission SET review = '$review' WHERE kduEmail='" . $kduEmail . "'";

if ($conn->query($sql) === true) {
} else {
    echo 'Error updating record: ' . $conn->error;
}

$sql = "UPDATE student SET current = '8' WHERE kduEmail = '" . $kduEmail . "'";

if ($conn->query($sql) === true) {
    echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

header('Location:../pages/viewSubmissionsThesis.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/
