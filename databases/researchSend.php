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

$area = $_POST['area'];
$summery = $_POST['summery'];
$keywords = $_POST['keywords'];
$problems = $_POST['problems'];
$analysis = $_POST['analysis'];
$literatureReview = $_POST['literatureReview'];
$originality = $_POST['originality'];
$aim = $_POST['aim'];
$objectives = $_POST['objectives'];
$methodology = $_POST['methodology'];
$design = $_POST['design'];
$indicators = $_POST['indicators'];
$ethical = $_POST['ethical'];
$deliverables = $_POST['deliverables'];
$plan = $_POST['plan'];
$significance = $_POST['significance'];
$stakeholders = $_POST['stakeholders'];
$protect = $_POST['protect'];

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

$sql = "SELECT * FROM research WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {

        $sql = "UPDATE research SET area = '$area', summery = '$summery', keywords = '$keywords',problems = '$problems', analysis = '$analysis', literatureReview = '$literatureReview', originality = '$originality', aim = '$aim', objectives = '$objectives', methodology = '$methodology', design = '$design', indicators = '$indicators', ethical = '$ethical', deliverables = '$deliverables', plan = '$plan', significance = '$significance', stakeholders = '$stakeholders', protect = '$protect', dateTime  = '$dateTime ',message  = '$message ', send = '$send', review = '0', message = '$message' WHERE kduEmail ='" . $_SESSION['uname'] . "'";

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
    $stmt = $conn->prepare('INSERT INTO research  (kduEmail, area, summery, keywords, problems, analysis, literatureReview, originality, aim, objectives, methodology, design, indicators, ethical, deliverables, plan, significance, stakeholders, protect, dateTime, message, send, review) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssssssssssssssssss', $_SESSION['uname'], $area, $summery, $keywords, $problems, $analysis, $literatureReview, $originality, $aim, $objectives, $methodology, $design, $indicators, $ethical, $deliverables, $plan, $significance, $stakeholders, $protect, $dateTime, $message, $send, $review);

    //$stmt = $conn->prepare('INSERT INTO research  (kduEmail) VALUES (?)');
    //$stmt->bind_param('s', $_SESSION['uname']);


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

header('Location:../pages/researchApplication.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>