<?php

include 'config.php';

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

$sql = 'SELECT count(*) as countStudent FROM student';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countStudent = $row['countStudent'];
    }
}


//norm start
$sql = 'SELECT count(*) as countNorm FROM norm WHERE send = 1';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countNorm = $row['countNorm'];
    }
}
$normPercentage = ($countNorm / $countStudent) * 100;
$normPercentage2 = ceil($normPercentage / 1) * 1;
//norm end

//project proposal start
$sql = 'SELECT count(*) as countProjectProposal FROM projectProposal';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countProjectProposal = $row['countProjectProposal'];
    }
}
$ProjectProposalPercentage = ($countProjectProposal / $countStudent) * 100;
$ProjectProposalPercentage2 = ceil($ProjectProposalPercentage / 1) * 1;
//project proposal end

//start
$sql = 'SELECT count(*) as countResearch FROM research';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countResearch = (int)$row['countResearch'] - 1;
    }
}
$researchPercentage = ($countResearch / $countStudent) * 100;
$researchPercentage2 = ceil($researchPercentage / 1) * 1;
//end

//start
$sql = 'SELECT count(*) as interim1Count FROM interim1';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $interim1Count = $row['interim1Count'];
    }
}
$interim1Percentage = ($interim1Count / $countStudent) * 100;
$interim1Percentage2 = ceil($interim1Percentage / 1) * 1;
//end

//start
$sql = 'SELECT count(*) as interim2Count FROM interim2';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $interim2Count = $row['interim2Count'];
    }
}
$interim2Percentage = ($interim2Count / $countStudent) * 100;
$interim2Percentage2 = ceil($interim2Percentage / 1) * 1;
//end

//start
$sql = 'SELECT count(*) as researchWorkCount FROM researchWork';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $researchWorkCount = $row['researchWorkCount'];
    }
}
$researchWorkPercentage = ($researchWorkCount / $countStudent) * 100;
$researchWorkPercentage2 = ceil($researchWorkPercentage / 1) * 1;
//end

//start
$sql = 'SELECT count(*) as thesisCount FROM thesis';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $thesisCount = (int)$row['thesisCount'] - 1;
    }
}
$thesisPercentage = ($thesisCount / $countStudent) * 100;
$thesisPercentage2 = ceil($thesisPercentage / 1) * 1;
//end

//start
$sql = 'SELECT count(*) as countFinalThesis FROM thesisSubmissionFinal';
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $countFinalThesis = $row['countFinalThesis'];
    }
}
$thesisSubmissionFinalPercentage = ($countFinalThesis / $countStudent) * 100;
$thesisSubmissionFinalPercentage2 = ceil($thesisSubmissionFinalPercentage / 1) * 1;
//end


/*check*/
$sql = "SELECT max(current) as current FROM student";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $current = $row['current'];

        $oneColor = 'pricing-table';
        $oneButton = '';

        $twoColor = 'pricing-table';
        $twoButton = '';

        $threeColor = 'pricing-table';
        $threeButton = '';

        $fourColor = 'pricing-table';
        $fourButton = '';

        $fiveColor = 'pricing-table';
        $fiveButton = '';

        $sixColor = 'pricing-table';
        $sixButton = '';

        $sevenColor = 'pricing-table';
        $sevenButton = '';

        $eightColor = 'pricing-table';
        $eightButton = '';

        //$oneDisable = 'disabled';
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
            $eightButton = 'btn-outline';
            $sevenButton = '';
        } else {
            $oneColor = 'pricing-table-color';
            $oneButton = 'btn-outline';
            $twoColor = 'pricing-table-color';
            $twoButton = 'btn-outline';
            $oneButton = '';
            $threeColor = 'pricing-table-color';
            $threeButton = 'btn-outline';
            $twoButton = '';
            $fourColor = 'pricing-table-color';
            $fourButton = 'btn-outline';
            $threeButton = '';
            $fiveColor = 'pricing-table-color';
            $fiveButton = 'btn-outline';
            $fourButton = '';
            $sixColor = 'pricing-table-color';
            $sixButton = 'btn-outline';
            $fiveButton = '';
            $sevenColor = 'pricing-table-color';
            $sevenButton = 'btn-outline';
            $sixButton = '';
            $eightColor = 'pricing-table-color';
            $eightButton = 'btn-outline';
            $sevenButton = '';
        }
    }
} else {
    echo 'error :/';
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel='stylesheet' href='../css/viewForms.css' type='text/css' />

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Manage Forms</title>

    <!-- Custom fonts for this template-->
    <link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href='../css/sb-admin-2.min.css' rel='stylesheet'>
    <link href='../css/deadLine.css' rel='stylesheet'>

</head>

<body id='page-top'>

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
                <div class='main-content container-fluid'>

                    <center>
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">

                                <div class="modal-header"></div>

                                <div class="modal-body">

                                    <br>

                                    <p>Enter deadline</p>

                                    <form method="POST">

                                        <div class="form-group">
                                            <select class="form-control col-lg-8" id="exampleFormControlSelect1" name="formName">
                                                <option>Select form</option>
                                                <option value="norm">Norm form</option>
                                                <option value="projectproposal">Project proposal</option>
                                                <option value="research">Research application</option>
                                                <option value="interim1">Interim report 1</option>
                                                <option value="interim2">Interim report 2</option>
                                                <option value="researchWork">Publish research work</option>
                                                <option value="thesisSubmission">Draft Thesis Submission</option>
                                                <option value="thesisSubmissionfinal">Fianl Thesis Submissionfinal</option>
                                            </select>
                                        </div>

                                        <input class="form-control col-lg-6" type="datetime-local" id="deadLine" name="deadLine">

                                        <br>

                                        <button onclick="notification()" type='submit' formaction='../databases/deadLine.php' class='btn btn-primary' id='save'>Submit</button>

                                        <script>
                                            function notification() {
                                                alert('Deadline updated')
                                            }
                                        </script>

                                    </form>
                                    <br>
                                </div>
                            </div>

                        </div>
                    </center>

                    <a class="btn btn-primary" id="myBtn" href='#' style="width:100%">
                        Set deadlines
                    </a>

                    <div class='row pricing-tables'>

                        <div class='col-lg-4'>

                            <div class="pricing-table <?php echo $oneColor; ?> pricing-table-primary">
                                <div class='pricing-table-image'><svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='85' height='70' viewbox='0 35 430 360' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 35 430 360'>
                                    </svg></div>
                                <div class='pricing-table-title'>
                                    <h4>Norm Form</h4>
                                </div>

                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style="width: <?php echo $normPercentage; ?>%;" aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'> <?php echo $normPercentage2; ?>%
                                        </div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>

                                <div class='pricing-table-price'><span class='value'>1 </span><span class='currency'>st</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Fill the online form and submit</li>
                                    <li>or you can save for further editing</li>
                                    <li>Submit when finished</li>
                                </ul>

                                <a class="btn btn-primary" <?php echo $oneButton; ?> href='viewSubmissions.php' <?php echo $oneButton; ?>>
                                    Review
                                </a>

                            </div>

                        </div>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $twoColor; ?> pricing-table-warning">

                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='85' height='70' viewbox='0 35 430 360' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 35 430 360'>
                                    </svg>
                                </div>

                                <div class='pricing-table-title'>
                                    <h4>Project Proposal</h4>
                                </div>

                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width:<?php echo $ProjectProposalPercentage; ?>%; background-color:#CC8714;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $ProjectProposalPercentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>2 </span><span class='currency'>nd</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                    <li></li>

                                </ul><a class="btn btn-warning <?php echo $twoButton; ?>" href='viewSubmissionsProjectProposalCoordinator.php' <?php echo $twoButton;
                                                                                                                                                ?>>Review</a>
                            </div>
                        </div>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $threeColor; ?> pricing-table-success">
                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='120' height='70' viewbox='0 90 460 280' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 90 460 280'>
                                    </svg>
                                </div>
                                <div class='pricing-table-title'>
                                    <h4>Apply for The Research Project</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $researchPercentage; ?>%; background-color:#347317;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $researchPercentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>

                                <div class='pricing-table-price'><span class='value'>3 </span><span class='currency'>rd</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Fill the online form and submit</li>
                                    <li>or you can save for further edit</li>
                                    <li>submit when completed</li>
                                </ul><a class="btn btn-success <?php echo $threeButton; ?>" href='viewSubmissionsResearchCoordinator.php' <?php echo $threeButton;
                                                                                                                                            ?>>Review</a>
                            </div>
                        </div>

                    </div>

                    <div class='row pricing-tables'>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $fourColor; ?> pricing-table-danger">
                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='78' height='70' viewbox='0 15 473 440' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 15 473 440'>
                                    </svg>
                                </div>
                                <div class='pricing-table-title'>
                                    <h4>Interim Report 1</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $interim1Percentage; ?>%; background-color:#A60522;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $interim1Percentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>4 </span><span class='currency'>th</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-danger <?php echo $fourButton; ?>" href='viewSubmissionsInterim1Coordinator.php' <?php echo $fourButton;
                                                                                                                                        ?>>Review</a>
                            </div>
                        </div>

                        <div class='col-lg-4'>

                            <div class="pricing-table <?php echo $fiveColor; ?> pricing-table-primary">
                                <div class='pricing-table-image'><svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='85' height='70' viewbox='0 35 430 360' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 35 430 360'>
                                    </svg></div>
                                <div class='pricing-table-title'>
                                    <h4>Interim Report 2</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $interim1Percentage; ?>%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $interim1Percentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>5 </span><span class='currency'>th</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-primary <?php echo $fiveButton; ?>" href='viewSubmissionsInterim2Coordinator.php' <?php echo $fiveButton;
                                                                                                                                            ?>>Review</a>
                            </div>

                        </div>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $sixColor; ?> pricing-table-warning">
                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='85' height='70' viewbox='0 35 430 360' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 35 430 360'>
                                    </svg>
                                </div>
                                <div class='pricing-table-title'>
                                    <h4>Published Research Work</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $researchWorkPercentage; ?>%; background-color:#CC8714;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $researchWorkPercentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>6 </span><span class='currency'>th</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-warning <?php echo $sixButton; ?>" href='viewSubmissionsResearchWorkCoordinator.php' <?php echo $sixButton;
                                                                                                                                            ?>>Review</a>
                            </div>
                        </div>

                    </div>

                    <div class='row pricing-tables'>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $sevenColor; ?> pricing-table-success">
                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='120' height='70' viewbox='0 90 460 280' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 90 460 280'>
                                    </svg>
                                </div>
                                <div class='pricing-table-title'>
                                    <h4>Draft thesis submission</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $thesisPercentage; ?>%;  background-color:#347317;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $thesisPercentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>7 </span><span class='currency'>th</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-success <?php echo $sevenButton; ?>" href='viewSubmissionsThesisCoordinator.php' <?php echo $sevenColor;
                                                                                                                                        ?>>Review</a>
                            </div>
                        </div>

                        <div class='col-lg-4'>
                            <div class="pricing-table <?php echo $eightColor; ?> pricing-table-danger">
                                <div class='pricing-table-image'>
                                    <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='78' height='70' viewbox='0 15 473 440' xmlns:xlink='http://-www.w3.org/1999/xlink' enable-background='new 0 15 473 440'>
                                    </svg>
                                </div>
                                <div class='pricing-table-title'>
                                    <h4>Final Thesis submission</h4>
                                </div>
                                <div class='card-disvider card-divider-xl'></div>

                                <center>
                                    <div class='progress' style='width:80%;'>
                                        <div class='progress-bar' role='progressbar' style='width: <?php echo $thesisSubmissionFinalPercentage; ?>%; background-color:#A60522;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'><?php echo $thesisSubmissionFinalPercentage2; ?>%</div>
                                    </div>
                                </center>

                                <div class='card-divider card-divider-xl'></div>
                                <div class='pricing-table-price'><span class='value'>8 </span><span class='currency'>th</span><span class='frecuency'> out of 8</span></div>
                                <ul class='pricing-table-features'>
                                    <li>Sumbit your file</li>
                                    <li>Once uploaded you cannot change it</li>
                                    <li>Complete before deadline</li>
                                </ul><a class="btn btn-danger <?php echo $eightButton; ?>" href='viewSubmissionsThesisFinalCoordinator.php' <?php echo $eightButton;
                                                                                                                                            ?>>Review</a>
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
    <script src='../vendor/jquery/jquery.min.js'></script>
    <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

    <!-- Core plugin JavaScript-->
    <script src='../vendor/jquery-easing/jquery.easing.min.js'></script>

    <!-- Custom scripts for all pages-->
    <script src='../js/sb-admin-2.min.js'></script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>