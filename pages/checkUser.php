<?php

include 'config.php';

$uname = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, MD5($_POST['password']));

if ($uname != '' && $password != '') {

    $sql_query = "SELECT count(*) as cntUser FROM user WHERE kduEmail='" . $uname . "' and password= '" . $password . "'  and party=0";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if ($count > 0) {
        $_SESSION['uname'] = $uname;
        echo 1;
    } else {

        $sql_query = "SELECT count(*) as cntUser FROM user WHERE kduEmail='" . $uname . "' and password='" . $password . "' and party=1";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            echo 2;
        } else {
            $sql_query = "SELECT count(*) as cntUser FROM user WHERE kduEmail='" . $uname . "' and password='" . $password . "' and party=2";
            $result = mysqli_query($con, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if ($count > 0) {
                $_SESSION['uname'] = $uname;
                echo 3;
            } else {
                echo 0;
            }
        }
    }
}
