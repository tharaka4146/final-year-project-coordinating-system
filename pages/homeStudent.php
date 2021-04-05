<?php

include 'config.php';

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

$sql = "SELECT * FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
} else {
    $bio = 'Undergraduate @KDU testing';
    $heading = 'This is the profile heading anyone viewing your account can see this';
    $current = 1;

    $stmt = $con->prepare('INSERT INTO student  (kduEmail, bio, heading, current) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $_SESSION['uname'], $bio, $heading, $current);

    if ($stmt->execute()) {
        //echo'ok';
    } else {
        echo 'no';
    }
}

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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/timeline.css" rel="stylesheet">

    <style>
        a {
            color: #8a8a8a;
        }

        a:hover {
            text-decoration: none;
            color: #4a4a4a;
        }

        * {
            transition: 0.5s;
        }
    </style>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="datepicker/css/custom.css">
    <script src="datepicker/js/bootstrap-datepicker.min.js"></script>

</head>

<body id="page-top">

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
                    <span>Marking</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="timeline.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Timeline</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="chat.php">
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
                <a class="nav-link" href="viewSupervisorProfilesStudent.php">
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
                                <a class="dropdown-item d-flex align-items-center" href="messaging.php">
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
                                <a class="dropdown-item" href="profileInfo.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="profileSecurity.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Student Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php

                        $sql = "SELECT current FROM student where kduEmail = '" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $current = (int)$row['current'];
                                $CurrentTemp = (int)$current;
                                $current = $current - 1;
                            }
                        }

                        $formName2 = "";

                        switch ($CurrentTemp) {

                            case 1:
                                $formName2 = "Norm Form";
                                break;

                            case 2:
                                $formName2 = "Project Proposal";
                                break;

                            case 3:
                                $formName2 = "Research Project";
                                break;

                            case 4:
                                $formName2 = "Interim 1";
                                break;

                            case 5:
                                $formName2 = "Interim 2";
                                break;

                            case 6:
                                $formName2 = "Publish research";
                                break;

                            case 7:
                                $formName2 = "Draft thesis";
                                break;

                            case 8:
                                $formName2 = "Final thesis";
                                break;

                            default:
                                $formName2 = "Completed";
                                break;
                        }

                        ?>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current activity</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $formName2 ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-upload fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        $sql = "SELECT current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {

                            if ($row = $result->fetch_assoc()) {
                                $current = (int)$row["current"];
                                $current4 = $current;
                                $current = $current - 1;

                                if ((int)$current == "9") {
                                    $current == 8;
                                }

                                $current2 = round(($current * 100 / 8), 1);
                            }
                        }

                        ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Overall
                                                Completion
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $current2 ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo $current2 ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date
                                            </div>
                                            <?php
                                            date_default_timezone_set('Asia/Colombo');
                                            $date = date('d  F  Y');
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $date ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Pie Chart 1-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Current activity progress</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Progress
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 2-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overall project pogress</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Submissions
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Weekly progress
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Presentations
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 2-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Todo lists</h6>
                                </div>

                                <div class="card-footer" style="background-color:white;">

                                    <div class="list-group">


                                        <?php

                                        include('database_connection.php');

                                        $query = "
                                                SELECT * FROM task_list
                                                WHERE user_id = '" . $_SESSION["user_id"] . "' 
                                                ORDER BY task_list_id DESC
                                                ";

                                        $statement = $connect->prepare($query);

                                        $statement->execute();

                                        $result = $statement->fetchAll();

                                        foreach ($result as $row) {

                                            $style = '';

                                            if ($row["task_status"] == 'yes') {
                                                $style = 'text-decoration: line-through';
                                            }

                                            echo '<br><a href="#" style="' . $style . '" class="list-group-flush" id="list-group-flush' . $row["task_list_id"] . '" data-id="' . $row["task_list_id"] . '">' . $row["task_details"] . ' <span class="badge float-left" data-id="' . $row["task_list_id"] . '"><input type = "checkbox"></span></a>';
                                        }
                                        ?>

                                    </div>

                                    <br />

                                    <form method="post" id="to_do_form">
                                        <hr style="padding:-10px;">

                                        <div class="input-group">

                                            <input type="text" style="border-color: transparent!important;" name="task_name" id="task_name" class="form-control input-lg no-outline" autocomplete="off" placeholder="Create a task" />&nbsp;

                                            <div class="input-group-btn">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Add</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php

                        if ($current4 == 1) {
                            $previous = "Activated your account";
                            $currents = "Norm form Submission";
                            $next = "Project Proposal Submission";
                        } else if ($current4 == 2) {
                            $previous = "Norm form Submission";
                            $currents = "Project Proposal Submission";
                            $next = "Apply for the research project";
                        } else if ($current4 == 3) {
                            $previous = "Project Proposal Submission";
                            $currents = "Apply for the research project";
                            $next = "Interim Report 1";
                        } else if ($current4 == 4) {
                            $previous = "Apply for the research project";
                            $currents = "Interim Report 1";
                            $next = "Interim Report 2";
                        } else if ($current4 == 5) {
                            $previous = "Interim Report 1";
                            $currents = "Interim Report 2";
                            $next = "Publish Research";
                        } else if ($current4 == 6) {
                            $previous = "Interim Report 2";
                            $currents = "Publish Research";
                            $next = "Draft thesis submission";
                        } else if ($current4 == 7) {
                            $previous = "Publish Research";
                            $currents = "Draft thesis submission";
                            $next = "Final Thesis submission";
                        } else if ($current4 == 8) {
                            $previous = "Draft thesis submission";
                            $currents = "Final Thesis submission";
                            $next = "-";
                        } else if ($current4 == 9) {
                            $previous =  "Final Thesis submission";
                            $currents = "Completed";
                            $next = "-";
                        } else {
                            $previous = "-";
                            $currents = "-";
                            $next = "-";
                        }

                        ?>
                        <div class="col-lg-6 mb-4"">

                            <div class=" card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Recent Activities</h6>
                            </div>

                            <br>

                            <div class="card-body" style="margin-top:-60px; margin-bottom:-60px; font-size:smaller;">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12 offset-md-0">
                                            <ul class="timeline">

                                                <li>
                                                    <p style="opacity:0.6">Previous activity</p>
                                                    <h5 style="opacity:0.6; font-size:19px;"><?php echo $previous ?></h5>
                                                    <br>
                                                </li>

                                                <li>
                                                    <p>Current activity</p>
                                                    <h5 style="font-size:19px;"><?php echo $currents ?></h5>
                                                    <br>

                                                </li>

                                                <li>
                                                    <p style="opacity:0.6">Next activity</p>
                                                    <h5 style="opacity:0.6; font-size:19px;"><?php echo $next ?></h5>
                                                    <br>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>

                    <div class="col-lg-6 mb-4">

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Deadline Calendar</h6>
                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div id="datetimepicker2"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <?php

                                            $sql = "SELECT count(form) as count from deadLines";
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0) {
                                                if ($row = $result->fetch_assoc()) {
                                                    $count = $row['count'];
                                                }
                                            }


                                            ?>

                                            <div>
                                                <?php for ($i = 0; $i < $count; $i++) {

                                                    $i1 = $i + 1;

                                                    $sql = "SELECT * from deadLines order by deadLine limit $i1 OFFSET $i ";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        if ($row = $result->fetch_assoc()) {
                                                            $details = $row['Details'];
                                                            $date = $row['deadLine'];
                                                        }
                                                    }

                                                    $dt = new DateTime($date);
                                                    $date = $dt->format('d / M :');
                                                    $time = $dt->format('H:i:s');

                                                ?>

                                                    <ul>
                                                        <li>
                                                            <h6><?php echo $date ?> <?php echo $details ?></h6>
                                                        </li>
                                                    </ul>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $.get("server/adapter.php", function(data) {
                                        disabledDates = data.split(',');
                                        $('#datetimepicker2').datepicker({
                                            format: 'yyyy-mm-dd',
                                            datesDisabled: disabledDates,
                                        });
                                    });
                                </script>


                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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
                    <form method='post' action="">
                        <input class="btn btn-primary" type="submit" value="Logout" name="but_logout">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <?php

    $sql = "SELECT current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $current = (int)$row["current"] - 1;

            if ((int)$current == '9') {
                $current = 8;
            }

            $current2 = round(($current * 100 / 8), 2);
            $current3 = round(($current * 33 / 8), 2);
        }
    }

    $sql = "SELECT max(weekNo) as weekNo FROM weeklyProgress WHERE kduEmail='" . $_SESSION['uname'] . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $weekNo = $row["weekNo"];
            $weekNo2 = round(($weekNo * 33 / 22), 2);
        }
    }

    $sql = "SELECT * FROM paper WHERE kduEmail='" . $_SESSION['uname'] . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $presentation = 6;
        }
    } else {
        $sql = "SELECT * FROM final WHERE kduEmail='" . $_SESSION['uname'] . "'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {
                $presentation = 5;
            }
        } else {
            $sql = "SELECT * FROM thesis WHERE kduEmail='" . $_SESSION['uname'] . "'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {

                if ($row = $result->fetch_assoc()) {
                    $presentation = 4;
                }
            } else {
                $sql = "SELECT * FROM progressReview1 WHERE kduEmail='" . $_SESSION['uname'] . "'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {

                    if ($row = $result->fetch_assoc()) {
                        $presentation = 3;
                    }
                } else {
                    $sql = "SELECT * FROM progressReview2 WHERE kduEmail='" . $_SESSION['uname'] . "'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {

                        if ($row = $result->fetch_assoc()) {
                            $presentation = 2;
                        }
                    } else {
                        $sql = "SELECT * FROM proposalEvaluation WHERE kduEmail='" . $_SESSION['uname'] . "'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {

                            if ($row = $result->fetch_assoc()) {
                                $presentation = 1;
                            }
                        } else {
                            $presentation = 0;
                        }
                    }
                }
            }
        }
    }
    $presentation2 = round(($presentation * (33 * 33.33) / (9 * 22)), 2);


    ?>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");

        var myPieChart = new Chart(ctx, {

            type: 'doughnut',
            data: {
                labels: ["Progress", "Progress due"],
                datasets: [{
                    data: [<?php echo $current2 ?>, 100 - <?php echo $current2 ?>],
                    backgroundColor: ['#4e73df'],
                    hoverBackgroundColor: ['#2e59d9'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },

        });


        // Pie Chart Example
        var ctx = document.getElementById("myPieChart2");

        var myPieChart = new Chart(ctx, {


            type: 'doughnut',
            data: {
                labels: ["Submissions", "Weekly progress", "Presentations", "Progress due"],
                datasets: [{
                    data: [<?php echo $current3 ?>, <?php echo $weekNo2 ?>, <?php echo $presentation2 ?>, 100 - (<?php echo $current3 + $weekNo2 +  $presentation2 ?>)],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 0,
            },

        });

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart3");

        var myPieChart = new Chart(ctx, {

            type: 'doughnut',
            data: {
                labels: ["Direct", "Referral", "Social"],
                datasets: [{
                    data: [5, 10, 30, 50],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },

        });
    </script>


    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>

<script>
    $(document).ready(function() {

        $(document).on('submit', '#to_do_form', function(event) {
            event.preventDefault();

            if ($('#task_name').val() == '') {
                return false;
            } else {
                $('#submit').attr('disabled', 'disabled');
                $.ajax({
                    url: "add_task.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#submit').attr('disabled', false);
                        $('#to_do_form')[0].reset();
                        $('.list-group').prepend(data);
                    }
                })
            }
        });

        $(document).on('click', '.list-group-flush', function() {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "update_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function(data) {
                    $('#list-group-flush' + task_list_id).css('text-decoration',
                        'line-through');
                }
            })
        });

        $(document).on('click', '.badge', function() {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "delete_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function(data) {
                    $('#list-group-flush' + task_list_id).fadeOut('slow');
                }
            })
        });

    });
</script>