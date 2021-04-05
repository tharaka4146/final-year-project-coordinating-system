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

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$admissionNo = $_POST['admissionNo'];
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

$dateTime = date('Y-m-d' . ' ' . 'H:i:s');
$message = $_POST['message'];
$send = '1';
$review = '0';

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

$sql = "SELECT * FROM norm WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$result = $conn->query($sql);

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

        $sql = "UPDATE norm SET firstName = '$firstName', lastName = '$lastName', email = '$email',admissionNo = '$admissionNo', contactNo = '$contactNo', projectTitle = '$projectTitle', problem = '$problem', solution = '$solution', technologies = '$technologies', area = '$area', supervisor1 = '$supervisor1', supervisor2 = '$supervisor2', supervisor3 = '$supervisor3', s1 = '$supervisor1', s2 = '$supervisor2', s3 = '$supervisor3', dateTime = '$dateTime', send = '$send', review = '0', message = '$message' WHERE kduEmail='" . $_SESSION['uname'] . "'";

        if ($conn->query($sql) === true) {
            //echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $conn->error;
        }

        //$conn->close();

        // echo 'ok';
    }
} else {
    //create
    $stmt = $conn->prepare('INSERT INTO norm  (kduEmail,admissionNo, firstName, lastName, email, contactNo, projectTitle, problem, solution, technologies, area, supervisor1, supervisor2, supervisor3,s1,s2,s3,dateTime, message, send, review) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssssssssssssssss', $_SESSION['uname'], $admissionNo, $firstName, $lastName, $email, $contactNo, $projectTitle, $problem, $solution, $technologies, $area, $supervisor1, $supervisor2, $supervisor3, $supervisor1, $supervisor2, $supervisor3, $dateTime, $message, $send, $review);

    //$stmt = $conn->prepare( 'INSERT INTO norm  (firstName) VALUES (?)' );
    //$stmt->bind_param( 's', $firstName);

    //$stmt->execute();

    if ($stmt->execute()) {
        //echo'ok';
    } else {
        echo $conn->error;
    }
}



$sql = "SELECT * FROM student WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {

        $sql = "UPDATE student SET firstName = '$firstName', lastName = '$lastName',admissionNo = '$admissionNo', contactNo = '$contactNo' WHERE kduEmail ='" . $_SESSION['uname'] . "'";

        if ($conn->query($sql) === true) {
            //echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $conn->error;
        }

        $conn->close();
    }
} else {
    echo "error";
}



?>


<body onload='nexstPage()'>

    <form id='myform' action='../pages/norm.php' method='POST'>
        <input name='indexNo2' type='text' value="<?php echo $indexNo; ?>" hidden>
        <input type='submit' hidden>
    </form>

    <script>
        function nextPage() {
            document.getElementById('myform').submit();
        }
    </script>

</body>

<?php

header('Location:../pages/norm.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>