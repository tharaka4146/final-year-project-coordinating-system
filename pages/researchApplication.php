<?php

include 'config.php';

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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


//$sql = "SELECT * FROM research WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$sql = "SELECT norm.kduEmail as kduEmail, norm.firstName as firstName, norm.projectTitle as projectTitle, norm.area as area, norm.supervisor1 as supervisor1, norm.supervisor2 as supervisor2, norm.supervisor3 as supervisor3, research.area as area2, research.summery as summery, research.keywords as keywords, research.problems as problems, research.analysis as analysis, research.literatureReview as literatureReview, research.originality as originality , research.methodology as methodology , research.plan as plan , research.aim as aim, research.objectives as objectives, research.design as design, research.indicators as indicators, research.ethical as ethical, research.deliverables as deliverables, research.significance as significance, research.stakeholders as stakeholders, research.protect as protect, research.message as message, research.message2 as message2, research.send as send FROM norm INNER JOIN research ON norm.kduEmail=research.kduEmail";
//$sql = "SELECT * FROM norm INNER JOIN research ON norm.kduEmail=research.kduEmail";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $kduEmail = $row['kduEmail'];
        $firstName = $row['firstName'];
        $projectTitle = $row['projectTitle'];
        $area = $row['area'];
        $supervisor1 = $row['supervisor1'];
        $supervisor2 = $row['supervisor2'];
        $supervisor3 = $row['supervisor3'];
        $area2 = $row['area2'];
        $summery = $row['summery'];
        $keywords = $row['keywords'];
        $problems = $row['problems'];
        $analysis = $row['analysis'];
        $literatureReview = $row['literatureReview'];
        $originality = $row['originality'];
        $methodology = $row['methodology'];
        $plan = $row['plan'];
        $aim = $row['aim'];
        $objectives = $row['objectives'];
        $design = $row['design'];
        $indicators = $row['indicators'];
        $ethical = $row['ethical'];
        $deliverables = $row['deliverables'];
        $significance = $row['significance'];
        $stakeholders = $row['stakeholders'];
        $protect = $row['protect'];
        $send = $row['send'];
        $message = $row['message'];
        $message2 = $row['message2'];

        if ($send == 1) {
            $disabled2 = "disabled";
        } else {
            $disabled2 = "";
        }


        //echo 'ok';
    }
} else {
    $kduEmail = "";
    $send = '0';
    $projectTitle = "";
    $area = "";
    $area2 = "";
    $supervisor1 = "";
    $supervisor2 = "";
    $supervisor3 = "";
    $summery = "";
    $keywords = "";
    $problems = "";
    $analysis = "";
    $literatureReview = "";
    $originality = "";
    $aim = "";
    $objectives = "";
    $methodology = "";
    $plan = "";
    $design = "";
    $indicators = "";
    $ethical = "";
    $deliverables = "";
    $significance = "";
    $stakeholders = "";
    $protect = "";
    $message = "";
    $message2 = null;
    $disabled2 = "";

    /*

    $nameS1 = "";
    $areaS1 = "";
    $emailS1 = "";
    $institutionS1 = "";
    $contactNoS1 = "";

    $nameS2 = "";
    $areaS2 = "";
    $institutionS2 = "";
    $emailS2 = "";
    $contactNoS2 = "";

    $nameS3 = "";
    $areaS3 = "";
    $institutionS3 = "";
    $emailS3 = "";
    $contactNoS3 = "";

    */

    $sql = "SELECT * from norm where kduEmail = '" . $_SESSION['uname'] . "'";
    //$sql = "SELECT * FROM norm INNER JOIN research ON norm.kduEmail=research.kduEmail";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $firstName = $row['firstName'];
            $kduEmail = $row['kduEmail'];
            $contactNo = $row['contactNo'];
            $area = $row['area'];
            $projectTitle = $row['projectTitle'];
            $supervisor1 = $row['supervisor1'];
            $supervisor2 = $row['supervisor2'];
            $supervisor3 = $row['supervisor3'];
        }
    }
}

$sql = "SELECT contactNo FROM student WHERE kduEmail='" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $contactNo = $row['contactNo'];
    }
}

$sql = "SELECT * FROM supervisors WHERE name='" . $supervisor1 . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $nameS1 = $row['name'];
        $areaS1 = $row['area'];
        $emailS1 = $row['kduEmail'];
        $institutionS1 = $row['institution'];
        $contactNoS1 = $row['contactNo'];
    }
} else {
    $nameS1 = "not assigned yet";
    $areaS1 = "not assigned yet";
    $emailS1 = "not assigned yet";
    $institutionS1 = "not assigned yet";
    $contactNoS1 = "not assigned yet";
}

$sql = "SELECT * FROM supervisors WHERE name='" . $supervisor2 . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $nameS2 = $row['name'];
        $areaS2 = $row['area'];
        $institutionS2 = $row['institution'];
        $emailS2 = $row['kduEmail'];
        $contactNoS2 = $row['contactNo'];
    }
} else {
    $nameS2 = "not assigned yet";
    $areaS2 = "not assigned yet";
    $emailS2 = "not assigned yet";
    $institutionS2 = "not assigned yet";
    $contactNoS2 = "not assigned yet";
}

$sql = "SELECT * FROM supervisors WHERE name='" . $supervisor3 . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $nameS3 = $row['name'];
        $areaS3 = $row['area'];
        $institutionS3 = $row['institution'];
        $emailS3 = $row['kduEmail'];
        $contactNoS3 = $row['contactNo'];
    }
} else {
    $nameS3 = "not assigned yet";
    $areaS3 = "not assigned yet";
    $emailS3 = "not assigned yet";
    $institutionS3 = "not assigned yet";
    $contactNoS3 = "not assigned yet";
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

    <script src="jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#but_upload").click(function() {

                alert('File uploaded');
                var fd = new FormData();

                var files = $('#file')[0].files[0];

                fd.append('file', files);

                $.ajax({
                    url: 'uploadExcel.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response != 0) {
                            $("#img").attr("src", response);
                            $('.preview img').show();
                        } else {
                            alert('File not uploaded');
                        }
                    }
                });
            });
        });
    </script>


    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->

    <link rel='stylesheet' href='../css/loading.css' type='text/css' />

    <link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href='../css/sb-admin-2.min.css' rel='stylesheet'>

    <script>
        function enable() {
            if (<?php echo $send; ?> == 1) {} else {
                document.getElementById('banner1').style.display = 'none';
            }

        }
    </script>

    <script>
        function enable2() {

            if (<?php echo is_null($message2) ?>) {
                document.getElementById("banner3").style.display = 'none';
            }

        }
    </script>

</head>

<body id='page-top' onload='enable(),enable2()' class="toggle-loading">

    <!-- Page Wrapper -->
    <div id='wrapper'>

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeStudent.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i>
            <img src="https://img.icons8.com/color/48/000000/dynamics-365.png" />
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
                    <h1 class='h3 mb-4 text-gray-800'>APPLICATION FOR UNDER GRADUATE FINAL YEAR RESEARCH PROJECT</h1>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner1'>

                        <h6 class='alert-heading'>Saved and sent for marking successfully ! You cannot edit further</h6>

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

                                <form method='POST'>
                                    <fieldset <?php echo $disabled2 ?>>



                                        <div class='card-header card-header-divider'>Project Information</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Project Title</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <input class='form-control' id='projectTitle' name='projectTitle' type='text' value="<?php echo $projectTitle ?>" disabled>
                                                </div>
                                            </div>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research area</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <select class='form-control' disabled>
                                                        <option selected><?php echo $area; ?></option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Specific Area</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='area' name='area' rows='4'><?php echo $area2; ?></textarea>
                                                </div>
                                            </div>


                                        </div>

                                        <fieldset disabled>

                                            <div class='card-header card-header-divider'>Supervisor 1 Information</div>

                                            <div class='card-body'>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $nameS1; ?>">

                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $institutionS1; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $areaS1; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $emailS1; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                                    </label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $contactNoS1; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class='card-header card-header-divider'>Supervisor 2 Information</div>

                                            <div class='card-body'>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $nameS2; ?>">

                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $institutionS2; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $areaS2; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $emailS2; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                                    </label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $contactNoS2; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class='card-header card-header-divider'>Supervisor 3 Information</div>

                                            <div class='card-body'>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $nameS3; ?>">

                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $institutionS3; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $areaS3; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $emailS3; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                                    </label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $contactNoS3; ?>">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class='card-header card-header-divider'>Student Information</div>

                                            <div class='card-body'>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>First Name</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $firstName; ?>">

                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' id='email' name='email' type='text' value="<?php echo $kduEmail; ?>">
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' id='contactNo' name='contactNo' type='text' value="<?php echo $contactNo; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                        </fieldset>


                                        <div class='card-header card-header-divider'>Summary</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Summery</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='summery' name='summery' rows='4'><?php echo $summery; ?></textarea>
                                                </div>
                                            </div>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Give 3 – 5 keywords for the proposed project (use commas to seperate)</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <!--<div class="editable" contenteditable="true" style="border:1px solid #CDCDCD; padding:10px 5px 0px 0px; border-radius:5px;">
                                                        <ul id="keywords" name="keywords">
                                                            <li></li>
                                                        </ul>
                                                    </div>-->
                                                    <textarea class='form-control' id='keywords' name='keywords' rows='4'><?php echo $keywords; ?></textarea>

                                                </div>
                                            </div>

                                        </div>


                                        <div class='card-header card-header-divider'>Research Problem</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research Problem/s</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='problems' name='problems' rows='4'><?php echo $problems; ?></textarea>

                                                </div>
                                            </div>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Analysis of the problem/s and rationale for the research question</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='analysis' name='analysis' rows='8'><?php echo $analysis; ?></textarea>
                                                </div>
                                            </div>

                                        </div>


                                        <div class='card-header card-header-divider'>Comprehensive literature review AND the complete list of references in the relevant area. </div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Attach additional sheets if necessary</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='literatureReview' name='literatureReview' rows='8'><?php echo $literatureReview; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Originality & innovativeness of the proposed work</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Originality & innovativeness of the proposed work</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='originality' name='originality' rows='8'><?php echo $originality; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Overall aim and specific objectives of the proposed work</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Overall aim</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='aim' name='aim' rows='8'><?php echo $aim; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Specific Objective/s</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='objectives' name='objectives' rows='8'><?php echo $objectives; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Methodology</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Describe the Methodology Attach additional sheets if necessary)</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='methodology' name='methodology' rows='8'><?php echo $methodology; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Experimental design where applicable Please complete relevant sections
                                                </label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='design' name='design' rows='8'><?php echo $design; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Work plan</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>

                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Attach the quarterly Gantt Chart to cover the proposed study, download the sample from <a href="../file store/gantt chart.xlsx" download>here</a> and upload it</label>

                                                <div class='col-12 col-sm-8 col-lg-6'>

                                                    <form method="post" action="" enctype="multipart/form-data" id="myform">

                                                        <br>

                                                        <center>

                                                            <div class="custom-file col-10">
                                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                            <input type="button" class="btn btn-primary btn-sm" value="Upload" id="but_upload">


                                                        </center>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Indicators & milestones of progress</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Please list the milestones and indicators that will be used to measure the progress of the proposed Study</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='indicators' name='indicators' rows='8'><?php echo $indicators; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Ethical considerations</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Ethical considerations</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='ethical' name='ethical' rows='8'><?php echo $ethical; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Expected Research Outputs</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Deliverables at the end of the project in point form</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='deliverables' name='deliverables' rows='8'><?php echo $deliverables; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Plan to utilize the research output</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Plan to utilize the research output</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='plan' name='plan' rows='8'><?php echo $plan ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Research Outcomes</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Significance of research outcomes and the impact on national/socio-economic development of Sri Lanka. Please write in point form</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='significance' name='significance' rows='8'><?php echo $significance; ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Identify relevant stakeholders and potential beneficiaries</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='stakeholders' name='stakeholders' rows='8'><?php echo $stakeholders; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Plan to protect and exploit Intellectual Property (IP)? (Indicate if applicable)</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Plan to protect and exploit Intellectual Property (IP)? (Indicate if applicable)</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='protect' name='protect' rows='8'><?php echo $protect; ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='card-header card-header-divider'>Any other message</div>

                                        <div class='card-body'>

                                            <div class='form-group row'>
                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Type any information that you feel important</label>
                                                <div class='col-12 col-sm-8 col-lg-6'>
                                                    <textarea class='form-control' id='message' name='message' rows='8'><?php echo $message; ?></textarea>
                                                </div>
                                            </div>

                                        </div>


                                        <center>

                                            <a href='#' class='btn btn-primary btn-icon-split'>
                                                <span class='icon text-white-50'>
                                                    <!--<i class = 'fas fa-flag'></i>-->
                                                </span>
                                                <br>
                                                <button type='submit' formaction='../databases/researchSave.php' class='btn btn-primary btn-icon-split text' id='save'>Save and edit
                                                    later</button>
                                            </a>

                                            <a href='#' class='btn btn-success btn-icon-split'>
                                                <span class='icon text-white-50'>
                                                    <!--<i class = 'fa fa-check'></i>-->
                                                </span>
                                                <button type='submit' formaction='../databases/researchSend.php' class='btn btn-success btn-icon-split text' id='send'>Send for
                                                    marking</button>
                                            </a>

                                        </center>

                                        <br>

                                    </fieldset>
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