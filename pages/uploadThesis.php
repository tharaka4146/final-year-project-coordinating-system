<?php
session_start();

include '../databases/upload.php';

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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/upload.css" rel="stylesheet">

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
                    echo '<br>';
                }



                $sql = "SELECT * FROM thesisSubmission WHERE kduEmail ='" . $_SESSION['uname'] . "' and review != 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {

                        $disabled = "disabled";
                        $message = "You have already submitted";
                    }
                } else {
                    $message = "Drag and drop here";
                    $disabled = "";
                }

                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Upload thesis in pdf form</h1>

                    <center>


                        <div class="row">

                            <div class="col-md-12">

                                <form method='post' action='../databases/uploadThesisBackEnd.php' enctype='multipart/form-data' class="box">


                                    <div class="box__input">
                                        <svg class="box__icon" xmlns="http://www.w3s.org/2000/svg" width="50" height="43" viewBox="0 0 50 43">
                                            <path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z" />
                                        </svg>

                                        <input type='file' name='uploadfile' class='form-control' hidden>

                                        <br>

                                        <label for="file">
                                            <span class="box__dragndrop"><?php echo $message ?></span>
                                            <span></span>
                                        </label>

                                        <br>
                                        <br>


                                        <input type='submit' name='submit' class='btn btn-primary' <?php echo $disabled ?>>

                                    </div>


                                </form>

                            </div>

                        </div>

                    </center>



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

    <script type="de14ffdda943129a2552c747-text/javascript">
        'use strict';

        ;
        (function(document, window, index) {
            // feature detection for drag&drop upload
            var isAdvancedUpload = function() {
                var div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in
                    window && 'FileReader' in window;
            }();


            // applying the effect for every form
            var forms = document.querySelectorAll('.box');
            Array.prototype.forEach.call(forms, function(form) {
                var input = form.querySelector('input[type="file"]'),
                    label = form.querySelector('label'),
                    errorMsg = form.querySelector('.box__error span'),
                    restart = form.querySelectorAll('.box__restart'),
                    droppedFiles = false,
                    showFiles = function(files) {
                        label.textContent = files.length > 1 ? (input.getAttribute(
                                'data-multiple-caption') || '').replace('{count}', files.length) : files[0]
                            .name;
                    },
                    triggerFormSubmit = function() {
                        var event = document.createEvent('HTMLEvents');
                        event.initEvent('submit', true, false);
                        form.dispatchEvent(event);
                    };

                // letting the server side to know we are going to make an Ajax request
                var ajaxFlag = document.createElement('input');
                ajaxFlag.setAttribute('type', 'hidden');
                ajaxFlag.setAttribute('name', 'ajax');
                ajaxFlag.setAttribute('value', 1);
                form.appendChild(ajaxFlag);

                // automatically submit the form on file select
                input.addEventListener('change', function(e) {
                    showFiles(e.target.files);


                });

                // drag&drop files if the feature is available
                if (isAdvancedUpload) {
                    form.classList.add(
                        'has-advanced-upload'
                    ); // letting the CSS part to know drag&drop is supported by the browser

                    ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(
                        function(event) {
                            form.addEventListener(event, function(e) {
                                // preventing the unwanted behaviours
                                e.preventDefault();
                                e.stopPropagation();
                            });
                        });
                    ['dragover', 'dragenter'].forEach(function(event) {
                        form.addEventListener(event, function() {
                            form.classList.add('is-dragover');
                        });
                    });
                    ['dragleave', 'dragend', 'drop'].forEach(function(event) {
                        form.addEventListener(event, function() {
                            form.classList.remove('is-dragover');
                        });
                    });
                    form.addEventListener('drop', function(e) {
                        droppedFiles = e.dataTransfer.files; // the files that were dropped
                        showFiles(droppedFiles);

                    });
                }


                // if the form was submitted
                form.addEventListener('submit', function(e) {


                    // preventing the duplicate submissions if the current one is in progress
                    if (form.classList.contains('is-uploading')) return false;

                    form.classList.add('is-uploading');
                    form.classList.remove('is-error');

                    if (isAdvancedUpload) // ajax file upload for modern browsers
                    {
                        e.preventDefault();

                        // gathering the form data
                        var ajaxData = new FormData(form);
                        if (droppedFiles) {
                            Array.prototype.forEach.call(droppedFiles, function(file) {
                                ajaxData.append(input.getAttribute('name'), file);
                            });
                        }

                        // ajax request
                        var ajax = new XMLHttpRequest();
                        ajax.open(form.getAttribute('method'), form.getAttribute('action'), true);

                        ajax.onload = function() {
                            alert('File uploaded');
                            location.reload();
                            form.classList.remove('is-uploading');
                            if (ajax.status >= 200 && ajax.status < 400) {
                                var data = JSON.parse(ajax.responseText);
                                form.classList.add(data.success == true ? 'is-success' :
                                    'is-error');
                                if (!data.success) errorMsg.textContent = data.error;
                            } else alert('Error. Please, contact the webmaster!');
                        };

                        ajax.onerror = function() {
                            form.classList.remove('is-uploading');
                            alert('Error. Please, try again!');
                        };

                        ajax.send(ajaxData);
                    } else // fallback Ajax solution upload for older browsers
                    {
                        var iframeName = 'uploadiframe' + new Date().getTime(),
                            iframe = document.createElement('iframe');

                        $iframe = $('<iframe name="' + iframeName +
                            '" style="display: none;"></iframe>');

                        iframe.setAttribute('name', iframeName);
                        iframe.style.display = 'none';

                        document.body.appendChild(iframe);
                        form.setAttribute('target', iframeName);

                        iframe.addEventListener('load', function() {
                            var data = JSON.parse(iframe.contentDocument.body.innerHTML);
                            form.classList.remove('is-uploading')
                            form.classList.add(data.success == true ? 'is-success' :
                                'is-error')
                            form.removeAttribute('target');
                            if (!data.success) errorMsg.textContent = data.error;
                            iframe.parentNode.removeChild(iframe);
                        });
                    }

                    //window.location.replace("norm.php");


                });




                // Firefox focus bug fix for file input
                input.addEventListener('focus', function() {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function() {
                    input.classList.remove('has-focus');
                });

            });
        }(document, window, 0));
    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="de14ffdda943129a2552c747-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"5bb906b7e89b7f29","version":"2020.7.0","si":10}'></script>

</body>

</html>