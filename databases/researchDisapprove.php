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

//session_start();

$kduEmail = $_GET['kduEmail'];
$message2 = $_POST['message2'];

$sql = "SELECT * FROM research WHERE kduEmail ='" . $kduEmail . "'";
$result = $conn->query($sql);

echo 'ok';
if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        /*
        $stmt = $conn->prepare( "UPDATE norm SET 'firstName' = ?,'lastName' = ?, 'email' = ?, 'contactNo' = ?, 'projectTitle' = ?,'problem' = ?, 'solution' = ?, 'technologies' = ?,'area' = ?,'supervisor1' = ?, 'supervisor2' = ?, 'supervisor3','dateTime' = ?,  = ?, 'save' = ?, 'send' = ?   WHERE indexno = $indexNo" );
        $stmt->bind_param( 'sssssssssssssss', $firstName, $lastName, $email, $contactNo, $projectTitle, $problem, $solution, $technologies, $area, $supervisor1, $supervisor2, $supervisor3, $dateTime, $save, $send );
        */

        /*
        $stmt = $conn->prepare( "UPDATE norm SET 'firstName' = ? WHERE indexNo = ?" );
        $stmt->bind_param( 'ss', $firstName, $indexNo );

        $stmt->execute();
        $stmt->close();
        */

        $sql = "UPDATE research SET review = '0',send = '0', message2 = '$message2' WHERE kduEmail = '" . $kduEmail . "'";

        if ($conn->query($sql) === true) {
            echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $conn->error;
        }

        $conn->close();

        // echo 'ok';
    } else {
    }
}
?>

</body>

<?php

header('Location:../pages/viewSubmissionsResearch.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>