<?php
include 'config.php';

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: login.php');
}

$sql = "DELETE from student where kduEmail is null";
$result = $con->query($sql);

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

$sql = "SELECT * FROM supervisors WHERE kduEmail='" . $_SESSION['uname'] . "'";
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

$conn->close();

// echo 'ok';
}
 */
}


$sql = "SELECT max(current) as current FROM student";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $current = (int)$row["current"] - 1;

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

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Supervisor Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeSupervisor.php">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i>
                        <img style="width:100%;" src="../img/logo 16.png" />
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
                <a class="nav-link" href="chatSupervisor.php">
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
                    <span>View marking</span></a>
            </li>

            <li class="nav-item" <?php echo $hidden ?>>
                <a class="nav-link" href="../test/calendar3/student.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presentation calendar</span></a>
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

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout

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
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php

                        $sql = "SELECT count(*) as countStudents FROM student";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $countStudents = $row['countStudents'];
                            }
                        }

                        ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total no.of student accounts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countStudents ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        $sql = "SELECT max(current) as maxCurrent FROM student";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $maxCurrent = $row['maxCurrent'];
                            }
                        }

                        $formName2 = "";

                        switch ($maxCurrent) {
                            case 1:
                                $formName2 = "Norm Form";
                                break;

                            case 2:
                                $formName2 = "Project Proposal";
                                break;


                            case 3:
                                $formName2 = "Research Project";
                                break;

                            case 4:
                                $formName2 = "Interim 1";
                                break;

                            case 5:
                                $formName2 = "Interim 2";
                                break;

                            case 6:
                                $formName2 = "Publish research";
                                break;

                            case 7:
                                $formName2 = "Draft thesis";
                                break;

                            case 8:
                                $formName2 = "Final thesis";

                            case 9:
                                $formName2 = "Completed";
                        }

                        ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current activity</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $formName2 ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Overall completed Completion
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $current2 ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $current2 ?>%" aria-valuemin="0" aria-valuemax="100"></div>
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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date
                                            </div>
                                            <?php
                                            date_default_timezone_set('Asia/Colombo');
                                            $date = date('d  F  Y');
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $date ?></div>
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

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Submissions Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 1-->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overall project progress</h6>
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

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
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

                                                $sql = "SELECT count(form) as count from deadLines";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    if ($row = $result->fetch_assoc()) {
                                                        $count = $row['count'];
                                                    }
                                                }


                                                ?>

                                                <div>
                                                    <?php for ($i = 0; $i < $count; $i++) {

                                                        $i1 = $i + 1;

                                                        $sql = "SELECT * from deadLines order by indexNo limit $i1 OFFSET $i ";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            if ($row = $result->fetch_assoc()) {
                                                                $details = $row['Details'];
                                                                $date = $row['deadLine'];
                                                            }
                                                        }

                                                        $dt = new DateTime($date);
                                                        $date = $dt->format('d / M :');
                                                        $time = $dt->format('H:i:s');

                                                    ?>

                                                        <ul>
                                                            <li>
                                                                <h6><?php echo $date ?> <?php echo $details ?></h6>
                                                            </li>
                                                        </ul>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        $.get("server/adapter.php", function(data) {
                                            disabledDates = data.split(',');
                                            $('#datetimepicker2').datepicker({
                                                format: 'yyyy-mm-dd',
                                                datesDisabled: disabledDates,
                                            });
                                        });
                                    </script>


                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

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
                                                WHERE user_id = '" . $_SESSION["user_id"] . "' 
                                                ORDER BY task_list_id DESC
                                                ";

                                        $statement = $connect->prepare($query);

                                        $statement->execute();

                                        $result = $statement->fetchAll();

                                        foreach ($result as $row) {

                                            $style = '';

                                            if ($row["task_status"] == 'yes') {
                                                $style = 'text-decoration: line-through';
                                            }

                                            echo '<br><a href="#" style="' . $style . '" class="list-group-flush" id="list-group-flush' . $row["task_list_id"] . '" data-id="' . $row["task_list_id"] . '">' . $row["task_details"] . ' <span class="badge float-left" data-id="' . $row["task_list_id"] . '"><input type = "checkbox"></span></a>';
                                        }
                                        ?>

                                    </div>

                                    <br />

                                    <form method="post" id="to_do_form">
                                        <hr style="padding:-10px;">

                                        <div class="input-group">

                                            <input type="text" style="border-color: transparent!important;" name="task_name" id="task_name" class="form-control input-lg no-outline" autocomplete="off" placeholder="Create a task" />&nbsp;

                                            <div class="input-group-btn">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Add</button>
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

    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <?php

    //norm start
    $sql = 'SELECT count(*) as countNorm FROM norm WHERE send = 1';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $countNorm = $row['countNorm'];
        }
    }
    //norm end

    //project proposal start
    $sql = 'SELECT count(*) as countProjectProposal FROM projectProposal';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $countProjectProposal = $row['countProjectProposal'];
        }
    }
    //project proposal end

    //start
    $sql = 'SELECT count(*) as countResearch FROM research';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $countResearch = $row['countResearch'];
        }
    }
    //end

    //start
    $sql = 'SELECT count(*) as interim1Count FROM interim1';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $interim1Count = $row['interim1Count'];
        }
    }
    //end

    //start
    $sql = 'SELECT count(*) as interim2Count FROM interim2';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $interim2Count = $row['interim2Count'];
        }
    }
    //end

    //start
    $sql = 'SELECT count(*) as researchWorkCount FROM researchWork';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $researchWorkCount = $row['researchWorkCount'];
        }
    }
    //end

    //start
    $sql = 'SELECT count(*) as thesisCount FROM thesis';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $thesisCount = $row['thesisCount'];
        }
    }
    //end

    //start
    $sql = 'SELECT count(*) as countFinalThesis FROM thesisSubmissionFinal';
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $countFinalThesis = $row['countFinalThesis'];
        }
    }
    //end

    ?>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Norm", "Project Poposal", "Research Project", "Interim 1", "Interim 2", "Publish Research", "Draft thesis", "Final thesis"],
                datasets: [{
                    label: "No.of submited students",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php echo $countNorm ?>, <?php echo $countProjectProposal ?>, <?php echo $countResearch ?>, <?php echo $interim1Count ?>, <?php echo $interim2Count ?>, <?php echo $researchWorkCount ?>, <?php echo $thesisCount ?>, <?php echo $countFinalThesis ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");

        var myPieChart = new Chart(ctx, {

            type: 'doughnut',
            data: {
                labels: ["Progress", "Progress due"],
                datasets: [{
                    data: [<?php echo $current2 ?>, 100 - <?php echo $current2 ?>],
                    backgroundColor: ['#4e73df'],
                    hoverBackgroundColor: ['#2e59d9'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },

        });


        // Pie Chart Example
        var ctx = document.getElementById("myPieChart2");

        var myPieChart = new Chart(ctx, {

            type: 'doughnut',
            data: {
                labels: ["Dxxxxxxxxxxxxxxxirect", "Referddxxxxxxxxxxxxxxxssssssdral", "Sodxxxxxxxxxxxxxddcial"],
                datasets: [{
                    data: [10, 50, 10, 30],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },

        });

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart3");

        var myPieChart = new Chart(ctx, {

            type: 'doughnut',
            data: {
                labels: ["Direct", "Referral", "Social"],
                datasets: [{
                    data: [5, 10, 3, 82],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },

        });
    </script>

</body>

</html>


<script>
    $(document).ready(function() {

        $(document).on('submit', '#to_do_form', function(event) {
            event.preventDefault();

            if ($('#task_name').val() == '') {
                return false;
            } else {
                $('#submit').attr('disabled', 'disabled');
                $.ajax({
                    url: "add_task.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#submit').attr('disabled', false);
                        $('#to_do_form')[0].reset();
                        $('.list-group').prepend(data);
                    }
                })
            }
        });

        $(document).on('click', '.list-group-flush', function() {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "update_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function(data) {
                    $('#list-group-flush' + task_list_id).css('text-decoration',
                        'line-through');
                }
            })
        });

        $(document).on('click', '.badge', function() {
            var task_list_id = $(this).data('id');
            $.ajax({
                url: "delete_task.php",
                method: "POST",
                data: {
                    task_list_id: task_list_id
                },
                success: function(data) {
                    $('#list-group-flush' + task_list_id).fadeOut('slow');
                }
            })
        });

    });
</script>