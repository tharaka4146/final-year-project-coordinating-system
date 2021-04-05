<?php

include 'config.php';

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

//name at the top
$sql = "SELECT firstName FROM student WHERE kduEmail='" . $_SESSION['uname'] . "' and firstName != ''";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['firstName'];
    }
} else {
    $name = $_SESSION['uname'];
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

    <title>Weekly Progress</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://foxythemes.net/preview/products/maisonnette/assets/lib/fuelux/css/wizard.css" />
    <link type="text/css" href="../css/wizardApp.css" rel="stylesheet">


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
                    <h1 class="h3 mb-4 text-gray-800">Student Feedback Book</h1>

                    <div class="mai-wrapper">

                        <div class="main-content container">

                            <div class="row wizard-row">

                                <div class="col-md-12 fuelux">

                                    <div class="block-wizard">

                                        <div class="wizard wizard-ux" id="wizard1">

                                            <?php

                                            $active1 = '';
                                            $active2 = '';
                                            $active3 = '';
                                            $active4 = '';
                                            $active5 = '';
                                            $active6 = '';
                                            $active7 = '';
                                            $active8 = '';
                                            $active9 = '';
                                            $active10 = '';
                                            $active11 = '';
                                            $active12 = '';
                                            $active13 = '';
                                            $active14 = '';
                                            $active15 = '';
                                            $active16 = '';
                                            $active17 = '';
                                            $active18 = '';
                                            $active19 = '';
                                            $active20 = '';
                                            $active21 = '';
                                            $active22 = '';

                                            $sql = "SELECT max(weekNo) as weekNo FROM weeklyProgress WHERE kduEmail='" . $_SESSION['uname'] . "'";
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0) {
                                                if ($row = $result->fetch_assoc()) {
                                                    $weekNo = $row['weekNo'];

                                                    if ($weekNo == 1) {
                                                        $active1 = 'class="active"';
                                                    } else if ($weekNo == 2) {
                                                        $active2 = 'class="active"';
                                                    } else if ($weekNo == 3) {
                                                        $active3 = 'class="active"';
                                                    } else if ($weekNo == 4) {
                                                        $active4 = 'class="active"';
                                                    } else if ($weekNo == 5) {
                                                        $active5 = 'class="active"';
                                                    } else if ($weekNo == 6) {
                                                        $active6 = 'class="active"';
                                                    } else if ($weekNo == 7) {
                                                        $active7 = 'class="active"';
                                                    } else if ($weekNo == 8) {
                                                        $active8 = 'class="active"';
                                                    } else if ($weekNo == 9) {
                                                        $active9 = 'class="active"';
                                                    } else if ($weekNo == 10) {
                                                        $active10 = 'class="active"';
                                                    } else if ($weekNo == 11) {
                                                        $active11 = 'class="active"';
                                                    } else if ($weekNo == 12) {
                                                        $active12 = 'class="active"';
                                                    } else if ($weekNo == 13) {
                                                        $active13 = 'class="active"';
                                                    } else if ($weekNo == 14) {
                                                        $active14 = 'class="active"';
                                                    } else if ($weekNo == 15) {
                                                        $active15 = 'class="active"';
                                                    } else if ($weekNo == 16) {
                                                        $active16 = 'class="active"';
                                                    } else if ($weekNo == 17) {
                                                        $active17 = 'class="active"';
                                                    } else if ($weekNo == 18) {
                                                        $active18 = 'class="active"';
                                                    } else if ($weekNo == 19) {
                                                        $active19 = 'class="active"';
                                                    } else if ($weekNo == 20) {
                                                        $active20 = 'class="active"';
                                                    } else if ($weekNo == 21) {
                                                        $active21 = 'class="active"';
                                                    } else if ($weekNo == 22) {
                                                        $active22 = 'class="active"';
                                                    } else {
                                                        $active1 = 'class="active"';
                                                    }
                                                }
                                            } else {
                                                $active1 = 'class="active"';
                                            }

                                            ?>

                                            <div class="steps-container">

                                                <ul class="steps">
                                                    <li <?php echo $active1 ?> data-step="1">week 1<span class="chevron"></span></li>
                                                    <li <?php echo $active2 ?> data-step="2">week 2<span class="chevron"></span></li>
                                                    <li <?php echo $active3 ?> data-step="3">week 3<span class="chevron"></span></li>
                                                    <li <?php echo $active4 ?> data-step="4">week 4<span class="chevron"></span></li>
                                                    <li <?php echo $active5 ?> data-step="5">week 5<span class="chevron"></span></li>
                                                    <li <?php echo $active6 ?> data-step="6">week 6<span class="chevron"></span></li>
                                                    <li <?php echo $active7 ?> data-step="7">week 7<span class="chevron"></span></li>
                                                    <li <?php echo $active8 ?> data-step="8">week 8<span class="chevron"></span></li>
                                                    <li <?php echo $active9 ?> data-step="9">week 9<span class="chevron"></span></li>
                                                    <li <?php echo $active10 ?> data-step="10">week 10<span class="chevron"></span></li>
                                                    <li <?php echo $active11 ?> data-step="11">week 11<span class="chevron"></span></li>
                                                    <li <?php echo $active12 ?> data-step="12">week 12<span class="chevron"></span></li>
                                                    <li <?php echo $active13 ?> data-step="13">week 13<span class="chevron"></span></li>
                                                    <li <?php echo $active14 ?> data-step="14">week 14<span class="chevron"></span></li>
                                                    <li <?php echo $active15 ?> data-step="15">week 15<span class="chevron"></span></li>
                                                    <li <?php echo $active16 ?> data-step="16">week 16<span class="chevron"></span></li>
                                                    <li <?php echo $active17 ?> data-step="17">week 17<span class="chevron"></span></li>
                                                    <li <?php echo $active18 ?> data-step="18">week 18<span class="chevron"></span></li>
                                                    <li <?php echo $active19 ?> data-step="19">week 19<span class="chevron"></span></li>
                                                    <li <?php echo $active20 ?> data-step="20">week 20<span class="chevron"></span></li>
                                                    <li <?php echo $active21 ?> data-step="21">week 21<span class="chevron"></span></li>
                                                    <li <?php echo $active22 ?> data-step="22">week 22<span class="chevron"></span></li>
                                                </ul>

                                            </div>

                                            <div class="actions">

                                                <button class="btn btn-xs btn-prev btn-secondary" type="button"><i class="icon s7-angle-left"></i>Prev</button>
                                                <button class="btn btn-xs btn-next btn-secondary" type="button" data-last="Finish">Next<i class="icon s7-angle-right"></i></button>

                                            </div>

                                            <div class="step-content">

                                                <?php for ($i = 1; $i < 22; $i++) {

                                                    $outline = "";
                                                    $feedback = "";
                                                    $submittedDate = "";
                                                    $approvedDate = "";
                                                    $supervisor1 = "";
                                                    $approvedDate = "";
                                                    $disabled = "";

                                                    $sql = "SELECT * FROM weeklyProgress WHERE kduEmail ='" . $_SESSION['uname'] . "' and weekNo = '" . $i . "'";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        if ($row = $result->fetch_assoc()) {
                                                            $outline = $row['outline'];
                                                            $feedback = $row['feedback'];
                                                            //$submittedDate = $row['submittedDate'];
                                                            $submittedDate = date_create($row['submittedDate']);
                                                            $approvedDate = date_create($row['approvedDate']);

                                                            $submittedDate =  date_format($submittedDate, 'd F Y');

                                                            if (isset($feedback)) {
                                                                $approvedDate =  date_format($approvedDate, 'd F Y');
                                                            } else {
                                                                $approvedDate = "";
                                                            }

                                                            if (isset($feedback)) {
                                                                $disabled = "disabled";
                                                            } else {
                                                                $disabled = "";
                                                            }
                                                        }
                                                    }

                                                    $sql = "SELECT supervisors.kduEmail as supervisor FROM supervisors INNER JOIN norm on supervisors.name = norm.s1 WHERE norm.kduEmail='" . $_SESSION['uname'] . "'";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        if ($row = $result->fetch_assoc()) {
                                                            $supervisor = $row['supervisor'];
                                                        }
                                                    } else {
                                                        $supervisor = "nope";
                                                    }

                                                ?>


                                                    <div class="step-pane active" data-step=<?php echo $i ?>>

                                                        <div class="container pl-sm-5">

                                                            <form class="form-horizontal group-border-dashed" method="POST" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">

                                                                <fieldset <?php echo $disabled ?>>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <h3 class="wizard-title text-sm-center">Report <?php echo $i ?>
                                                                            </h3>
                                                                            <input id="weekNo" name="weekNo" type="text" value=<?php echo $i ?> hidden>
                                                                            <input id="supervisor1" name="supervisor1" type="text" value=<?php echo $supervisor ?> hidden>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-12 col-sm-3 col-lg-12 col-form-label text-left text-sm-center">Outline
                                                                            of the Activities</label>
                                                                        <div class="col-12 col-sm-8 col-lg-12">
                                                                            <textarea rows="10" class="form-control" id="outline" name="outline" placeholder="Type your weekly progress here"><?php echo $outline ?></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label class="col-12 col-sm-3 col-lg-12 col-form-label text-left text-sm-center">Supervisors
                                                                            Feedback</label>
                                                                        <div class="col-12 col-sm-8 col-lg-12">
                                                                            <textarea rows="10" class="form-control" id="feedback" name="feedback" placeholder="Supervisors gives feedback once you submit" disabled><?php echo $feedback ?></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <div class="d-flex justify-content-center">

                                                                        <div class="form-group row">

                                                                            <label class="col-12 col-sm-3 col-lg-2 col-form-label text-left text-sm-right">Submitted
                                                                                Date</label>

                                                                            <div class="col-12 col-sm-8 col-lg-3">
                                                                                <input class="form-control" type="text" value="<?php echo $submittedDate ?>" disabled>
                                                                            </div>

                                                                            <label class="col-12 col-sm-3 col-lg-2 col-form-label text-left text-sm-right">Approved
                                                                                Date</label>
                                                                            <div class="col-12 col-sm-8 col-lg-3">
                                                                                <input class="form-control" type="text" value="<?php echo $approvedDate ?>" disabled>
                                                                            </div>

                                                                            <div class="col-lg-2">
                                                                                <button type='submit' formaction='../databases/weeklyProgress.php' style="border:0px;" class="btn btn-primary form-control btn-space wizard-next" data-wizard="#wizard1">Submit</button>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </fieldset>

                                                            </form>


                                                            <div class="d-flex justify-content-center">

                                                                <div class="form-group row">

                                                                    <div class="col-lg-6">
                                                                        <button class="btn btn-xs btn-prev btn-secondary btn btn-secondary form-control btn-space">Previous</button>
                                                                    </div>


                                                                    <div class="col-lg-6">
                                                                        <button style="border:0px;" class="btn btn-primary form-control btn-space wizard-next" data-wizard="#wizard1">Next Step</button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                <?php } ?>

                                                <?php

                                                $outline = "";
                                                $feedback = "";
                                                $submittedDate = "";
                                                $approvedDate = "";
                                                $supervisor1 = "";
                                                $approvedDate = "";
                                                $disabled = "";

                                                //$sql = "SELECT * FROM weeklyProgress WHERE kduEmail ='" . $_SESSION['uname'] . "' and weekNo = 22";
                                                $sql = "SELECT * FROM weeklyProgress WHERE weekNo = '22'";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    if ($row = $result->fetch_assoc()) {
                                                        $outline = $row['outline'];
                                                        $feedback = $row['feedback'];
                                                        //$submittedDate = $row['submittedDate'];
                                                        $submittedDate = date_create($row['submittedDate']);
                                                        $approvedDate = date_create($row['approvedDate']);

                                                        $submittedDate =  date_format($submittedDate, 'd F Y');

                                                        if (isset($feedback)) {
                                                            $approvedDate =  date_format($approvedDate, 'd F Y');
                                                        } else {
                                                            $approvedDate = "";
                                                        }

                                                        if (isset($feedback)) {
                                                            $disabled = "disabled";
                                                        } else {
                                                            $disabled = "";
                                                        }
                                                    }

                                                ?>

                                                <?php
                                                } else {
                                                }

                                                $sql = "SELECT supervisors.kduEmail as supervisor FROM supervisors INNER JOIN norm on supervisors.name = norm.s1 WHERE norm.kduEmail='" . $_SESSION['uname'] . "'";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    if ($row = $result->fetch_assoc()) {
                                                        $supervisor = $row['supervisor'];
                                                    }
                                                } else {
                                                    $supervisor = "nope";
                                                }

                                                ?>

                                                <div class="step-pane active" data-step="22">

                                                    <div class="container pl-sm-5">

                                                        <form class="form-horizontal group-border-dashed" method="POST" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">

                                                            <fieldset <?php echo $disabled ?>>

                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <h3 class="wizard-title text-sm-center">Final Submission Report
                                                                        </h3>
                                                                        <input id="weekNo" name="weekNo" type="text" value="22" hidden>
                                                                        <input id="supervisor1" name="supervisor1" type="text" value=<?php echo $supervisor ?> hidden>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-12 col-sm-3 col-lg-12 col-form-label text-left text-sm-center">Outline
                                                                        of the Activities</label>
                                                                    <div class="col-12 col-sm-8 col-lg-12">
                                                                        <textarea rows="10" class="form-control" id="outline" name="outline" placeholder="Type your weekly progress here"><?php echo $outline ?></textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-12 col-sm-3 col-lg-12 col-form-label text-left text-sm-center">Supervisors
                                                                        Feedback</label>
                                                                    <div class="col-12 col-sm-8 col-lg-12">
                                                                        <textarea rows="10" class="form-control" id="feedback" name="feedback" placeholder="Supervisors gives feedback once you submit" disabled><?php echo $feedback ?></textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="d-flex justify-content-center">

                                                                    <div class="form-group row">

                                                                        <label class="col-12 col-sm-3 col-lg-2 col-form-label text-left text-sm-right">Submitted
                                                                            Date</label>

                                                                        <div class="col-12 col-sm-8 col-lg-3">
                                                                            <input class="form-control" type="text" value="<?php echo $submittedDate ?>" disabled>
                                                                        </div>

                                                                        <label class="col-12 col-sm-3 col-lg-2 col-form-label text-left text-sm-right">Approved
                                                                            Date</label>
                                                                        <div class="col-12 col-sm-8 col-lg-3">
                                                                            <input class="form-control" type="text" value="<?php echo $approvedDate ?>" disabled>
                                                                        </div>

                                                                        <div class="col-lg-2">
                                                                            <button type='submit' formaction='../databases/weeklyProgress.php' style="border:0px;" class="btn btn-primary form-control btn-space wizard-next" data-wizard="#">Submit</button>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </fieldset>

                                                        </form>


                                                        <div class="d-flex justify-content-center">

                                                            <div class="form-group row">

                                                                <div class="col-lg-6">
                                                                    <button class="btn btn-xs btn-prev btn-secondary btn btn-secondary form-control btn-space">Previous</button>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <button style="border:0px;" class="btn btn-primary form-control btn-space wizard-next" data-wizard="#wizard1">Final</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!--
                                                <div class="step-pane" data-step="2">
                
                                                    <form class="group-border-dashed" action="#" data-parsley-namespace="data-parsley-"
                                                        data-parsley-validate="" novalidate="">
                
                                                        <div class="form-group row">
                                                            <div class="col-sm-7">
                                                                <h3 class="wizard-title">Notifications</h3>
                                                            </div>
                                                        </div>
                
                                                        <div class="form-group row align-items-center">
                
                                                            <div class="col-sm-7">
                                                                <label class="control-label">E-Mail Notifications</label>
                                                                <p>This option allow you to recieve email notifications by us.</p>
                                                            </div>
                
                                                            <div class="col-sm-3 xs-pt-15">
                                                                <div class="switch-button">
                                                                    <input type="checkbox" checked="" name="swt1" id="swt1"><span>
                                                                        <label for="swt1"></label></span>
                                                                </div>
                                                            </div>
                
                                                        </div>
                
                                                        <div class="form-group row align-items-center">
                
                                                            <div class="col-sm-7">
                                                                <label class="control-label">Phone Notifications</label>
                                                                <p>Allow us to send phone notifications to your cell phone.</p>
                                                            </div>
                
                                                            <div class="col-sm-3 xs-pt-15">
                                                                <div class="switch-button">
                                                                    <input type="checkbox" checked="" name="swt2" id="swt2"><span>
                                                                        <label for="swt2"></label></span>
                                                                </div>
                                                            </div>
                
                                                        </div>
                
                                                        <div class="form-group row align-items-center">
                
                                                            <div class="col-sm-7">
                                                                <label class="control-label">Global Notifications</label>
                                                                <p>Allow us to send notifications to your dashboard.</p>
                                                            </div>
                
                                                            <div class="col-sm-3 xs-pt-15">
                                                                <div class="switch-button">
                                                                    <input type="checkbox" checked="" name="swt3" id="swt3"><span>
                                                                        <label for="swt3"></label></span>
                                                                </div>
                                                            </div>
                
                                                        </div>
                
                                                        <div class="form-group row pt-3">
                                                            <div class="col-sm-12">
                                                                <button class="btn btn-secondary btn-space wizard-previous"
                                                                    data-wizard="#wizard1">Previous</button>
                                                                <button class="btn btn-primary btn-space wizard-next"
                                                                    data-wizard="#wizard1">Next Step</button>
                                                            </div>
                                                        </div>
                
                                                    </form>
                
                                                </div>
                
                                                <div class="step-pane" data-step="3">
                
                                                    <form class="form-horizontal group-border-dashed" action="#"
                                                        data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="">
                
                                                        <div class="form-group row">
                                                            <div class="col-sm-7">
                                                                <h3 class="wizard-title">Configuration</h3>
                                                            </div>
                                                        </div>
                
                                                        <div class="form-group row">
                
                                                            <div class="col-sm-6">
                                                                <label class="control-label">Buy Credits: <span
                                                                        id="credits">$30</span></label>
                                                                <p>This option allow you to buy an amount of credits.</p>
                                                                <input class="bslider form-control" id="credit_slider" type="text"
                                                                    value="30">
                                                            </div>
                
                                                            <div class="col-sm-6">
                
                                                                <label class="control-label">Change Plan</label>
                
                                                                <p>Change your plan many times as you want.</p>
                
                                                                <select class="select2">
                
                                                                    <optgroup label="Personal">
                                                                        <option value="p1">Basic</option>
                                                                        <option value="p2">Medium</option>
                                                                    </optgroup>
                
                                                                    <optgroup label="Company">
                                                                        <option value="p3">Standard</option>
                                                                        <option value="p4">Silver</option>
                                                                        <option value="p5">Gold</option>
                                                                    </optgroup>
                
                                                                </select>
                
                                                            </div>
                
                                                        </div>
                
                                                        <div class="form-group row">
                
                                                            <div class="col-sm-6">
                
                                                                <label class="control-label">Payment Rate: <span
                                                                        id="rate">5%</span></label>
                                                                <p>Choose your payment rate to calculate how much money you will
                                                                    recieve.</p>
                                                                <input class="bslider form-control" id="rate_slider" data-slider-min="0"
                                                                    data-slider-max="100" type="text" value="5">
                
                                                            </div>
                
                                                            <div class="col-sm-6">
                
                                                                <label class="control-label">Keywords</label>
                
                                                                <p>Write your keywords to do a successful SEO with web search engines.
                                                                </p>
                
                                                                <select class="tags" multiple="">
                                                                    <option value="1">Twitter</option>
                                                                    <option value="2">Google</option>
                                                                    <option value="3">Facebook</option>
                                                                </select>
                
                                                            </div>
                
                                                        </div>
                
                                                        <div class="form-group row">
                
                                                            <div class="col-sm-12">
                                                                <button class="btn btn-secondary btn-space wizard-previous"
                                                                    data-wizard="#wizard1">Previous</button>
                                                                <button class="btn btn-success btn-space wizard-next"
                                                                    data-wizard="#wizard1">Complete</button>
                                                            </div>
                
                                                        </div>
                
                                                    </form>
                
                                                </div>
                                                -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <script src="https://foxythemes.net/preview/products/maisonnette/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
                    <script src="https://foxythemes.net/preview/products/maisonnette/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
                    <script src="https://foxythemes.net/preview/products/maisonnette/assets/js/app.js" type="text/javascript"></script>
                    <script src="https://foxythemes.net/preview/products/maisonnette/assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
                    <script <script type="text/javascript">
                        $(document).ready(function() {
                            //-initialize the javascript
                            App.init();
                            App.wizard();
                        });
                    </script>

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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>