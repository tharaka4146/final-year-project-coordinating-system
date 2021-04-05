<?php

if (!isset($_SESSION['uname'])) {
    header('Location: homeStudentJS.php');
}

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

?>