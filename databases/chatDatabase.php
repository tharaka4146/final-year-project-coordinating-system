<?php

include '../pages/config.php';


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

?>

<body onload='nextPage()'>

    <form id='myform' action='../pages/messaging.php' method='POST'>
        <input name='from_id' type='text' value="<?php echo $from_id; ?>" hidden>
        <input name='to_id' type='text' value="<?php echo $to_id; ?>" hidden>
        <input type='submit' hidden>
    </form>

    <script>
        function nextPage() {
            document.getElementById('myform').submit();
        }
    </script>

</body>

<?php

//header('Location:../pages/messaging.php');
