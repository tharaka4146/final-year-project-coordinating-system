<?php
include "config.php";

// Check user login or not
if(!isset($var = $_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head>
    <title>Login page with jQuery and AJAX</title>
    </head>
    <body>
        <h1><?php echo "$var"; ?></h1>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html>