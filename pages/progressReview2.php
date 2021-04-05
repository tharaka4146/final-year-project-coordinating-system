<?php

include 'config.php';

$kduEmail = $_GET['kduEmail'];
//$kduEmail = "tharaka4146@gmail.com";

//name at the top
$sql = "SELECT name, kduEmail as supervisorEmail FROM supervisors WHERE kduEmail='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $supervisorEmail = $row['supervisorEmail'];
    }
} else {
    $name = $_SESSION['uname'];
}

$sql = "SELECT projectTitle FROM norm WHERE kduEmail='" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $projectTitle = $row['projectTitle'];
    }
}


$sql = "SELECT * FROM progressReview2 WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $comments = $row['comments'];

        //echo 'ok';
    }
} else {
    $sql = "SELECT * FROM progressReview2 WHERE indexNo = 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $comments = $row['comments'];

            //echo 'ok';
        }
    }
}


$sql = "SELECT * FROM progressReview2 WHERE supervisorEmail='" . $_SESSION['uname'] . "' and kduEmail = '" . $kduEmail . "'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $disabled = 'disabled = "disabled"';
    }
} else {
    $disabled = "";
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

    <link rel="stylesheet" type="text/css" href="../css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

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
                    <h1 class="h3 mb-4 text-gray-800">Second Progress Review Marking Scheme</h1>

                    <div class="container">

                        <div class='row'>

                            <div class='col-md-12'>

                                <div class='card card-border-color card-border-color-primary'>

                                    <fieldset <?php echo $disabled ?>>

                                        <form method='POST'>

                                            <div class='card-header card-header-divider'>Evaluation Details</div>

                                            <div class='card-body'>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>KDU email</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' type='text' value="<?php echo $kduEmail; ?>" disabled>
                                                        <input class='form-control' id='kduEmail' name='kduEmail' type='text' value="<?php echo $kduEmail; ?>" hidden>
                                                        <input class='form-control' id='supervisorEmail' name='supervisorEmail' type='text' value="<?php echo $supervisorEmail; ?>" hidden>

                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Title</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <input class='form-control' id='projectTitle' name='projectTitle' type='text' value="<?php echo $projectTitle; ?>" disabled>
                                                    </div>
                                                </div>

                                                <div class='form-group row'>
                                                    <label class='col-12 col-sm-3 col-form-label text-sm-right'>Comments</label>
                                                    <div class='col-12 col-sm-8 col-lg-6'>
                                                        <textarea class='form-control' id='comments' name='comments' rows='8'><?php echo $row['comments']; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class='card-header card-header-divider'>Evaluation Details</div>


                                            <div class="container-table100">
                                                <div class="wrap-table100">

                                                    <div class="table100 ver5 m-b-110">
                                                        <div class="table100-head">
                                                            <table style="text-align: center; font-weight: 600;">
                                                                <thead>
                                                                    <tr class="row100 head">

                                                                        <th class="cell100 column1">Sub Assessment Criteria
                                                                        </th>
                                                                        <th class="cell100 column2">Excellent (A+)<br>(100 -
                                                                            85) </th>
                                                                        <th class="cell100 column3">Very good (A)<br>(84 -
                                                                            70)
                                                                        </th>
                                                                        <th class="cell100 column4">Good (B)<br>(69 - 55)
                                                                        </th>
                                                                        <th class="cell100 column5">Average (C)<br>(54 - 45)
                                                                        </th>
                                                                        <th class="cell100 column6">Below Avg.<br>(44 - 0)
                                                                        </th>
                                                                        <th class="cell100 column7">Marks<br>[Out of 100]
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>

                                                        <br>

                                                        <div class="table100-body js-pscroll">
                                                            <table style="text-align: center;">
                                                                <tbody>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Construct an
                                                                            innovative and/or a creative product [Based on
                                                                            ILO 1 - 10%
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Research problem (50%)
                                                                        </td>
                                                                        <td class="cell100 column2">Research problem, aim
                                                                            and objectives are mentioned
                                                                            properly</td>
                                                                        <td class="cell100 column3">Research problem, aim
                                                                            and objectives are mentioned
                                                                            clearly</td>
                                                                        <td class="cell100 column4">Research problem, aim
                                                                            and objectives are mentioned
                                                                            sufficiently</td>
                                                                        <td class="cell100 column5">Research problem, aim
                                                                            and objectives are mentioned poorly</td>
                                                                        <td class="cell100 column6">Research problem, aim
                                                                            and objectives are
                                                                            unacceptable</td>
                                                                        <td class="cell100 column7"><input id='mark1' name='mark1' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark1']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1" style="padding-left: 10px;">Novelty and creativity
                                                                            (50%)
                                                                        </td>
                                                                        <td class="cell100 column2">Distinguish the outcome
                                                                            from many existing solutions. New features
                                                                            justify with other features
                                                                        </td>
                                                                        <td class="cell100 column3">Compares with other
                                                                            existing systems. Existing and new features are
                                                                            given. </td>
                                                                        <td class="cell100 column4">Compares with one or two
                                                                            other systems. Existing features are given</td>
                                                                        <td class="cell100 column5">No comparison with
                                                                            existing solutions. Existing features are given
                                                                        </td>
                                                                        <td class="cell100 column6">No comparison with
                                                                            existing solutions. New features are not
                                                                            convincing</td>
                                                                        <td class="cell100 column7"><input id='mark2' name='mark2' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark2']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Synthesize
                                                                            information [Based on ILO 2 - 25%]
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Synthesize information
                                                                            (60%)
                                                                        </td>
                                                                        <td class="cell100 column2">Excellent use of the
                                                                            literature (more than 10 papers)</td>
                                                                        <td class="cell100 column3">Good use of the
                                                                            literature (10 paper</td>
                                                                        <td class="cell100 column4">Good use of the
                                                                            literature (5 papers) to identify the knowledge
                                                                        </td>
                                                                        <td class="cell100 column5">Average use of the
                                                                            literature to identify the knowledge gap </td>
                                                                        <td class="cell100 column6">Poor/No use of the
                                                                            literature to identify the knowledge gap </td>
                                                                        <td class="cell100 column7"><input id='mark3' name='mark3' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark3']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1" style="padding-left: 10px;">evaluation of the
                                                                            solution against other alternatives (40%)
                                                                        </td>
                                                                        <td class="cell100 column2">identify the knowledge
                                                                            gap. With excellent comparison</td>
                                                                        <td class="cell100 column3">identify the knowledge
                                                                            gap with comparison in sufficient </td>
                                                                        <td class="cell100 column4">identify the knowledge
                                                                            gap </td>
                                                                        <td class="cell100 column5">Identified but no
                                                                            comparison </td>
                                                                        <td class="cell100 column6">No other solution
                                                                            identifies and no comparison </td>
                                                                        <td class="cell100 column7"><input id='mark4' name='mark4' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark4']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Theoretical,
                                                                            practical and analytical knowledge [Based on ILO
                                                                            3 20%]
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">General domain knowledge
                                                                            (30%)
                                                                        </td>
                                                                        <td class="cell100 column2">Shows thorough, in depth
                                                                            understanding of the domain. Able to describe
                                                                            the domain and the problem in succinct manner
                                                                        </td>
                                                                        <td class="cell100 column3">Shows good understanding
                                                                            of the domain. Able to describe the domain and
                                                                            problem in the context.
                                                                        </td>
                                                                        <td class="cell100 column4">Shows shallow
                                                                            understanding of the domain. Unable to connect
                                                                            problem to the domain</td>
                                                                        <td class="cell100 column5">Shows shallow
                                                                            understanding of the domain. Unable to connect
                                                                            problem to the domain</td>
                                                                        <td class="cell100 column6">Does not have proper
                                                                            understanding about the domain. Unable to
                                                                            connect problem to the domain</td>
                                                                        <td class="cell100 column7"><input id='mark5' name='mark5' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark5']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Specific domain
                                                                            knowledge (30%)
                                                                        </td>
                                                                        <td class="cell100 column2">Comprehensively
                                                                            describes how specific techniques have been
                                                                            developed and used to solve the problem. Can
                                                                            describe alternatives</td>
                                                                        <td class="cell100 column3">Describes how specific
                                                                            techniques have been modified and used to solve
                                                                            the problem. Can mention alternatives</td>
                                                                        <td class="cell100 column4">Knows how specific
                                                                            techniques have been used to solve the problem.
                                                                            know availability of alternatives</td>
                                                                        <td class="cell100 column5">Knows how specific
                                                                            techniques have been used to solve the problem.
                                                                            unknow availability of alternatives</td>
                                                                        <td class="cell100 column6">Unable to show how
                                                                            techniques have been developed to solve the
                                                                            problem at hand. Unaware of other alternatives
                                                                        </td>
                                                                        <td class="cell100 column7"><input id='mark6' name='mark6' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark6']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Propose New Technology
                                                                            (40%)
                                                                        </td>
                                                                        <td class="cell100 column2">Proposed latest and
                                                                            appropriate technology to develop the solution.
                                                                            Can justify the selected technologies. Describe
                                                                            the deficiencies of alternative technologies
                                                                        </td>
                                                                        <td class="cell100 column3">Proposed an appropriate
                                                                            technology to develop the solution. Describe
                                                                            pros and cons of the selected technologies.
                                                                            Describe the alternative technologies</td>
                                                                        <td class="cell100 column4">Proposed a technology
                                                                            which is suitable to develop the solution.
                                                                            Describe advantageous of it over some other
                                                                            technology. Aware of alternatives</td>
                                                                        <td class="cell100 column5">Proposed a technology
                                                                            which is suitable to develop the solution.
                                                                            Describe advantageous of it over some other
                                                                            technology. Unaware of alternative technologies
                                                                        </td>
                                                                        <td class="cell100 column6">Proposed a technology
                                                                            which is comfortable. Unable to justify the
                                                                            selected technology. Unaware of alternative
                                                                            technologies</td>
                                                                        <td class="cell100 column7"><input id='mark7' name='mark7' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark7']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Design,
                                                                            professional, ethical, security, and social
                                                                            responsibility [Based on ILO 4 25%]
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1" style="padding-left: 10px;">High level view of the
                                                                            Proposed design (30%)
                                                                        </td>
                                                                        <td class="cell100 column2">Excellent demonstration
                                                                            of the system design showing the major
                                                                            components and their relationships with each
                                                                            other Excellent demonstration of the
                                                                            communication with external interfaces </td>
                                                                        <td class="cell100 column3">Adequate demonstration
                                                                            of the system design showing the major
                                                                            components and their relationships with each
                                                                            other Good demonstration of the communication
                                                                            with external interfaces
                                                                        </td>
                                                                        <td class="cell100 column4">Average demonstration of
                                                                            the system design showing the major components
                                                                            and their relationships with each other Average
                                                                            demonstration of the communication with external
                                                                            interfaces </td>
                                                                        <td class="cell100 column5">Demonstration of the
                                                                            system design showing the major components and
                                                                            their relationships with each other Poor
                                                                            demonstration of the communication with external
                                                                            interfaces</td>
                                                                        <td class="cell100 column6">Poor demonstration of
                                                                            the system design showing the major components
                                                                            and their relationships with each other Poor
                                                                            demonstration of the communication with external
                                                                            interfaces </td>
                                                                        <td class="cell100 column7"><input id='mark8' name='mark8' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark8']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Research problem (50%)
                                                                        </td>
                                                                        <td class="cell100 column2">Research problem, aim
                                                                            and objectives are mentioned
                                                                            properly</td>
                                                                        <td class="cell100 column3">Research problem, aim
                                                                            and objectives are mentioned
                                                                            clearly</td>
                                                                        <td class="cell100 column4">Research problem, aim
                                                                            and objectives are mentioned
                                                                            sufficiently</td>
                                                                        <td class="cell100 column5">Research problem, aim
                                                                            and objectives are mentioned
                                                                            sufficiently</td>
                                                                        <td class="cell100 column6">Research problem, aim
                                                                            and objectives are
                                                                            unacceptable</td>
                                                                        <td class="cell100 column7"><input id='mark9' name='mark9' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark9']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Use of appropriate
                                                                            tools, technologies and design techniques in the
                                                                            development with a proper justification (10%)
                                                                        </td>
                                                                        <td class="cell100 column2">Excellent use of
                                                                            appropriate technologies with proper
                                                                            justification Excellent use of development
                                                                            framework tools </td>
                                                                        <td class="cell100 column3">Adequate use of
                                                                            appropriate technologies with proper
                                                                            justification Adequate use of development
                                                                            framework tools</td>
                                                                        <td class="cell100 column4">Average use of
                                                                            ppropriate technologies with proper
                                                                            justification Average use of development
                                                                            framework tools Average </td>
                                                                        <td class="cell100 column5">Average use of
                                                                            ppropriate technologies with proper
                                                                            justification Poor use of development framework
                                                                            tools Poor</td>
                                                                        <td class="cell100 column6">Poor use of appropriate
                                                                            technologies with proper justification Poor use
                                                                            of development framework tools </td>
                                                                        <td class="cell100 column7"><input id='mark10' name='mark10' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark10']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Methodological approach
                                                                            and Originality (30%)
                                                                        </td>
                                                                        <td class="cell100 column2">Innovative methodology
                                                                            or application, Adds new insights to the topic
                                                                        </td>
                                                                        <td class="cell100 column3">Thorough knowledge of
                                                                            theory and methods, used to underpin arguments
                                                                            and conclusions </td>
                                                                        <td class="cell100 column4">Methodology and/or life
                                                                            cycle described Some evidence of use Nothing
                                                                            new, but solid understanding of martial </td>
                                                                        <td class="cell100 column5">Thorough knowledge of
                                                                            theory and methods, used to underpin arguments
                                                                            and conclusions </td>
                                                                        <td class="cell100 column6">Little/no evidence of
                                                                            choice or use of method or life cycle Entirely
                                                                            based on flawed interpredation of existing
                                                                            material
                                                                        </td>
                                                                        <td class="cell100 column7"><input id='mark11' name='mark11' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark11']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Development of product
                                                                            (10%)
                                                                        </td>
                                                                        <td class="cell100 column2">Innovative engineering
                                                                            work and/or method, justified and used in
                                                                            re-port </td>
                                                                        <td class="cell100 column3">Development process well
                                                                            designed conducted. Evaluation and
                                                                            interpretation relevant, Accurate, relevant
                                                                            results </td>
                                                                        <td class="cell100 column4">Thoroughly carried out
                                                                            but limited scope with some data obtained </td>
                                                                        <td class="cell100 column5">development process is
                                                                            poorly carried out with a substantially flawed
                                                                            method, or little or no reliable data obtained
                                                                        </td>
                                                                        <td class="cell100 column6">Need for re-search
                                                                            apparent, but none carried out </td>
                                                                        <td class="cell100 column7"><input id='mark12' name='mark12' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark12']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1" style="padding-left: 10px;">Evidence of project
                                                                            planning and management (10%)
                                                                        </td>
                                                                        <td class="cell100 column2">Adds new in-sight into
                                                                            project planning and management </td>
                                                                        <td class="cell100 column3">Shows a detailed plan
                                                                            with time-scales, resources and a work schedule
                                                                            for most tasks.
                                                                        </td>
                                                                        <td class="cell100 column4">Shows a de-tailed plan
                                                                            with timescales, resources and a work schedule
                                                                            for most tasks. </td>
                                                                        <td class="cell100 column5">Sketchy generalized plan
                                                                            with no evidence of monitoring of progress </td>
                                                                        <td class="cell100 column6">No planning evidence
                                                                        </td>
                                                                        <td class="cell100 column7"><input id='mark13' name='mark13' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark13']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Effective-Time
                                                                            Management (10%)
                                                                        </td>
                                                                        <td class="cell100 column2">Effective-Time
                                                                            Management related to project are clearly
                                                                            identified, action plan is given clearly </td>
                                                                        <td class="cell100 column3">Effective-Time
                                                                            Management related to project are adequately
                                                                            identified </td>
                                                                        <td class="cell100 column4">Effective-Time
                                                                            Management related to project are identified
                                                                        </td>
                                                                        <td class="cell100 column5">Effective-Time
                                                                            Management related to project are identified
                                                                        </td>
                                                                        <td class="cell100 column6">Effective-Time
                                                                            Management related to project are not identifie
                                                                        </td>
                                                                        <td class="cell100 column7"><input id='mark14' name='mark14' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark14']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Effective
                                                                            Communication [Based on ILO 5 - 10%]
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Idea of delivery (50%)
                                                                        </td>
                                                                        <td class="cell100 column2">Excellent explanation of
                                                                            the proposal content </td>
                                                                        <td class="cell100 column3">
                                                                            Sufficiently explained the proposal content</td>
                                                                        <td class="cell100 column4">Proposal content
                                                                            explained but containing some irrelevant
                                                                            information </td>
                                                                        <td class="cell100 column5">
                                                                            weakly explained the proposal conten</td>
                                                                        <td class="cell100 column6">
                                                                            proposal content not sufficient</td>
                                                                        <td class="cell100 column7"><input id='mark15' name='mark15' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark15']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Structure and mechanics
                                                                            of language (30%)
                                                                        </td>
                                                                        <td class="cell100 column2">Excellent structure and
                                                                            formatting, meaningful chapters (as recommended)
                                                                            with logical flow </td>
                                                                        <td class="cell100 column3">Acceptable structure and
                                                                            formatting, Good language usage </td>
                                                                        <td class="cell100 column4">Poorly designed
                                                                            structure and formatting</td>
                                                                        <td class="cell100 column5">Unacceptable structure.
                                                                            Very poor writing and week presentation</td>
                                                                        <td class="cell100 column6">Unacceptable structure.
                                                                            Very poor writing Conversation is poor</td>
                                                                        <td class="cell100 column7"><input id='mark16' name='mark16' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark16']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Referencing (IEEE) (20%)
                                                                        </td>
                                                                        <td class="cell100 column2">Proper citing and
                                                                            referencing</td>
                                                                        <td class="cell100 column3">Acceptable level of
                                                                            citing and referencing </td>
                                                                        <td class="cell100 column4">Few citations with
                                                                            incorrect referencing </td>
                                                                        <td class="cell100 column5">Very few citations and
                                                                            incorrect </td>
                                                                        <td class="cell100 column6">No referencing </td>
                                                                        <td class="cell100 column7"><input id='mark17' name='mark17' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark17']; ?>"> </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td style="background-color:#d1d1d1;" class="cell100 column1" colspan="7">Self
                                                                            -evaluation [Based on ILO6 10%]
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="row100 body">
                                                                        <td class="cell100 column1">Research problem (50%)
                                                                        </td>
                                                                        <td class="cell100 column2">Reflective journal +
                                                                            Maintain research materials (100%)</td>
                                                                        <td class="cell100 column3">Details provides in
                                                                            excellent Maintain research diary in excellent
                                                                            with all relevant materials </td>
                                                                        <td class="cell100 column4">Sufficient information
                                                                            provides, Maintain research diary with all
                                                                            relevant materials </td>
                                                                        <td class="cell100 column5">Few or no reflective
                                                                            journal, Maintain research
                                                                            diary only</td>
                                                                        <td class="cell100 column6">No such information no
                                                                            research diary </td>
                                                                        <td class="cell100 column7"><input id='mark18' name='mark18' type="text" style="width: 75%" class="marks" value="<?php echo $row['mark18']; ?>"> </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <center>

                                                <a href='#' class='btn btn-primary btn-icon-split'>
                                                    <span class='icon text-white-50'>
                                                        <!--<i class = 'fas fa-flag'></i>-->
                                                    </span>
                                                    <br>
                                                    <button type='submit' formaction='../databases/progressReview2.php' class='btn btn-primary btn-icon-split text' id='save'>Send marking</button>
                                                </a>

                                            </center>

                                            <br>

                                        </form>

                                        <fieldset>


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


    <script src="../js/perfect-scrollbar.min.js"></script>

    <script>
        $('.js-pscroll').each(function() {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>

</body>

</html>