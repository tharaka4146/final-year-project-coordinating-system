<?php

include 'config.php';

$kduEmail = $_GET["kduEmail"];

$sql = "SELECT * FROM student WHERE kduEmail='" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $bio = $row['bio'];
        $heading = $row['heading'];
        $contactNo = $row['contactNo'];
        $kduEmail = $row['kduEmail'];
        $admissionNO = $row['admissionNO'];
        $current = $row['current'];
    }
} else {
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeSupervisor.php">
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
                <a class="nav-link" href="homeSupervisor.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
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

                    <div class="app">

                        <!-- .app-main -->
                        <main class="app-main">
                            <!-- .wrapper -->
                            <div class="wrapper">
                                <!-- .page -->
                                <div class="page" style="margin-top:-55px!important">
                                    <!-- .page-cover -->
                                    <!--<header class="page-cover" >-->
                                    <header class="page-cover" style="background: url(../img/background4.jpg);">
                                        <div class="text-center">

                                            <p style=" padding-bottom:20px;">

                                                <div class="user-avatar user-avatar-xl">
                                                    <a>
                                                        <img src="../img/profilepics/<?php echo "$kduEmail" ?>.jpg" alt="" style="transform: scale(2);">
                                                    </a>
                                                </div>
                                                <h2 class="h4 mt-2 mb-0" style=" padding-top:50px;">
                                                    <?php
                                                    if ($firstName != '' && $lastName != '') {
                                                        echo $firstName . ' ' . $lastName;
                                                    } else {
                                                        echo $_SESSION['uname'];
                                                    }
                                                    ?>
                                                </h2>
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
                                                                    <label for="input02" class="col-md-3">First name</label>
                                                                    <!-- /form column -->

                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $firstName; ?></label>
                                                                    </div>
                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input03" class="col-md-3">Last name</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $lastName; ?></label>
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
                                                                    <label for="input03" class="col-md-3">Admission number</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $admissionNO; ?></label>
                                                                    </div>
                                                                    <!-- /form column -->
                                                                </div>
                                                                <!-- /form row -->

                                                                <!-- form row -->
                                                                <div class="form-row">
                                                                    <!-- form column -->
                                                                    <label for="input03" class="col-md-3">No.of completed activities</label>
                                                                    <!-- /form column -->
                                                                    <!-- form column -->
                                                                    <div class="col-md-9 mb-3">
                                                                        <label class="col-md-12"><?php echo $current - 1; ?></label>
                                                                    </div>
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