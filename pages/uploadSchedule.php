<?php

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

include '../databases/upload.php';
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload Presentation Schedule</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Upload Presentation Schedule</h1>

                    <!--<h6 class="h5 mb-4 text-gray-800">Download the sample file from <a href="../file store/test1.xlsx" download>here</a></h6>-->

                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center">
                            <form method='post' action='export.php'>
                                <h6 class="h5 mb-4 text-gray-800">Download the sample file from here <input type='submit' name='export' class='btn btn-primary btn-sm' value='Export' /></h6>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <form method='post' action='exportLecs.php'>
                                <h6 class="h5 mb-4 text-gray-800">Download the lecturer names from here <input type='submit' name='export' class='btn btn-primary btn-sm' value='Export' /></h6>
                            </form>
                        </div>
                    </div>

                    <center>


                        <div class="row">

                            <div class="col-md-12">

                                <form method='post' action='file-upload.php' enctype='multipart/form-data' class="box">


                                    <div class="box__input">
                                        <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43">
                                            <path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z" />
                                        </svg>

                                        <input type='file' name='uploadfile' class='form-control' hidden>

                                        <br>

                                        <label for="file">
                                            <span class="box__dragndrop">Drag and drop here</span>
                                        </label>

                                        <br>
                                        <br>

                                        <input type='submit' name='submit' class='btn btn-primary'>

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
                    <form method='post' action="">
                        <input class="btn btn-primary" type="submit" value="Logout" name="but_logout">
                    </form>
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