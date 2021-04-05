
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

echo "alert('sd')";
// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

// Check connection
if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
} else {
    //echo 'Connected successfully';
    echo '<br>';
}

$kduEmail = $_POST['kduEmail'];

$sql = 'SELECT * FROM passwords WHERE used = "no"';

    $result = $conn->query( $sql );

    if ( $result->num_rows > 0 ) {

        if ( $row = $result->fetch_assoc() ) {
            $password = $row['password'];
        }

    } else {

    $sql = "UPDATE passwords SET used = 'no' WHERE 1";

    if ( $conn->query( $sql ) === TRUE ) {
        //echo 'Record updated successfully';
    } else {
        echo 'Error updating record: ' . $conn->error;
    }

    }

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

$sql = "UPDATE passwords SET used = 'yes' WHERE password = '$password'";

if ( $conn->query( $sql ) === TRUE ) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

$sql = "UPDATE user SET password = '$password' WHERE kduEmail = '$kduEmail'";

if ( $conn->query( $sql ) === TRUE ) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

?>













<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../mail/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'apikey';                     // SMTP username
    $mail->Password   = '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';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('archive4148@gmail.com', 'Arc-hive');

    $mail->addAddress($kduEmail);     // Add a recipient
    //$mail->addAddress('suranviraj23@gmail.com');     // Add a recipient
    //$mail->addAddress('Sewmidiss@gmail.com');     // Add a recipient
    //$mail->addAddress('oshinzain@gmail.com');     // Add a recipient

    //$mail->addReplyTo('tharaka4146@gmail.com', 'Information');

    // Attachments

    // Content
    $mail->isHTML(true);



    $mail->Subject = 'Your Arc-hive account password reset has been done successfully';
    $mail->Body    = ' 
    <html>

<body>
    <center>

        <div style="border:1px solid #6BA5F2;">
            <br><br>
            <h1 style="color:#1c5db3; padding:10px;">Ypur password reset is completed !</h1>
            <br>
            <div style="background-color: #E6E6E6;">

                <table cellspacing="10" style="padding:20px; text-align: left; color:#4e4b4b">
                    <tr>
                        <th>Username</th>
                        <td>'."$kduEmail".'</td>
</tr>
<tr>
    <th>New password</th>
    <td>'."$password".'</td>
</tr>
</table>

</div>

<br>

<br>

<p style="color:#4e4b4b">You can visit the website from here</p>

<a href="../pages/login.php"><button link="../pages/login.php"
        style="padding: 5px 20px 5px 20px; border-radius: 7px; background-color: #1c5db3; color: black; border: 2px solid #1c5db3; color:white;">Click
        here</button></a>

<br><br><br>

<div>
    <p style="margin-bottom:0px; padding: 50px;background-color: #5C73F2; color:white;">&copy; 2020 Arc-hive. All right
        reserved</p>
</div>
</div>

</center>
</body>

</html>';
$mail->AltBody = 'Hi (kdu email)<br><br> Username is <b>"sample"</b> <br> Password is <b>"sample"</b><br><br>You can
visit the site via this link <a href="../pages/login.php">Click here</a>';

$mail->send();

//echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}








?>






<body onload='nextxPage()'>

    <form id='myform' action='../pages/studentAccounts.php' method='POST'>
        <!--<input name = 'indexNo2' type = 'text' value = "<?php echo $indexNo; ?>" hidden>-->
        <input type='submit' hidden>
    </form>

    <script>
        function nextPage() {
            document.getElementById('myform').submit();
        }
    </script>

</body>

<?php

//header( 'Location:../pages/norm.php' );

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>