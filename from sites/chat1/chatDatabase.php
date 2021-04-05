<?php

include 'config.php';


$from_id = $_POST['from_id'];
$to_id = $_POST['to_id'];
$note = $_POST['note'];
$dateTime = $_POST['dateTime'];

$stmt = $con->prepare('INSERT INTO chat  (from_id, to_id, time, message) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $from_id, $to_id, $dateTime, $note);

if ($stmt->execute()) {
    //echo'ok';
} else {
    echo $conn->error;
}


header('Location:http://localhost/fypcs/from%20sites/chat1/index.php');
