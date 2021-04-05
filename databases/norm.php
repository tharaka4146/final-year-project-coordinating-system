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
    echo 'Connected successfully';
    echo '<br>';
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];
$projectTitle = $_POST['projectTitle'];
$problem = $_POST['problem'];
$solution = $_POST['solution'];
$technologies = $_POST['technologies'];
$area = $_POST['area'];
$supervisor1 = $_POST['supervisor1'];
$supervisor2 = $_POST['supervisor2'];
$supervisor3 = $_POST['supervisor3'];

date_default_timezone_set('Asia/Colombo');

$dateTime = date( 'Y-m-d'.' '.'H:i:s' );
$view = 'no';

/*
$firstName = 'ccc';
$lastName = 'ccc';
$email = 'ccc';
$contactNo = '123';
$projectTitle = 'ccc';
$problem = 'ccc';
$solution = 'ccc';
$technologies = 'ccc';
$area = 'ccc';
$supervisor1 = 'ccc';
$supervisor2 = 'ccc';
$supervisor3 = 'ccc';
*/

$stmt = $conn->prepare( 'INSERT INTO norm  (firstName, lastName, email, contactNo, projectTitle, problem, solution, technologies, area, supervisor1, supervisor2, supervisor3,dateTime,view) VALUES (?, ?,?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)' );
$stmt->bind_param( 'ssssssssssssss', $firstName, $lastName, $email, $contactNo, $projectTitle, $problem, $solution, $technologies, $area, $supervisor1, $supervisor2, $supervisor3, $dateTime, $view );

//$stmt->execute();

if ( $stmt->execute() ) {
    echo 'ok';
} else {
    echo 'no';
}

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/
