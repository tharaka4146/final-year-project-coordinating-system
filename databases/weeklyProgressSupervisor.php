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

$feedback = $_POST['feedback'];
$weekNo = $_POST['weekNo'];
$kduEmailStudent = $_POST['kduEmailStudent'];


date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');

/*
//create
$stmt = $conn->prepare('INSERT INTO weeklyProgress (kduEmail, supervisor, weekNo, outline, feedback, approvedDate) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssss', $_SESSION['uname'], $supervisor1, $weekNo, $outline, $feedback, $date);

if ($stmt->execute()) {
    //echo'ok';
} else {
    echo $conn->error;
}
*/

$sql = "UPDATE weeklyProgress SET feedback = '$feedback', approvedDate = '$date' WHERE kduEmail='$kduEmailStudent' and weekNo = '$weekNo'";

if ($conn->query($sql) === true) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
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

header("Location:../pages/weeklyProgressSupervisor.php?kduEmail=$kduEmailStudent");

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>