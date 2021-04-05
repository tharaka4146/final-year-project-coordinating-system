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

$outline = $_POST['outline'];
$weekNo = $_POST['weekNo'];
$supervisor1 = $_POST['supervisor1'];

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');


//create
$stmt = $conn->prepare('INSERT INTO weeklyProgress (kduEmail, supervisor, weekNo, outline, submittedDate) VALUES ( ?, ?, ?, ?, ?)');
$stmt->bind_param('sssss', $_SESSION['uname'], $supervisor1, $weekNo, $outline, $date);

if ($stmt->execute()) {
    //echo'ok';
} else {
    echo $conn->error;
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

header('Location:../pages/weeklyProgress.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>