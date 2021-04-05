<?php

include 'config.php';

$from_id = "student";
$to_id = "supervisor";

$currDate = date("Y-m-d");

$sql = "SELECT max(publish) as publish FROM events where end_event < '" . $currDate . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $publish = $row['publish'];
        if ($publish == 1) {
            $hidden = "";
            $hiddenCount = 1;
        } else {
            $hidden = "hidden";
            $hiddenCount = 0;
        }
    }
} else {
    $hidden = "hidden";
    $hiddenCount = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!--<meta http-equiv="refresh" content="30" />-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        a.fill-div {
            display: block;
            height: 100%;
            width: 100%;
            text-decoration: none;
            border-style: groove;
            border-width: 1px;
            border-left-width: 0px;
            border-right-width: 0px;
            border-top-width: 0px;
            border-color: rgba(146, 146, 146, 0.178);
        }

        .fill-div:hover {
            background-color: rgb(223, 223, 223);
            color: rgba(87, 87, 87, 0.767);

        }

        * {
            transition: 0.5s;
        }

        a {
            color: rgba(87, 87, 87, 0.767);
        }

        html {
            scroll-behavior: smooth;
        }

        .dialog {
            padding: 6px 20px 6px 20px;
            color: white;
            max-width: 80%;
            /*box-shadow: 4px 4px 10px -1px rgba(0, 0, 0, 0.75);*/
        }

        .float-left {
            border-radius: 20px 20px 20px 0px;
            background-color: #cdd1d156;
            color: #5A6363;
        }

        .float-right {
            border-radius: 20px 20px 0px 20px;
            /*background: -webkit-linear-gradient(#6BA5F2, #0540F2);*/
            background-color: #1374F2;

        }


        .time-left {
            color: #B5BABA;
            font-size: 10px;
            text-align: end;
        }

        .time-right {
            color: #B9DADA;
            font-size: 10px;
            text-align: end;
        }

        .type {
            position: fixed;
            bottom: 10px;
        }

        .submit {
            position: fixed;
            bottom: 23px;
            margin-left: 66%;
            opacity: 0.9;
        }

        .down {
            position: fixed;
            bottom: 23px;
            margin-left: 71%;
            opacity: 0.9;
        }

        #note {
            width: 100%;
            max-width: 100%;
            padding: 15px;
            border-radius: 30px;
            border: 0px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /*background: -webkit-linear-gradient(#F9EFAF, #F7E98D);*/
            opacity: 0.9;
            resize: none;
            outline: none;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .txta {
            min-height: 54px;
            max-height: 100px;
            background-color: #F2F2F2;
        }

        div.names {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

        .date {
            text-align: center;
        }
    </style>

    <script type="text/javascript">
        function moveWin() {
            window.scroll(0, 10000);
            //setTimeout('moveWin();', 1000);
        }
    </script>


</head>

<body id="page-top" onLoad="moveWin();">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeStudent.php">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i>
                        <img style = "width:100%;" src="../img/logo 16.png" />
                    </i>
                </div>
                <div class="sidebar-brand-text mx-3">Arc-hive<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="homeStudent.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!--
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-cog"></i>
<span>Submissions</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Submission options</h6>
    <a class="collapse-item" href="buttons.html">Online forms</a>
    <a class="collapse-item" href="cards.html">Upload your document</a>
</div>
</div>
</li>
-->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewForms.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Submissions</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="weeklyProgress.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Weekly progress</span></a>
            </li>

            <li class="nav-item" <?php echo $hidden ?>>
                <a class="nav-link" href="../test/calendar3/student.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presentation calendar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="viewMarkingAllStudent.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presentation marking</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="timeline.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Timeline</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="messaging.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Chat</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Extras
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="guidlines.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Guidlines</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewSupervisorProfiles.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Supervisors Info</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <?php

                        $sql = "SELECT max(weekNo) as weekNo FROM weeklyProgress WHERE kduEmail='" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $weekNo = $row['weekNo'];
                            }
                        }

                        $forms = array("norm", "projectproposal", "research", "thesisSubmission", "interim1", "interim2", "researchWork", "thesisSubmissionfinal", "thesisSubmissionfinal");

                        $sql = "SELECT current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $current = (int)$row['current'];
                                $current = $current - 1;

                                switch ($current) {

                                    case 0:
                                        $current2 = 0;
                                        break;
                                    case 1:
                                        $current2 = round(($current * 100 / 12), 1);;
                                        break;
                                    case 2:
                                        $current2 = round(($current * 100 / 12), 1);
                                        break;
                                    case 3:
                                        $current2 = round((($current + 1) * 100 / 12), 1);
                                        break;
                                    case 4:
                                        $current2 = round((($current + 1) * 100 / 12), 1);
                                        break;
                                    case 5:
                                        $current2 = round((($current + 2) * 100 / 12), 1);
                                        break;
                                    case 6:
                                        $current2 = round((($current + 3) * 100 / 12), 1);
                                        break;
                                    case 7:
                                        $current2 = round((($current + 3) * 100 / 12), 1);
                                        break;
                                    case 8:
                                        $current2 = round((($current + 4) * 100 / 12), 1);
                                        break;
                                    case 9:
                                        $current2 = round((($current + 4) * 100 / 12), 1);
                                        break;
                                    default:
                                        $current2 = 0;
                                        break;
                                }
                            }
                        }

                        $sql = "SELECT deadLine FROM deadLines WHERE form = '" . $forms[$current] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $deadLine = $row['deadLine'];
                                $deadLine = date('Y-m-d', strtotime($deadLine));
                            }
                        }

                        $alertDeadLines = 0;

                        $sql = "SELECT * FROM $forms[$current] WHERE kduEmail='" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                        } else {
                            date_default_timezone_set('Asia/Colombo');
                            $dateTimeCurrent = date('Y-m-d');

                            $currentPlusSeven = date('Y-m-d', strtotime($dateTimeCurrent . ' + 7 days'));

                            if ($dateTimeCurrent < $deadLine && $deadLine < $currentPlusSeven) {
                                $alertDeadLines = 1;
                            }
                        }



                        $sql = "SELECT count(*) as countAlert FROM alert WHERE kduEmail='" . $_SESSION['uname'] . "' and weekNo > '" . $weekNo . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $countAlert = $row['countAlert'];
                            } else {
                                $countAlert = 0;
                            }
                        }

                        $countAlertView = 0;
                        $countAlertView  = $countAlert + $alertDeadLines + $hiddenCount;

                        if ($countAlertView == 0) {
                            $countAlertView = "";
                        }

                        ?>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $countAlertView ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>

                                <?php

                                for ($i = 0; $i < $countAlert; $i++) {

                                    $i1 = $i + 1;

                                    $sql = "SELECT details, dateTime FROM alert WHERE kduEmail = '" . $_SESSION['uname'] . "' order by indexNo limit $i1 OFFSET $i";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {

                                        if ($row = $result->fetch_assoc()) {
                                            $details = $row["details"];
                                            $dateTime = $row["dateTime"];

                                            $dateTime = date('F d, Y' . ' ' . 'h:i a', strtotime($dateTime));
                                        }
                                    }

                                ?>

                                    <a class="dropdown-item d-flex align-items-center" href="weeklyProgress.php">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?php echo $dateTime ?></div>
                                            <span class="font-weight-bold"><?php echo $details ?></span>
                                        </div>
                                    </a>

                                <?php
                                }
                                ?>

                                <?php

                                for ($i = 0; $i < $alertDeadLines; $i++) {

                                    date_default_timezone_set('Asia/Colombo');
                                    $dateTimeCurrent = date('Y-m-d');

                                    $currentPlusSeven = date('Y-m-d', strtotime($dateTimeCurrent . ' + 7 days'));

                                    if ($dateTimeCurrent < $deadLine && $deadLine < $currentPlusSeven) {

                                ?>

                                        <a class="dropdown-item d-flex align-items-center" href="viewForms.php">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Deadline for your current activity is near</span>
                                            </div>
                                        </a>

                                <?php
                                    }
                                }
                                ?>
                                <?php

                                for ($i = 0; $i < $hiddenCount; $i++) {

                                ?>

                                    <a class="dropdown-item d-flex align-items-center" href="../test/calendar3/student.php" hidden>
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="far fa-calendar-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="font-weight-bold">Presentation dates are out now</span>
                                        </div>
                                    </a>

                                <?php
                                }
                                ?>

                                <a class="dropdown-item text-center small text-gray-500" href="#">No older alerts</a>

                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Contact supervisors through here
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#"></a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <?php

                        $sql = "SELECT firstName, current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "' and firstName != ''";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $name = $row['firstName'];
                                $current = $row['current'];
                            }
                        } else {

                            $sql = "SELECT firstName, current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    $current = $row['current'];
                                }
                            }

                            $name = $_SESSION['uname'];
                        }

                        ?>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                                <img class="img-profile rounded-circle" src="../img/profilePics/10.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profileSecurity.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout

                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Messaging - <?php echo $to_id ?></h1>

                    <div class="row">

                        <!--messages-->
                        <div class="col-lg-12 vl" style="padding-left: 50px;padding-right: 50px; padding-top: 20px;">

                            <div class="">
                                <div class="">

                                    <div class="email-content-wrapper">

                                        <div class="bdT pX-40 pY-30">
                                            <div class="container">

                                                <br>
                                                <br>


                                                <?php
                                                //$sql = "SELECT count(message) as count FROM chat WHERE from_id ='.$from_id.' and to_id = '.$to_id.' or from_id ='.$to_id.' and to_id = '.$from_id.'";
                                                $sql = "SELECT count(message) as count FROM chat WHERE from_id ='" . $from_id . "' and to_id = '" . $to_id . "' or from_id ='" . $to_id . "' and to_id = '" . $from_id . "'";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {

                                                    if ($row = $result->fetch_assoc()) {
                                                        $count = $row["count"];
                                                    }
                                                } else {
                                                    echo "0 results";
                                                    echo "<br>";
                                                }

                                                for ($i = 0; $i < $count; $i++) {

                                                    $i1 = $i + 1;
                                                    $i2 = $i - 1;
                                                    $i3 = $i - 2;

                                                    $date1 = "";

                                                    if ($i2 > 0) {

                                                        $sql = "SELECT * FROM chat WHERE from_id ='" . $from_id . "' and to_id = '" . $to_id . "' or from_id ='" . $to_id . "' and to_id = '" . $from_id . "' order by time limit $i2 OFFSET $i2";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            if ($row = $result->fetch_assoc()) {
                                                                $time = $row["time"];

                                                                $dt = new DateTime($time);
                                                                $date1 = $dt->format('d-m-Y');
                                                            }
                                                        } else {
                                                            echo "<br>";

                                                            echo "<br>";
                                                        }
                                                    }

                                                    $sql = "SELECT * FROM chat WHERE from_id ='" . $from_id . "' and to_id = '" . $to_id . "' or from_id ='" . $to_id . "' and to_id = '" . $from_id . "' order by time limit $i1 OFFSET $i";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {

                                                        if ($row = $result->fetch_assoc()) {
                                                            $message = $row["message"];
                                                            $from_id2 = $row["from_id"];
                                                            $to_id2 = $row["to_id"];
                                                            $time = $row["time"];

                                                            $dt = new DateTime($time);
                                                            $date = $dt->format('d-m-Y');
                                                            $date2 = $dt->format('d M Y');
                                                            $time = $dt->format('h:i A');

                                                            date_default_timezone_set('Asia/Colombo');

                                                            if ($date2 == date("d M Y")) {
                                                                $date2 = "today";
                                                            }

                                                            if ($date2 == date('d M Y', strtotime(' -1 day'))) {
                                                                $date2 = "yesterday";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<br>";

                                                        echo "0 results";
                                                        echo "<br>";
                                                    }

                                                    if ($from_id2 != "$from_id") {

                                                ?>

                                                        <?php if ($date1 != $date) { ?>
                                                            <div class="date">
                                                                <?php echo $date2 ?>
                                                            </div>
                                                        <?php } ?>

                                                        <br>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="float-left dialog">
                                                                    <?php echo $message ?>
                                                                    <div class="time-left">
                                                                        <?php echo $time ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <br>

                                                    <?php } else { ?>

                                                        <?php if ($date1 != $date) { ?>
                                                            <div class="date">
                                                                <?php echo $date2 ?>
                                                            </div>
                                                        <?php } ?>

                                                        <br>

                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="float-right dialog">
                                                                    <?php echo $message ?>
                                                                    <div class="time-right">
                                                                        <?php echo $time ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>


                                                <?php }
                                                } ?>

                                                <br>
                                                <br>
                                                <br>
                                                <form method="POST" action="../databases/chatDatabase.php">

                                                    <div class="row" id="bottom">

                                                        <div class="col-lg-8 type">
                                                            <textarea class="txta" rows="1" id="note" name="note" placeholder="Text Message"></textarea>

                                                            <input type="text" id="dateTime" name="dateTime" value="<?php
                                                                                                                    date_default_timezone_set('Asia/Colombo');
                                                                                                                    echo date('Y-m-d H:i:s'); ?>" hidden>
                                                            <input type="text" id="from_id" name="from_id" value="<?php echo $from_id ?>" hidden>
                                                            <input type="text" id="to_id" name="to_id" value="<?php echo $to_id ?>" hidden>

                                                        </div>
                                                        <div class="col-lg-4 submit">
                                                            <input type="submit" type="button" class="btn btn-primary" value="send">
                                                        </div>


                                                    </div>

                                                </form>
                                                <input type="submit" type="button" class="btn btn-primary down" value="go down" onclick="moveWin();">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
        let textareas = document.querySelectorAll('.txta'),
            hiddenDiv = document.createElement('div'),
            content = null;

        for (let j of textareas) {
            j.classList.add('txtstuff');
        }

        hiddenDiv.classList.add('txta');

        hiddenDiv.style.display = 'none';
        hiddenDiv.style.whiteSpace = 'pre-wrap';
        hiddenDiv.style.wordWrap = 'break-word';

        for (let i of textareas) {
            (function(i) {
                i.addEventListener('input', function() {

                    i.parentNode.appendChild(hiddenDiv);

                    i.style.resize = 'none';

                    i.style.overflow = 'hidden';

                    content = i.value;

                    content = content.replace(/\n/g, '<br>');

                    hiddenDiv.innerHTML = content + '<br style="line-height: 3px;">';

                    hiddenDiv.style.visibility = 'hidden';
                    hiddenDiv.style.display = 'block';
                    i.style.height = hiddenDiv.offsetHeight + 'px';

                    hiddenDiv.style.visibility = 'visible';
                    hiddenDiv.style.display = 'none';
                });
            })(i);
        }
    </script>

</body>

</html>