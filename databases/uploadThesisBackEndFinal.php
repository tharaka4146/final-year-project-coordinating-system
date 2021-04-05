<?php

session_start();

include 'config.php';


$target_dir = "../uploads/thesisFinal/";

$filename = $_FILES['file']['name'];
$newfilename = $_SESSION['uname'] . '.' . 'pdf';

$target_file = $target_dir . $newfilename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["uploadfile"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


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

$review = "2";
date_default_timezone_set('Asia/Colombo');
$dateTime = date('Y-m-d' . ' ' . 'H:i:s');

$sql = "SELECT * FROM thesisSubmissionFinal WHERE kduEmail='" . $_SESSION['uname'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {

        $sql = "UPDATE thesisSubmissionFinal SET review = '" . $review . "' where kduEmail='" . $_SESSION['uname'] . "'";

        if ($conn->query($sql) === true) {
            echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $conn->error;
        }
    }
} else {
    $stmt = $conn->prepare('INSERT INTO thesisSubmissionFinal (kduEmail,dateTime, review) VALUES (?,?,?)');
    $stmt->bind_param('sss', $_SESSION['uname'], $dateTime, $review);

    if ($stmt->execute()) {
        //echo'ok';
    } else {
        echo $conn->error;
    }
}
