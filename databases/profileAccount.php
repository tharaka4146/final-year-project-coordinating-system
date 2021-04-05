<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die('Connection failed: '.$con->connect_error);
} else {
    //echo 'Connected successfully';
    //echo '<br>';
}

session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$admissionNO = $_POST['admissionNO'];
$contactNo = $_POST['contactNo'];

$sql = "SELECT * FROM student WHERE kduEmail= '".$_SESSION['uname']."'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $sql = "UPDATE student SET firstName = '$firstName', lastName = '$lastName', admissionNO = '$admissionNO', contactNo = '$contactNo' WHERE kduEmail= '".$_SESSION['uname']."'";
        if ($con->query($sql) === true) {
            header('Location:../pages/profileInfoSuccess.php');
        } else {
            echo 'Error updating record: '.$con->error;
        }

        $con->close();
    }
} else {
    header('Location:../pages/profileInfoFail.php');
}

//$sql = "UPDATE user SET password = '$password' WHERE password = '$oldPassword'";

?>


<!--
<body onload = 'nextPage()'>

<form id = 'myform' action = '../pages/norm.php' method = 'POST'>
<input name = 'indexNo2' type = 'text' value = "<?php echo $indexNo; ?>" hidden>
<input type = 'submit' hidden>
</form>

<script>

function nextPage() {
    document.getElementById( 'myform' ).submit();
}

</script>

</body>
-->

<?php

//header('Location:../pages/profileSecurity.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>