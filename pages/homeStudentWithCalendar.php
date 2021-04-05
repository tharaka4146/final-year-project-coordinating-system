<?php

include 'config.php';

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: homeStudent.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

$sql = "SELECT * FROM student WHERE kduEmail='".$_SESSION['uname']."'";
$result = $con->query($sql);

if ($result->num_rows > 0) {


    /*
if ($row = $result->fetch_assoc()) {

$sql = "UPDATE norm SET firstName = '$firstName', lastName = '$lastName', email = '$email', contactNo = '$contactNo', projectTitle = '$projectTitle', problem = '$problem', solution = '$solution', technologies = '$technologies', area = '$area', supervisor1 = '$supervisor1', supervisor2 = '$supervisor2', supervisor3 = '$supervisor3', dateTime = '$dateTime', save = '$save', send = '$send' WHERE indexNo=$indexNo";

if ($conn->query($sql) === true) {
//echo 'Record updated successfully';
} else {
echo 'Error updating record: ' . $conn->error;
}


// echo 'ok';
}
$conn->close();
 */
} else {
    $bio = 'Undergraduate @KDU';
    $heading = 'This is the profile heading anyone viewing your account can see this';
    $current = 1;

    $stmt = $con->prepare('INSERT INTO student  (kduEmail, bio, heading, current) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $_SESSION['uname'], $bio, $heading, $current);

    if ($stmt->execute()) {
        //echo'ok';
    } else {
        echo 'no';
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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/timeline.css" rel="stylesheet">

    <style>
        a {
            color: #8a8a8a;
        }

        a:hover {
            text-decoration: none;
            color: #4a4a4a;
        }
    </style>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="datepicker/css/custom.css">
    <script src="datepicker/js/bootstrap-datepicker.min.js"></script>

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
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="viewForms.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Submissions</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Weekly progress</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Timeline</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Chat</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grades</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Guidlines</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.
                                        </div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <?php

                        $sql = "SELECT firstName, current FROM student WHERE kduEmail='".$_SESSION['uname']."' and firstName != ''";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $name = $row['firstName'];
                                $current = $row['current'];

                            }
                        } else {
                            $name = $_SESSION['uname'];
                        }

                        ?>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                                <img class="img-profile rounded-circle" src="../img/profilePics/10.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

                                    <form method='post' action="">
                                        <input type="submit" value="Logout" name="but_logout">
                                    </form>

                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Time
                                                spend (online)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2.4 hours</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Overall
                                                completed Completion
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">03 / 20 / 2020</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Pie Chart 1-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Current activity progress</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Progress
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 2-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overall project pogress</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Submissions
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Weekly progress
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Presentations
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 2-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Current grades</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart3"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Submissions
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Weekly progress
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Presentations
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php
                    
                    if($current == 1){
                        $previous = "Activated your account";
                        $currents = "Norm form Submission";
                        $next = "Project Proposal Submission";
                    } else if($current == 2){
                        $previous = "Norm form Submission";
                        $currents = "Project Proposal Submission";
                        $next = "Apply for the research project";
                    }  else if($current == 3){
                        $previous = "Project Proposal Submission";
                        $currents = "Apply for the research project";
                        $next = "Interim Report 1";
                    }  else if($current == 4){
                        $previous = "Apply for the research project";
                        $currents = "Interim Report 1";
                        $next = "Interim Report 2";
                    }  else if($current == 5){
                        $previous = "Interim Report 1";
                        $currents = "Interim Report 2";
                        $next = "Publish Research";
                    }  else if($current == 6){
                        $previous = "Interim Report 2";
                        $currents = "Publish Research";
                        $next = "Draft thesis submission";
                    }  else if($current == 7){
                        $previous = "Publish Research";
                        $currents = "Draft thesis submission";
                        $next = "Final Thesis submission";
                    }  else if($current == 8){
                        $previous = "Draft thesis submission";
                        $currents = "Final Thesis submission";
                        $next = "-";
                    }  else if($current == 9){
                        $previous = "prev";
                        $currents = "prev";
                        $next = "prev";
                    }  else if($current == 10){
                        $previous = "prev";
                        $currents = "prev";
                        $next = "prev";
                    } else {
                        $previous = "-";
                        $currents = "-";
                        $next = "-";
                    }

                    ?>
                        <div class="col-lg-6 mb-4"">

                            <div class=" card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Recent Activities</h6>
                            </div>

                            <br>

                            <div class="card-body" style="margin-top:-60px; margin-bottom:-60px; font-size:smaller;">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12 offset-md-0">
                                            <ul class="timeline">

                                                <li>
                                                    <p style="opacity:0.6">Previous activity</p>
                                                    <h5 style="opacity:0.6; font-size:19px;"><?php echo $previous ?></h5>
                                                    <br>
                                                </li>

                                                <li>
                                                    <p>Current activity</p>
                                                    <h5 style="font-size:19px;"><?php echo $currents ?></h5>
                                                    <br>

                                                </li>

                                                <li>
                                                    <p style="opacity:0.6">Next activity</p>
                                                    <h5 style="opacity:0.6; font-size:19px;"><?php echo $next ?></h5>
                                                    <br>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>

                    <div class="col-lg-6 mb-4">

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Deadline Calendar</h6>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="datetimepicker2"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php

                                                $sql = "SELECT count(details) as count from calendar";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    if ($row = $result->fetch_assoc()) {
                                                        $count = $row['count'];
                                                    }
                                                }


                                                ?>

                                            <div>
                                                <?php for($i = 0; $i < $count; $i++){

                                                    $i1 = $i +1;

                                                    $sql = "SELECT * from calendar  order by date limit $i1 OFFSET $i ";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        if ($row = $result->fetch_assoc()) {
                                                            $details = $row['details'];
                                                            $date = $row['date'];
                                                        }
                                                    }

                                                    $dt = new DateTime($date);
                                                    $date = $dt->format('d / M :');
                                                    $time = $dt->format('H:i:s');

                                                    ?>

                                                <h6><?php echo $date ?> <?php echo $details ?></h6>
                                                <?php 
    }
?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $.get("server/adapter.php", function (data) {
                                        disabledDates = data.split(',');
                                        $('#datetimepicker2').datepicker({
                                            format: 'yyyy-mm-dd',
                                            datesDisabled: disabledDates,
                                        });
                                    });
                                </script>


                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Todo lists</h6>
                            </div>

                            <div class="card-footer" style="background-color:white;">

                                <div class="list-group">


                                    <?php

                                                include('database_connection.php');

                                                $query = "
                                                SELECT * FROM task_list
                                                WHERE user_id = '".$_SESSION["user_id"]."' 
                                                ORDER BY task_list_id DESC
                                                ";

                                                $statement = $connect->prepare($query);

                                                $statement->execute();

                                                $result = $statement->fetchAll();

                                                foreach($result as $row) {
                                                    
                                                    $style = '';
                                                    
                                                    if($row["task_status"] == 'yes') {
                                                        $style = 'text-decoration: line-through';
                                                    }
                                                    
                                                    echo '<br><a href="#" style="'.$style.'" class="list-group-flush" id="list-group-flush'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge float-left" data-id="'.$row["task_list_id"].'"><input type = "checkbox"></span></a>';
                                                }
                                            ?>

                                </div>

                                <br />

                                <form method="post" id="to_do_form">
                                    <hr style="padding:-10px;">

                                    <div class="input-group">

                                        <input type="text" style="border-color: transparent!important;" name="task_name"
                                            id="task_name" class="form-control input-lg no-outline" autocomplete="off"
                                            placeholder="Create a task" />&nbsp;

                                        <div class="input-group-btn">
                                            <button type="submit" name="submit" id="submit"
                                                class="btn btn-primary btn-sm"><span
                                                    class="glyphicon glyphicon-plus"></span>Add</button>
                                        </div>

                                    </div>

                                </form>

                            </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>

<script>
    $(document).ready(function () {

        $(document).on('submit', '#to_do_form', function (event) {
            event.preventDefault();

            if ($('#task_name').val() == '') {
                return false;
            } else {
                $('#submit').attr('disabled', 'disabled');
                $.ajax({
                    url: "add_task.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (data) {
                        $('#submit').attr('disabled', false);
                        $('#to_do_form')[0].reset();
                        $('.list-group').prepend(data);
                    }
                })
            }
        });

        $(document).on('click', '.list-group-flush', function () {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "update_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function (data) {
                    $('#list-group-flush' + task_list_id).css('text-decoration',
                        'line-through');
                }
            })
        });

        $(document).on('click', '.badge', function () {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "delete_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function (data) {
                    $('#list-group-flush' + task_list_id).fadeOut('slow');
                }
            })
        });

    });
</script>