<?php

include 'config.php';

$kduEmail = $_GET["kduEmail"];

$sql = "SELECT * FROM supervisors WHERE kduEmail='" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $nameSupervisor = $row['name'];
        $indexNo = $row['indexNo'];
        $bio = $row['bio'];
        $heading = $row['heading'];
        $contactNo = $row['contactNo'];
        $kduEmail = $row['kduEmail'];
        $institution = $row['institution'];
        $area = $row['area'];
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

$sql = "SELECT count(*) as countArea FROM supervisors WHERE kduEmail='" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countArea = $row['countArea'];
    }
}

$areaArray = array();

for ($i = 0; $i < $countArea; $i++) {

    $i1 = $i + 1;

    $sql = "SELECT area FROM supervisors WHERE kduEmail='" . $kduEmail . "' order by indexNo limit $i1 OFFSET $i";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $areaArray[$i] = $row['area'];
        }
    }
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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://uselooper.com/assets/stylesheets/theme.min.css" data-skin="default">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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

                        <a class="dropdown-item d-flex align-items-center" href="../fypcs/test/calendar3/student.php" hidden>
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
                    <a class="dropdown-item" href="profileInfo.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                    </a>
                    <a class="dropdown-item" href="profileSecurity.php">
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

                    <div class="app">

                        <!-- .app-main -->
                        <main class="app-main">
                            <!-- .wrapper -->
                            <div class="wrapper">
                                <!-- .page -->
                                <div class="page" style="margin-top:-55px!important">
                                    <!-- .page-cover -->
                                    <!--<header class="page-cover" >-->
                                    <header class="page-cover" style="background: url(../img/background4.jpg); background-size: cover;">
                                        <div class="text-center">

                                            <p style=" padding-bottom:20px;">

                                                <div class="user-avatar user-avatar-xl">
                                                    <a>
                                                        <img src="../img/profilepics/<?php echo "$nameSupervisor" ?>.jpg" alt="" style="transform: scale(2);">
                                                    </a>
                                                </div>
                                                <h2 class="h4 mt-2 mb-0" style=" padding-top:50px;"> <?php echo $nameSupervisor; ?> </h2>

                                                <div class="my-1">
                                                    <!--<i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>-->
                                                    <i class="fa fa-graduation-cap text-blue" aria-hidden="true"></i>
                                                </div>
                                                <p class="text-muted" style="padding-top: 2px;"> <?php echo $bio; ?> </p>
                                                <p> <?php echo $heading; ?> </p>

                                                <button class="btn btn-primary">Message</button>
                                        </div>

                                    </header>
                                    <!-- /.page-cover -->

                                    <!-- .page-inner -->
                                    <div class="page-inner">
                                        <!-- .page-section -->
                                        <div class="page-section">
                                            <!-- grid row -->
                                            <div class="row">

                                                <!-- grid column -->
                                                <div class="col-lg-8" style="margin: auto;">

                                                    <!-- .card -->
                                                    <div class="card card-fluid">
                                                        <h6 class="card-header">Public Profile </h6>
                                                        <!-- .card-body -->
                                                        <div class="card-body">

                                                            <!-- form -->
                                                            <form method="post" action="../databases/profileInfo.php">
                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input02" class="col-md-3">Full name</label>
                                                                    <!-- /form column -->

                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $nameSupervisor; ?></label>
                                                                    </div>
                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input03" class="col-md-3">KDU Email</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $kduEmail; ?></label>
                                                                    </div>
                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input03" class="col-md-3">Contact Number</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $contactNo; ?></label>
                                                                    </div>
                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input03" class="col-md-3">Index number</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $indexNo; ?></label>
                                                                    </div>

                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <div class="form-row" style="margin-bottom: -30px;">
                                                                    <label class="col-md-3">Areas</label>
                                                                </div>

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <!-- /form column -->
                                                                    <!-- form column -->

                                                                    <?php

                                                                    foreach ($areaArray as $area) { ?>
                                                                        <label for="input03" class="col-md-3"></label>
                                                                        <div class="col-md-9 mb-3">
                                                                            <label class="col-md-12"><?php echo $area; ?></label>
                                                                        </div>
                                                                    <?php }

                                                                    ?>

                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                            </form>
                                                            <!-- /form -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->

                                                </div>
                                                <!-- /grid column -->

                                            </div>
                                            <!-- /grid row -->
                                        </div>
                                        <!-- /.page-section -->
                                    </div>
                                    <!-- /.page-inner -->
                                </div>
                                <!-- /.page -->
                            </div>

                            <!-- /.wrapper -->
                        </main>
                        <!-- /.app-main -->

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

    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-load-image/js/load-image.all.min.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-canvas-to-blob/js/canvas-to-blob.min.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/jquery.fileupload.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
    <script src="https://uselooper.com/assets/vendor/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>

</body>

</html>