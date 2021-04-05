<?php

include 'config.php';

$sql = "SELECT name FROM supervisors WHERE kduEmail='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
    }
} else {
    $name = $_SESSION['uname'];
}

//$formName = $_POST['formName'];
$formName = 'interim1';

$sql = "SELECT count(*) as countSend FROM $formName where review != 0";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countSend = $row['countSend'];
    } else {
    }
} else {
    echo 'error :/';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/viewSubmission.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interim 1 Submissions</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeCoordinator.php">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i>
                        <img style = "width:100%;" src="../img/logo 16.png" />
                    </i>
                </div>
                <div class="sidebar-brand-text mx-3">arc-hive<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="homeCoordinator.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Coordinator tasks
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="studentAccounts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Create login accounts</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewFormsCoordinator.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Manage forms</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="assign%20supervisors%20ver%203.0.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Assign supervisors</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="assignExaminersVer1.0.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Assign examiners</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="uploadSchedule.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Upload presentation details</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../test/calendar3/lecs.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View presentation calendar</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewMarkingAll.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presentation marking all</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Supervisor tasks
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="messagingSupervisorTemp.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Chat</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewSubmissionsWeeklyProgress.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Weekly progress</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Examiner tasks
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewFormsSupervisor.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Student submissions</span></a>
            </li>




            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewPresentation.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View presentation marking</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="timelineSupervisor.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Timeline</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewStudentProfiles.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Students Info</span></a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php

                        $sql = "SELECT name FROM supervisors WHERE kduEmail='" . $_SESSION['uname'] . "' and name != ''";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                            }
                        } else {
                            $name = $_SESSION['uname'];
                        }

                        ?>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                                <img class="img-profile rounded-circle" src="../img/profilepics/<?php echo "$name" ?>.jpg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="lecsProfileInfo.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="lecsProfileSecurity.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Interim 1 Submissions</h1>

                    <div class="row">

                        <?php

                        $sql = "SELECT * FROM deadlines where form = '$formName'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $deadLine = $row['deadLine'];
                            }
                        } else {
                            echo 'error :/2';
                        }

                        for ($i = 0; $i < $countSend; ++$i) {

                            $i1 = $i + 1;

                            $sql = "SELECT norm.kduEmail as kduEmail, norm.admissionNo as admissionNo, norm.firstName as firstName, norm.lastName as lastName, norm.projectTitle as projectTitle, $formName.dateTime as dateTime, $formName.review as review  FROM $formName inner join norm on $formName.kduEmail = norm.kduEmail where $formName.review != 0 order by $formName.indexNo desc limit $i1 OFFSET $i ";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    $kduEmail = $row['kduEmail'];
                                    $admissionNo = $row['admissionNo'];
                                    $firstName = $row['firstName'];
                                    $lastName = $row['lastName'];
                                    $projectTitle = $row['projectTitle'];
                                    $dateTime = $row['dateTime'];
                                    //$deadLine = $row['deadLine'];
                                    $review = $row['review'];

                                    $s = strtotime($row['dateTime']);

                                    $date = date('d M Y', $s);
                                    $time = date('h:i A', $s);

                                    if ($review == '1') {
                                        $reviewed = 'Reviewed';
                                        $color = '#5679A6';
                                    } else {
                                        $reviewed = 'Not reviewed';
                                        $color = '#5C73F2';
                                    }

                                    if ($deadLine < $dateTime) {
                                        $late = 'Late Submission';
                                    } else {
                                        $late = '';
                                    }
                                } else {
                                }
                            } else {
                                echo 'error :/1';
                            } ?>

                            <div class="col-lg-3 pr-lg-2">
                                <div class="card mb-3" style=" background-color:<?php echo $color; ?>;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hoverbox rounded-soft text-center">
                                                <img class="img-fluid" src="../img/profilePics/10s.png" alt="" style="position: relative; text-align: center; filter: blur(0px);">
                                                <div style=" position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); color:white;" class="centered"><?php echo $admissionNo; ?></div>
                                                <div style=" position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%); color:white;" class="centered"><?php echo $reviewed; ?></div>
                                                <div style=" position: absolute; top: 65%; left: 50%; transform: translate(-50%, -50%); color:#8C030E;" class="centered"><i><?php echo $late; ?></i></div>
                                                <div class="hoverbox-content bg-dark p-5 align-items-center" style="text-align: center;">

                                                    <div style="margin: auto;">
                                                        <h5 class="leasd text-white">
                                                            <?php echo "$firstName" . ' ' . "$lastName"; ?></h5>
                                                        <br>
                                                        <h6 class="leasd text-white"><?php echo $projectTitle; ?></h6>
                                                        <br>
                                                        <h6 class="leasd text-white" style="font-size:15px">
                                                            <?php echo $date; ?></h6>
                                                        <h6 class="leasd text-white" style="font-size:15px">
                                                            <?php echo $time; ?></h6>
                                                        <form method="POST">
                                                            <input type="text" value="<?php echo $kduEmail; ?>" name="kduEmail" id="kduEmail" hidden>
                                                            <a class="btn btn-primary btn-md mt-1" href="viewInterim1.php?filename=<?php echo $kduEmail; ?>">View
                                                                submission</a>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <?php
                        }

                        ?>

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