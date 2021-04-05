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


$sql = "SELECT * FROM norm WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $send = $row['send'];
        $message2 = $row['message2'];
        $firstName = $row['firstName'];
        $areaOrig = $row['area'];
        $message = $row['message'];
        $supervisor1 = $row['supervisor1'];
        $supervisor2 = $row['supervisor2'];
        $supervisor3 = $row['supervisor3'];
        $lastName = $row['lastName'];
        $admissionNo = $row['admissionNo'];
        $email = $row['email'];
        $contactNo = $row['contactNo'];
        $projectTitle = $row['projectTitle'];
        $problem = $row['problem'];
        $solution = $row['solution'];
        $technologies = $row['technologies'];

        //echo 'ok';
    }
} else {
    $sql = 'SELECT * FROM norm WHERE indexNo = 1';

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $areaOrig = "";
            $supervisor1 = "";
            $supervisor2 = "";
            $supervisor3 = "";
            $send = '0';
            $message = "";
            $firstName = "";
            $lastName = "";
            $admissionNo = "";
            $email = "";
            $contactNo = "";
            $contactNo = "";
            $projectTitle = "";
            $problem = "";
            $solution = "";
            $technologies = "";
        }
    } else {
        echo '0 results';
        echo '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Norm Form</title>

    <!-- Custom fonts for this template-->

    <link rel='stylesheet' href='../css/loading.css' type='text/css' />

    <link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href='../css/sb-admin-2.min.css' rel='stylesheet'>

    <script>
        function enable() {

            if (<?php echo $send; ?> == 1) {
                document.getElementById('firstName').disabled = true;
                document.getElementById('lastName').disabled = true;
                document.getElementById('email').disabled = true;
                document.getElementById('admissionNo').disabled = true;
                document.getElementById('contactNo').disabled = true;
                document.getElementById('projectTitle').disabled = true;
                document.getElementById('problem').disabled = true;
                document.getElementById('solution').disabled = true;
                document.getElementById('technologies').disabled = true;
                document.getElementById('area').disabled = true;
                document.getElementById('supervisor1').disabled = true;
                document.getElementById('supervisor2').disabled = true;
                document.getElementById('supervisor3').disabled = true;
                document.getElementById('save').disabled = true;
                document.getElementById('send').disabled = true;
                document.getElementById('message').disabled = true;
                document.getElementById('banner2').style.display = 'none';
            } else {
                document.getElementById('banner1').style.display = 'none';
            }

        }
    </script>

    <script>
        function enable2() {
            if (<?php echo !isset($message2) ?>) {
                document.getElementById('banner3').style.display = 'none';
            }
        }
    </script>

</head>

<body id='page-top' onload='enable(), enable2()' class="toggle-loading">

    <!-- Page Wrapper -->
    <div id='wrapper'>

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
                <div class='container-fluid'>

                    <!-- Page Heading -->
                    <h1 class='h3 mb-4 text-gray-800'>Norm Form</h1>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner1'>

                        <h6 class='alert-heading'>Saved and sent for marking successfully ! You cannot edit further</h6>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>

                    </div>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner2'>

                        <h6 class='alert-heading'>This is your first online form ! You can fill the form and click on
                            'Save and edit later' this saves your document, and does not send any responce to the
                            coordinator. After completing your form click 'Send for marking' this sends the form to your
                            coordinator and you cannot edit any further</h6>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>

                    </div>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner3'>

                        <h6 class='alert-heading'><?php echo $message2; ?></h6>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>

                    </div>

                    <div class='row'>

                        <div class='col-md-12'>

                            <div class='card card-border-color card-border-color-primary'>

                                <form method='POST' name = form1>

                                    <div class='card-header card-header-divider'>Student Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>First
                                                Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $firstName ?>" required>

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Last
                                                Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='lastName' name='lastName' type='text' value="<?php echo $lastName; ?>" required>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Admission No</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='admissionNo' name='admissionNo' type='text' value="<?php echo $admissionNo; ?>" required>
                                            </div>
                                        </div>

                                        <script>
                                            function ValidateEmail(inputText) {
                                                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                                                if (inputText.value.match(mailformat)) {
                                                    alert("Valid email address!");
                                                    document.form1.email.focus();
                                                    return true;
                                                } else {
                                                    document.form1.email.focus();
                                                    return false;
                                                }
                                            }
                                        </script>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $email; ?>" required>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact
                                                Number</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='contactNo' name='contactNo' type='text' value="<?php echo $contactNo; ?>" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Project Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Project
                                                Title</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='projectTitle' name='projectTitle' type='text' value="<?php echo $projectTitle; ?>" required>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Problem in
                                                brief</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='problem' name='problem' rows='8' required><?php echo $problem;
                                                                                                                                ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right' for='inputTextarea3'>Solution</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='solution' name='solution' rows='8' required><?php echo $solution;
                                                                                                                                ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Technologies</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='technologies' name='technologies' rows='8' required><?php echo $technologies;
                                                                                                                                        ?></textarea>
                                            </div>
                                        </div>

                                        <?php

                                        $sql = "SELECT count(distinct(area)) as countArea from supervisors";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            if ($row = $result->fetch_assoc()) {
                                                $countArea = $row['countArea'];
                                            }
                                        }

                                        $sql = "SELECT count(distinct(name)) as countSupervisors from supervisors";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            if ($row = $result->fetch_assoc()) {
                                                $countSupervisors = $row['countSupervisors'];
                                            }
                                        }

                                        ?>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research project
                                                area</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='area' name='area' required>

                                                    <option selected><?php echo $areaOrig; ?></option>

                                                    <?php
                                                    for ($i = 0; $i < $countArea; $i++) {
                                                        $i1 = $i + 1;
                                                        $sql = "SELECT distinct(area) as area FROM supervisors order by area limit $i1 OFFSET $i";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            if ($row = $result->fetch_assoc()) {
                                                                $area = $row["area"];
                                                            }
                                                        }
                                                    ?>
                                                        <option value="<?php echo $area ?>"><?php echo $area ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Supervisor Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Supervisor
                                                1</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='supervisor1' name='supervisor1' required>

                                                    <option selected><?php echo $supervisor1; ?></option>

                                                    <?php
                                                    for ($i = 0; $i < $countSupervisors; $i++) {
                                                        $i1 = $i + 1;

                                                        $sql = "SELECT distinct(name) as nameSupervisor FROM supervisors order by name limit $i1 OFFSET $i";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            if ($row = $result->fetch_assoc()) {
                                                                $nameSupervisor = $row['nameSupervisor'];
                                                            }
                                                        }
                                                    ?>
                                                        <option value="<?php echo $nameSupervisor ?>"><?php echo $nameSupervisor ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Supervisor
                                                2</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='supervisor2' name='supervisor2' required>
                                                    <option selected><?php echo $supervisor2; ?></option>

                                                    <?php
                                                    for ($i = 0; $i < $countSupervisors; $i++) {
                                                        $i1 = $i + 1;

                                                        $sql = "SELECT distinct(name) as nameSupervisor FROM supervisors order by name limit $i1 OFFSET $i";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            if ($row = $result->fetch_assoc()) {
                                                                $nameSupervisor = $row['nameSupervisor'];
                                                            }
                                                        }
                                                    ?>
                                                        <option value="<?php echo $nameSupervisor ?>"><?php echo $nameSupervisor ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Supervisor
                                                3</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='supervisor3' name='supervisor3' required>
                                                    <option selected><?php echo $supervisor3; ?></option>
                                                    <?php
                                                    for ($i = 0; $i < $countSupervisors; $i++) {
                                                        $i1 = $i + 1;

                                                        $sql = "SELECT distinct(name) as nameSupervisor FROM supervisors order by name limit $i1 OFFSET $i";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {

                                                            if ($row = $result->fetch_assoc()) {
                                                                $nameSupervisor = $row['nameSupervisor'];
                                                            }
                                                        }
                                                    ?>
                                                        <option value="<?php echo $nameSupervisor ?>"><?php echo $nameSupervisor ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right' for='inputTextarea3'>Other Information</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='message' name='message' rows='4' required><?php echo $message;
                                                                                                                                ?></textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <center>

                                        <a href='#' class='btn btn-primary btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fas fa-flag'></i>-->
                                            </span>
                                            <br>
                                            <button type='submit' formaction='../databases/normSave.php' class='btn btn-primary btn-icon-split text' id='save' onclick="ValidateEmail(document.form1.email)">Save and edit
                                                later</button>
                                        </a>

                                        <a href='#' class='btn btn-success btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fa fa-check'></i>-->
                                            </span>
                                            <button type='submit' formaction='../databases/normSend.php' class='btn btn-success btn-icon-split text' id='send' onclick="ValidateEmail(document.form1.email)">Send for
                                                marking</button>
                                        </a>

                                    </center>

                                    <br>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class='sticky-footer bg-white'>
                <div class='container my-auto'>
                    <div class='copyright text-center my-auto'>
                        <span>Copyright &copy;
                            Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class='scroll-to-top rounded' href='#page-top'>
        <i class='fas fa-angle-up'></i>
    </a>

    <!-- Logout Modal-->
    <div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Ready to Leave?</h5>
                    <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>Select 'Logout' below if you are ready to end your current session.</div>
                <div class='modal-footer'>
                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                    <a class='btn btn-primary' href='login.html'>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src='../vendor/jquery/jquery.min.js'></script>
    <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

    <!-- Core plugin JavaScript-->
    <script src='../vendor/jquery-easing/jquery.easing.min.js'></script>

    <!-- Custom scripts for all pages-->
    <script src='../js/sb-admin-2.min.js'></script>


    <script src="https://foxythemes.net/preview/products/beagle/assets/lib/jquery/jquery.min.js" type="text/javascript">
    </script>
    <script src="https://foxythemes.net/preview/products/beagle/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://foxythemes.net/preview/products/beagle/assets/js/app.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.loaders();

            //-Runs prettify
            prettyPrint();

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#click').click(function() {});
            // set time out 5 sec
            setTimeout(function() {
                $('#click').trigger('click');
            }, 0);
        });
    </script>

</body>

</html>