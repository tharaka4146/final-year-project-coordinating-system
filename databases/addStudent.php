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

$kduEmail = $_POST['kduEmail'];
$password = MD5($_POST['password']);
$password1 = $_POST['password'];
$party = $_POST['party'];

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

$stmt = $conn->prepare('INSERT INTO user (kduEmail, password, party) VALUES (?,?,?)');
$stmt->bind_param('sss', $kduEmail, $password, $party);

//$stmt->execute();

if ($stmt->execute()) {
    //echo'ok';
} else {
    echo 'no';
}

$sql = "UPDATE passwords SET used = 'yes' WHERE password = '$password1'";

if ($conn->query($sql) === TRUE) {
    //echo 'Record updated successfully';
} else {
    echo 'Error updating record: ' . $conn->error;
}

?>


<?php

require_once '../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('hivearc4146@gmail.com')
    ->setPassword('8SG]$wrhP2?z%gh,^');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create the message
$message = (new Swift_Message())

    // Give the message a subject
    ->setSubject('Your subject')

    // Set the From address with an associative array
    ->setFrom(['hivearc4146@gmail.com' => 'Arc - Hive'])

    // Set the To addresses with an associative array (setTo/setCc/setBcc)
    ->setTo([$kduEmail => 'Day Scholar'])


    // And optionally an alternative body
    ->addPart('
  <html>

<body>
<head>
<style>
textarea {
  resize: none;
}
</style>
</head>
  <center>

      <div style="border:1px solid #6BA5F2;">
          <br><br>
          <h1 style="color:#1c5db3; padding:10px;">Thanks you for joining with us !</h1>
          <br>
          <div style="background-color: #E6E6E6;">

              <table cellspacing="10" style="padding:20px; text-align: left; color:#4e4b4b">
                  <tr>
                      <th>Username</th>
                      <td>' . "$kduEmail" . '</td>
                  </tr>
                  <tr>
                      <th>Password</th>
                      <td><textarea style="border:0px; background-color: #E6E6E6; text-align:start" rows = 1 cols = 30 disabled>' . "$password1" . '</textarea></td>
                  </tr>
              </table>

          </div>

          <br>

          <br>

          <p style="color:#4e4b4b">You can visit the website from here</p>

          <a href="../pages/login.php"><button link="../pages/login.php" style="padding: 5px 20px 5px 20px; border-radius: 7px; background-color: #1c5db3; color: black; border: 2px solid #1c5db3; color:white;">Click
                  here</button></a>

          <br><br><br>

          <div>
              <p style="margin-bottom:0px; padding: 50px;background-color: #5C73F2; color:white;">&copy; 2020 Arc-hive. All right
                  reserved</p>
          </div>
      </div>

  </center>
</body>

</html>', 'text/html')

    // Optionally add any attachments
    //->attach(Swift_Attachment::fromPath('my-document.pdf'))
;

// Send the message
$result = $mailer->send($message);

?>


<?php

header('Location:../pages/studentAccounts.php');

/*
if ( !mysqli_query( $con, $sql ) ) {
    echo 'Not inserted';
} else {
    echo 'Data Inserted';
}
*/

?>