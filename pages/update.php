<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

// Check connection
if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
} else {
    //echo 'Connected successfully';
    echo '<br>';
}

//$q = $GET['q'];
$q = strval( $_GET['q'] );
$b = strval( $_GET['b'] );
$c = intval( $_GET['c'] );

$supervisors = array( 'examiner1', 'examiner2');

$sql = "UPDATE norm SET $supervisors[$c] = '$q' WHERE indexNo='$b'";

if ( $conn->query( $sql ) === TRUE ) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

$conn->close();

?>