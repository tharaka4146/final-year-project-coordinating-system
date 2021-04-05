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
$supervisorEmail = $_POST['supervisorEmail'];
$comments = $_POST['comments'];

$mark1 = $_POST['mark1'];
$mark2 = $_POST['mark2'];
$mark3 = $_POST['mark3'];
$mark4 = $_POST['mark4'];
$mark5 = $_POST['mark5'];
$mark6 = $_POST['mark6'];
$mark7 = $_POST['mark7'];
$mark8 = $_POST['mark8'];
$mark9 = $_POST['mark9'];
$mark10 = $_POST['mark10'];
$mark11 = $_POST['mark11'];
$mark12 = $_POST['mark12'];
$mark13 = $_POST['mark13'];
$mark14 = $_POST['mark14'];
$mark15 = $_POST['mark15'];
$mark16 = $_POST['mark16'];
$mark17 = $_POST['mark17'];
$mark18 = $_POST['mark18'];

$sql = "SELECT * FROM final WHERE kduEmail ='" . $kduEmail . "'  and supervisorEmail = '" . $supervisorEmail . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        echo "exists";
    }
} else {
    //create
    $stmt = $conn->prepare('INSERT INTO final  (kduEmail, supervisorEmail, comments, mark1, mark2, mark3, mark4, mark5, mark6, mark7, mark8, mark9, mark10, mark11, mark12, mark13, mark14, mark15, mark16, mark17, mark18) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssssssssssssssss', $kduEmail, $supervisorEmail, $comments, $mark1, $mark2, $mark3, $mark4, $mark5, $mark6, $mark7, $mark8, $mark9, $mark10, $mark11, $mark12, $mark13, $mark14, $mark15, $mark16, $mark17, $mark18);

    //$stmt = $conn->prepare( 'INSERT INTO norm  (firstName) VALUES (?)' );
    //$stmt->bind_param( 's', $firstName);

    //$stmt->execute();

    if ($stmt->execute()) {
        //echo'ok';
    } else {
        echo $conn->error;
    }
}


?>

</body>

<?php

header("Location:../pages/final.php?kduEmail=$kduEmail");

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>