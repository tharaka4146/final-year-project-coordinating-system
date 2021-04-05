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

$sql = "SELECT firstName FROM student WHERE kduEmail='" . $_SESSION['uname'] . "' and firstName != ''";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['firstName'];
    }
} else {
    $name = $_SESSION['uname'];
}

$sql = "SELECT current FROM student WHERE kduEmail='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $current = $row['current'];

        $oneColor = 'pricing-table';
        $oneButton = 'disabled';

        $twoColor = 'pricing-table';
        $twoButton = 'disabled';

        $threeColor = 'pricing-table';
        $threeButton = 'disabled';

        $fourColor = 'pricing-table';
        $fourButton = 'disabled';

        $fiveColor = 'pricing-table';
        $fiveButton = 'disabled';

        $sixColor = 'pricing-table';
        $sixButton = 'disabled';

        $sevenColor = 'pricing-table';
        $sevenButton = 'disabled';

        $eightColor = 'pricing-table';
        $eightButton = 'disabled';

        $buttonArray = array("$oneButton", "$twoButton", "$threeButton", "$fourButton", "$fiveButton", "$sixButton", "$sevenButton", "$eightButton");
        $ColorsArray = array($oneColor, "$twoColor", "$threeColor", "$fourColor", "$fiveColor", "$sixColor", "$sevenColor", "$eightButton");

        for ($i = 0; $i < $current; $i++) {
            $buttonArray[$i] = 'btn';
            $buttonArray[$current - 1] = 'btn-outline';
            $ColorsArray[$current - 1] = 'pricing-table-color';
        }

        if ($current == 9) {
            for ($i = 0; $i < 8; $i++) {
                $buttonArray[$i] = 'btn-outline';
                $ColorsArray[$i] = 'pricing-table-color';
            }
        }

        //$oneDisable = "disabled";
        /*
        if ($current == 1) {
            $oneColor = 'pricing-table-color';
            $oneButton = 'btn-outline';
        } elseif ($current == 2) {
            $twoColor = 'pricing-table-color';
            $twoButton = 'btn-outline';
            $oneButton = '';
        } elseif ($current == 3) {
            $threeColor = 'pricing-table-color';
            $threeButton = 'btn-outline';
            $twoButton = '';
        } elseif ($current == 4) {
            $fourColor = 'pricing-table-color';
            $fourButton = 'btn-outline';
            $threeButton = '';
        } elseif ($current == 5) {
            $fiveColor = 'pricing-table-color';
            $fiveButton = 'btn-outline';
            $fourButton = '';
        } elseif ($current == 6) {
            $sixColor = 'pricing-table-color';
            $sixButton = 'btn-outline';
            $fiveButton = '';
        } elseif ($current == 7) {
            $sevenColor = 'pricing-table-color';
            $sevenButton = 'btn-outline';
            $sixButton = '';
        } elseif ($current == 8) {
            $eightColor = 'pricing-table-color';
            $Colorsss[0] = 'pricing-table-color';
            $eightButton = 'btn-outline';
            $sevenButton = '';
        }
        */
    }
} else {
    echo 'error :/';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/viewForms.css" type="text/css" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Forms</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">



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
                <div class="main-content container-fluid">

                    <div class="row pricing-tables">

                        <div class="col-lg-4">

                            <div class="pricing-table <?php echo $ColorsArray[0]; ?> pricing-table-primary">
                                <div class="pricing-table-image"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewbox="0 35 430 360" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 35 430 360">
                                    </svg></div>
                                <div class="pricing-table-title">
                                    <h4>Norm Form</h4>
                                </div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">1 </span><span class="currency">st</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                    <li>Fill the online form and submit</li>
                                    <li>or you can save for further editing</li>
                                    <li>Submit when finished</li>
                                </ul><a class="btn btn-primary" <?php echo $buttonArray[0]; ?> href="norm.php" <?php echo $buttonArray[0]; ?>>Fill</a>
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[1]; ?> pricing-table-warning">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewbox="0 35 430 360" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 35 430 360">
                                    </svg>
                                </div>
                                <div class="pricing-table-title">
                                    <h4>Project Proposal</h4>
                                </div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">2 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                    <li></li>
                                </ul><a class="btn btn-warning <?php echo $buttonArray[1]; ?>" href="uploadProjectProposal.php" <?php echo $buttonArray[1]; ?>>Upload</a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[2]; ?> pricing-table-success">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="120" height="70" viewbox="0 90 460 280" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 90 460 280">
                                    </svg>
                                </div>
                                <div class="pricing-table-title"><h4>Apply for the research project</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">3 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                    <li>Fill the online form and submit</li>
                                    <li>or you can save for further editing</li>
                                    <li>Submit when finished</li>
                                </ul><a class="btn btn-success <?php echo $buttonArray[2]; ?>" href="researchApplication.php" <?php echo $buttonArray[2]; ?>>Fill</a>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[3]; ?> pricing-table-danger">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="78" height="70" viewbox="0 15 473 440" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 15 473 440">
                                    </svg>
                                </div>
                                <div class="pricing-table-title"><h4>Interim Report 1</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">4 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                   <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-danger <?php echo $buttonArray[3]; ?>" href="uploadInterim1.php" <?php echo $buttonArray[3]; ?>>Upload</a>
                            </div>
                        </div>



                        <div class="col-lg-4">

                            <div class="pricing-table <?php echo $ColorsArray[4]; ?> pricing-table-primary">
                                <div class="pricing-table-image"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewbox="0 35 430 360" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 35 430 360">
                                    </svg></div>
                                <div class="pricing-table-title"><h4>Interim Report 2</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">5 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                   <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-primary <?php echo $buttonArray[4]; ?>" href="uploadInterim2.php" <?php echo $buttonArray[4]; ?>>Upload</a>
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[5]; ?> pricing-table-warning">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="85" height="70" viewbox="0 35 430 360" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 35 430 360">
                                    </svg>
                                </div>
                                <div class="pricing-table-title"><h4>Publish Research Work</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">6 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                   <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-warning <?php echo $buttonArray[5]; ?>" href="uploadResearchWork.php" <?php echo $buttonArray[5]; ?>>Upload</a>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[6]; ?> pricing-table-success">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="120" height="70" viewbox="0 90 460 280" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 90 460 280">
                                    </svg>
                                </div>
                                <div class="pricing-table-title"><h4>Draft thesis submission</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">7 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                   <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-success <?php echo $buttonArray[6]; ?>" href="uploadThesis.php" <?php echo $buttonArray[6]; ?>>Upload</a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="pricing-table <?php echo $ColorsArray[7]; ?> pricing-table-danger">
                                <div class="pricing-table-image">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="78" height="70" viewbox="0 15 473 440" xmlns:xlink="http://-www.w3.org/1999/xlink" enable-background="new 0 15 473 440">
                                    </svg>
                                </div>
                                <div class="pricing-table-title"><h4>Final Thesis submission</h4></div>
                                <div class="card-divider card-divider-xl"></div>
                                <div class="pricing-table-price"><span class="value">8 </span><span class="currency">nd</span><span class="frecuency"> out of 8</span></div>
                                <ul class="pricing-table-features">
                                   <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-danger <?php echo $buttonArray[7]; ?>" href="uploadThesisFinal.php" <?php echo $buttonArray[7]; ?>>Upload</a>
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

</body>

</html>