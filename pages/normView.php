<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fypcs';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    //echo 'Connected successfully';
    //echo '<br>';
}

session_start();

$kduEmail = $_GET['kduEmail'];

//name at the top
$sql = "SELECT name FROM supervisors WHERE kduEmail='" . $_SESSION['uname'] . "' and name != ''";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
    }
} else {
    $name = $_SESSION['uname'];
}

?>

<?php
//$indexNo = '1000';

$sql = "SELECT * FROM norm WHERE kduEmail ='" . $_GET['kduEmail'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $send = $row['send'];
        //echo 'ok';
    }
} else {
    $sql = 'SELECT * FROM norm WHERE indexNo = 1';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $send = '0';
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

    <title>Norm form</title>

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
                document.getElementById('contactNo').disabled = true;
                document.getElementById('projectTitle').disabled = true;
                document.getElementById('problem').disabled = true;
                document.getElementById('solution').disabled = true;
                document.getElementById('technologies').disabled = true;
                document.getElementById('area').disabled = true;
                document.getElementById('supervisor1').disabled = true;
                document.getElementById('supervisor2').disabled = true;
                document.getElementById('supervisor3').disabled = true;
            } else {

            }
        }
    </script>

</head>

<body id='page-top' onload='enable()' class="toggle-loading">

    <!-- Page Wrapper -->
    <div id='wrapper'>

      
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
                <div class='container-fluid'>

                    <!-- Page Heading -->
                    <h1 class='h3 mb-4 text-gray-800'>Norm Form</h1>




                    <div class='row'>

                        <div class='col-md-12'>

                            <div class='card card-border-color card-border-color-primary'>

                                <form method='POST'>

                                    <div class='card-header card-header-divider'>Student Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>First
                                                Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $row['firstName']; ?>" disabled>

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Last
                                                Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='lastName' name='lastName' type='text' value="<?php echo $row['lastName']; ?>" disabled>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>" disabled>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact
                                                Number</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='contactNo' name='contactNo' type='text' value="<?php echo $row['contactNo']; ?>" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Project Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Project
                                                Title</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='projectTitle' name='projectTitle' type='text' value="<?php echo $row['projectTitle']; ?>" disabled>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Problem in
                                                brief</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='problem' name='problem' rows='8' disabled><?php echo $row['problem'];
                                                                                                                                ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right' for='inputTextarea3'>Solution</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='solution' name='solution' rows='8' disabled><?php echo $row['solution'];
                                                                                                                                ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Technologies</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='technologies' name='technologies' rows='8' disabled><?php echo $row['technologies'];
                                                                                                                                        ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research project
                                                area</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='area' name='area' disabled>
                                                    <option selected><?php echo $row['area']; ?></option>
                                                    <option value='1'>Field 1</option>
                                                    <option value='2'>Field 2</option>
                                                    <option value='3'>Field 3</option>
                                                    <option value='4'>Field 4</option>
                                                    <option value='5'>Field 5</option>
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
                                                <select class='form-control' id='supervisor1' name='supervisor1' disabled>
                                                    <option selected><?php echo $row['supervisor1']; ?></option>
                                                    <option value='1'>Supervisor 1</option>
                                                    <option value='2'>Supervisor 2</option>
                                                    <option value='3'>Supervisor 3</option>
                                                    <option value='4'>Supervisor 4</option>
                                                    <option value='5'>Supervisor 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Supervisor
                                                2</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='supervisor2' name='supervisor2' disabled>
                                                    <option selected><?php echo $row['supervisor2']; ?></option>
                                                    <option value='1'>Supervisor 1</option>
                                                    <option value='2'>Supervisor 2</option>
                                                    <option value='3'>Supervisor 3</option>
                                                    <option value='4'>Supervisor 4</option>
                                                    <option value='5'>Supervisor 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row pt-1'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Supervisor
                                                3</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='supervisor3' name='supervisor3' disabled>
                                                    <option selected><?php echo $row['supervisor3']; ?></option>
                                                    <option value='1'>Supervisor 1</option>
                                                    <option value='2'>Supervisor 2</option>
                                                    <option value='3'>Supervisor 3</option>
                                                    <option value='4'>Supervisor 4</option>
                                                    <option value='5'>Supervisor 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Message from student</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='technologies' name='technologies' rows='4' disabled><?php echo $row['message'];
                                                                                                                                        ?></textarea>
                                            </div>
                                        </div>


                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Type a message
                                                here</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='message2' name='message2' rows='4'><?php echo $row['message2'];
                                                                                                                        ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <!--
<div class = 'card-header card-header-divider'>Supervisor Information</div>

<div class = 'card-body'>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputText3'>Input Text</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<input class = 'form-control' id = 'inputText3' type = 'text'>
</div>
</div>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputPassword3'>Input
Password</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<input class = 'form-control' id = 'inputPassword3' type = 'password'>
</div>
</div>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputPlaceholder3'>Placeholder
Input</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<input class = 'form-control' id = 'inputPlaceholder3' type = 'text' placeholder = 'Placeholder text'>
</div>
</div>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputDisabled3'>Disabled
Input</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<input class = 'form-control' id = 'inputDisabled3' type = 'text' disabled = 'disabled'
placeholder = 'Disabled input text'>
</div>
</div>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputReadonly3'>Readonly
Input</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<input class = 'form-control' id = 'inputReadonly3' type = 'text' readonly = 'readonly'
value = 'Readonly input text'>
</div>
</div>

<div class = 'form-group row'>
<label class = 'col-12 col-sm-3 col-form-label text-sm-right' for = 'inputTextarea3'>Textarea</label>
<div class = 'col-12 col-sm-8 col-lg-6'>
<textarea class = 'form-control' id = 'inputTextarea3'></textarea>
</div>
</div>

</div>
-->

                                    <center>

                                        <a href='#' class='btn btn-primary btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fas fa-flag'></i>-->
                                            </span>
                                            <br>
                                            <button type='submit' formaction='../databases/normApprove.php?kduEmail=<?php echo $kduEmail; ?>' class='btn btn-primary btn-icon-split text' id='save'>Approve and grant
                                                permission to continue the next activity</button>
                                        </a>

                                        <br>
                                        <br>

                                        <a href='#' class='btn btn-danger btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fa fa-check'></i>-->
                                            </span>
                                            <button type='submit' formaction='../databases/normDisapprove.php?kduEmail=<?php echo $kduEmail; ?>' class='btn btn-danger btn-icon-split text' id='send'>Disapprove and
                                                notify them to refill the norm form</button>
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