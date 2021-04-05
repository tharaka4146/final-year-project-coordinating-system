<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

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

    $mail->addAddress('tharaka4146@gmail.com');     // Add a recipient
    //$mail->addAddress('suranviraj23@gmail.com');     // Add a recipient
    //$mail->addAddress('Sewmidiss@gmail.com');     // Add a recipient
    //$mail->addAddress('oshinzain@gmail.com');     // Add a recipient

    //$mail->addReplyTo('tharaka4146@gmail.com', 'Information');

    // Attachments

    // Content
    $mail->isHTML(true);



    $mail->Subject = 'Your Arc-hive account has been created successfully';
    $mail->Body    = ' 
    <html>

<body>
    <center>

        <div style="border:1px solid #6BA5F2;">
            <br><br>
            <h1 style="color:#1c5db3; padding:10px;">Thanks you for joining with us !</h1>
            <br>
            <div style="background-color: #E6E6E6;">

                <table cellspacing="10" style="padding:20px; text-align: left; color:#4e4b4b">
                    <tr>
                        <th>Username</th>
                        <td>36-cs-0018@kdu.ac.lk</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>R+a_&QR9L`9%(fL8</td>
                    </tr>
                </table>

            </div>

            <br>

            <br>

            <p style="color:#4e4b4b">You can visit the website from here</p>

            <a href="http://localhost/fypcs/pages/login.php"><button link="http://localhost/fypcs/pages/login.php" style="padding: 5px 20px 5px 20px; border-radius: 7px; background-color: #1c5db3; color: black; border: 2px solid #1c5db3; color:white;">Click here</button></a>

            <br><br><br>

            <div>
                <p style="margin-bottom:0px; padding: 50px;background-color: #5C73F2; color:white;">&copy; 2020 Arc-hive. All right reserved</p>
            </div>
        </div>

    </center>
</body>

</html>';
    $mail->AltBody = 'Hi (kdu email)<br><br> Username is <b>"sample"</b> <br> Password is <b>"sample"</b><br><br>You can visit the site via this link <a href="http://localhost/fypcs/pages/login.php">Click here</a>';

    $mail->send();

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}