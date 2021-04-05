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

$details = "Fill the weekly progress";
$kduEmail = $_POST['kduEmailStudent'];
$weekNo = (int)$_POST['weekNo'];
$weekNo = $weekNo + 1;

date_default_timezone_set('Asia/Colombo');
$dateTime = date('Y-m-d' . ' ' . 'H:i:s');

$stmt = $conn->prepare('INSERT INTO alert (details, kduEmail, weekNo, dateTime) VALUES (?,?,?,?)');
$stmt->bind_param('ssss', $details, $kduEmail, $weekNo, $dateTime);

//$stmt->execute();

if ($stmt->execute()) {
    //echo'ok';
} else {
    echo 'no';
}

header("Location:../pages/weeklyProgressSupervisorSuccess.php?kduEmail=$kduEmail");

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/
