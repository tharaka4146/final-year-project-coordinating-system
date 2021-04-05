<?php

include 'config.php';

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$sql = "SELECT firstName FROM student WHERE kduEmail='" . $_SESSION['uname'] . "' and firstName != ''";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $name = $row['firstName'];
    }
} else {
    $name = $_SESSION['uname'];
}


//$sql = "SELECT * FROM research WHERE kduEmail ='" . $_SESSION['uname'] . "'";
$sql = "SELECT norm.projectTitle as projectTitle, norm.area as area, research.area as area2, research.summery as summery, research.keywords as keywords, research.problems as problems, research.analysis as analysis, research.literatureReview as literatureReview, research.originality as originality , research.methodology as methodology , research.plan as plan , research.aim as aim, research.objectives as objectives, research.design as design, research.indicators as indicators, research.ethical as ethical, research.deliverables as deliverables, research.significance as significance, research.stakeholders as stakeholders, research.protect as protect, research.message as message, research.message2 as message2, research.send as send FROM norm INNER JOIN research ON norm.kduEmail=research.kduEmail";
//$sql = "SELECT * FROM norm INNER JOIN research ON norm.kduEmail=research.kduEmail";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $projectTitle = $row['projectTitle'];
        $area = $row['area'];
        $area2 = $row['area2'];
        $summery = $row['summery'];
        $keywords = $row['keywords'];
        $problems = $row['problems'];
        $analysis = $row['analysis'];
        $literatureReview = $row['literatureReview'];
        $originality = $row['originality'];
        $methodology = $row['methodology'];
        $plan = $row['plan'];
        $aim = $row['aim'];
        $objectives = $row['objectives'];
        $design = $row['design'];
        $indicators = $row['indicators'];
        $ethical = $row['ethical'];
        $deliverables = $row['deliverables'];
        $significance = $row['significance'];
        $stakeholders = $row['stakeholders'];
        $protect = $row['protect'];
        $message = $row['message'];
        $message2 = $row['message2'];
        $send = $row['send'];


        //echo 'ok';
    }
} else {
    $sql = 'SELECT * FROM research WHERE indexNo = 1';

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $send = '0';
            $projectTitle = "";
            $area2 = "";
            $summery = "";
            $keywords = "";
            $problems = "";
            $analysis = "";
            $literatureReview = "";
            $originality = "";
            $aim = "";
            $objectives = "";
            $methodology = "";
            $plan = "";
            $design = "";
            $indicators = "";
            $ethical = "";
            $deliverables = "";
            $significance = "";
            $stakeholders = "";
            $protect = "";
            $message = "";
            $message2 = "";
        }
    } else {
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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->

    <link rel='stylesheet' href='../css/loading.css' type='text/css' />

    <link href='../vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href='../css/sb-admin-2.min.css' rel='stylesheet'>

    <script>
        function enable() {

            if (<?php echo $send; ?> == 1) {

                document.getElementById('save').disabled = true;
                document.getElementById('send').disabled = true;
                document.getElementById('area').disabled = true;
                document.getElementById('projectTitle').disabled = true;
                document.getElementById('area').disabled = true;
                document.getElementById('area2').disabled = true;
                document.getElementById('summery').disabled = true;
                document.getElementById('keywords').disabled = true;
                document.getElementById('keywords2').disabled = true;
                document.getElementById('problems').disabled = true;
                document.getElementById('analysis').disabled = true;
                document.getElementById('literatureReview').disabled = true;
                document.getElementById('originality').disabled = true;
                document.getElementById('aim').disabled = true;
                document.getElementById('objectives').disabled = true;
                document.getElementById('methodology').disabled = true;
                document.getElementById('plan').disabled = true;
                document.getElementById('design').disabled = true;
                document.getElementById('indicators').disabled = true;
                document.getElementById('ethical').disabled = true;
                document.getElementById('deliverables').disabled = true;
                document.getElementById('significance').disabled = true;
                document.getElementById('stakeholders').disabled = true;
                document.getElementById('protect').disabled = true;
                document.getElementById('message').disabled = true;
                document.getElementById('message2').disabled = true;
            } else {
                document.getElementById('banner1').style.display = 'none';
            }

        }
    </script>

    <script>
        function enable2() {
            if (<?php echo $message2; ?> == 0) {
                document.getElementById('banner3').style.display = 'none';
            }
        }
    </script>

</head>

<body id='page-top' onload='enable(), enable2()' class="toggle-loading">

    <!-- Page Wrapper -->
    <div id='wrapper'>

        <!-- Sidebar -->
        <ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='accordionSidebar'>

            <!-- Sidebar - Brand -->
            <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.html'>
                <div class='sidebar-brand-icon rotate-n-15'>
                    <i class='fas fa-laugh-wink'></i>
                </div>
                <div class='sidebar-brand-text mx-3'>SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class='sidebar-divider my-0'>

            <!-- Nav Item - Dashboard -->
            <li class='nav-item'>
                <a class='nav-link' href='index.html'>
                    <i class='fas fa-fw fa-tachometer-alt'></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class='sidebar-divider'>

            <!-- Heading -->
            <div class='sidebar-heading'>
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>Components</span>
                </a>
                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Custom Components:</h6>
                        <a class='collapse-item' href='buttons.html'>Buttons</a>
                        <a class='collapse-item' href='cards.html'>Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
                    <i class='fas fa-fw fa-wrench'></i>
                    <span>Utilities</span>
                </a>
                <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Custom Utilities:</h6>
                        <a class='collapse-item' href='utilities-color.html'>Colors</a>
                        <a class='collapse-item' href='utilities-border.html'>Borders</a>
                        <a class='collapse-item' href='utilities-animation.html'>Animations</a>
                        <a class='collapse-item' href='utilities-other.html'>Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class='sidebar-divider'>

            <!-- Heading -->
            <div class='sidebar-heading'>
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class='nav-item active'>
                <a class='nav-link' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
                    <i class='fas fa-fw fa-folder'></i>
                    <span>Pages</span>
                </a>
                <div id='collapsePages' class='collapse show' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                        <h6 class='collapse-header'>Login Screens:</h6>
                        <a class='collapse-item' href='login.html'>Login</a>
                        <a class='collapse-item' href='register.html'>Register</a>
                        <a class='collapse-item' href='forgot-password.html'>Forgot Password</a>
                        <div class='collapse-divider'></div>
                        <h6 class='collapse-header'>Other Pages:</h6>
                        <a class='collapse-item' href='404.html'>404 Page</a>
                        <a class='collapse-item active' href='blank.html'>Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class='nav-item'>
                <a class='nav-link' href='charts.html'>
                    <i class='fas fa-fw fa-chart-area'></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class='nav-item'>
                <a class='nav-link' href='tables.html'>
                    <i class='fas fa-fw fa-table'></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class='sidebar-divider d-none d-md-block'>

            <!-- Sidebar Toggler ( Sidebar ) -->
            <div class='text-center d-none d-md-inline'>
                <button class='rounded-circle border-0' id='sidebarToggle'></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id='content-wrapper' class='d-flex flex-column'>

            <!-- Main Content -->
            <div id='content' class="card be-loading">

                <div class="card-body" hidden>
                    <button class="toggle-loading" id="click" data-modal="modal" hidden>Trigger loader</button>
                </div>

                <div class="be-spinner">

                    <svg width="40px" height="50px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                        <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                    </svg>

                </div>

                <!-- Topbar -->
                <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>

                    <!-- Sidebar Toggle ( Topbar ) -->
                    <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>
                        <i class='fa fa-bars'></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class='d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search'>
                        <div class='input-group'>
                            <input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2'>
                            <div class='input-group-append'>
                                <button class='btn btn-primary' type='button'>
                                    <i class='fas fa-search fa-sm'></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class='navbar-nav ml-auto'>

                        <!-- Nav Item - Search Dropdown ( Visible Only XS ) -->
                        <li class='nav-item dropdown no-arrow d-sm-none'>
                            <a class='nav-link dropdown-toggle' href='#' id='searchDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-search fa-fw'></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class='dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in' aria-labelledby='searchDropdown'>
                                <form class='form-inline mr-auto w-100 navbar-search'>
                                    <div class='input-group'>
                                        <input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2'>
                                        <div class='input-group-append'>
                                            <button class='btn btn-primary' type='button'>
                                                <i class='fas fa-search fa-sm'></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class='nav-item dropdown no-arrow mx-1'>
                            <a class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-bell fa-fw'></i>
                                <!-- Counter - Alerts -->
                                <span class='badge badge-danger badge-counter'>3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='alertsDropdown'>
                                <h6 class='dropdown-header'>
                                    Alerts Center
                                </h6>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='mr-3'>
                                        <div class='icon-circle bg-primary'>
                                            <i class='fas fa-file-alt text-white'></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class='small text-gray-500'>December 12, 2019</div>
                                        <span class='font-weight-bold'>A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='mr-3'>
                                        <div class='icon-circle bg-success'>
                                            <i class='fas fa-donate text-white'></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class='small text-gray-500'>December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='mr-3'>
                                        <div class='icon-circle bg-warning'>
                                            <i class='fas fa-exclamation-triangle text-white'></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class='small text-gray-500'>December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.
                                        </div>
                                        <div class='small text-gray-500'>Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='dropdown-list-image mr-3'>
                                        <img class='rounded-circle' src='https://source.unsplash.com/AU4VPcFN4LE/60x60' alt=''>
                                        <div class='status-indicator'></div>
                                    </div>
                                    <div>
                                        <div class='text-truncate'>I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class='small text-gray-500'>Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='dropdown-list-image mr-3'>
                                        <img class='rounded-circle' src='https://source.unsplash.com/CS2uCrpNzJY/60x60' alt=''>
                                        <div class='status-indicator bg-warning'></div>
                                    </div>
                                    <div>
                                        <div class='text-truncate'>Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class='small text-gray-500'>Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class='dropdown-item text-center small text-gray-500' href='#'>Read More Messages</a>
                            </div>
                        </li>



                        <div class='topbar-divider d-none d-sm-block'></div>

                        <!-- Nav Item - User Information -->
                        <li class='nav-item dropdown no-arrow'>
                            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='mr-2 d-none d-lg-inline text-gray-600 small'><?php echo $name; ?></span>
                                <img class='img-profile rounded-circle' src='https://source.unsplash.com/QAB-WJcbgJk/60x60'>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>
                                <a class='dropdown-item' href='#'>
                                    <i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i> Profile
                                </a>
                                <a class='dropdown-item' href='#'>
                                    <i class='fas fa-cogs fa-sm fa-fw mr-2 text-gray-400'></i> Settings
                                </a>
                                <a class='dropdown-item' href='#'>
                                    <i class='fas fa-list fa-sm fa-fw mr-2 text-gray-400'></i> Activity Log
                                </a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>
                                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class='container-fluid'>

                    <!-- Page Heading -->
                    <h1 class='h3 mb-4 text-gray-800'>APPLICATION FOR UNDER GRADUATE FINAL YEAR RESEARCH PROJECT</h1>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner1'>

                        <h6 class='alert-heading'>Saved and sent for marking successfully ! You cannot edit further</h6>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>

                    </div>

                    <div class='alert alert-success alert-dismissible fade show' role='alert' id='banner3'>

                        <h6 class='alert-heading'><?php echo $row['message2']; ?></h6>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>

                    </div>

                    <div class='row'>

                        <div class='col-md-12'>

                            <div class='card card-border-color card-border-color-primary'>

                                <form method='POST'>

                                    <div class='card-header card-header-divider'>Project Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Project Title</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='projectTitle' name='projectTitle' type='text' value="<?php echo $projectTitle ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research area</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <select class='form-control' id='area' name='area'>
                                                    <option selected><?php echo $row['area']; ?></option>
                                                    <option value='1'>Field 1</option>
                                                    <option value='2'>Field 2</option>
                                                    <option value='3'>Field 3</option>
                                                    <option value='4'>Field 4</option>
                                                    <option value='5'>Field 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Specific Area</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='area2' name='area2' rows='4'><?php echo $area2; ?></textarea>
                                            </div>
                                        </div>


                                    </div>

                                    <div class='card-header card-header-divider'>Supervisor 1 Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $firstName; ?>">

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $email; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                            </label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Supervisor 2 Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $row['firstName']; ?>">

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                            </label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Supervisor 3 Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $row['firstName']; ?>">

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Institution (if not from the University)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Area of expertise related to the proposed project</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number
                                            </label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Student Information</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>First Name</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='firstName' name='firstName' type='text' value="<?php echo $firstName; ?>">

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Email</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='email' name='email' type='text' value="<?php echo $email; ?>">
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Contact Number</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <input class='form-control' id='contactNo' name='contactNo' type='text' value="<?php echo $contactNo; ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Summary</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Summery</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='summery' name='summery' rows='4'><?php echo $summery; ?></textarea>
                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Give 3 – 5 keywords for the proposed project (use commas to seperate)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <div class="editable" contenteditable="true" style="border:1px solid #CDCDCD; padding:10px 5px 0px 0px; border-radius:5px;">
                                                    <ul id="keywords" name="keywords">
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <textarea class='form-control' id='keywords2' name='keywords2' rows='4'><?php echo $keywords; ?></textarea>

                                            </div>
                                        </div>

                                    </div>


                                    <div class='card-header card-header-divider'>Research Problem</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Research Problem/s</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='problems' name='problems' rows='4'><?php echo $problems; ?></textarea>

                                            </div>
                                        </div>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Analysis of the problem/s and rationale for the research question</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='analysis' name='analysis' rows='8'><?php echo $analysis; ?></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class='card-header card-header-divider'>Comprehensive literature review AND the complete list of references in the relevant area. </div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Attach additional sheets if necessary</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='literatureReview' name='literatureReview' rows='8'><?php echo $literatureReview; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Originality & innovativeness of the proposed work</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Originality & innovativeness of the proposed work</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='originality' name='originality' rows='8'><?php echo $originality; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Overall aim and specific objectives of the proposed work</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Overall aim</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='aim' name='aim' rows='8'><?php echo $aim; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Specific Objective/s</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='objectives' name='objectives' rows='8'><?php echo $objectives; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Methodology</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Describe the Methodology Attach additional sheets if necessary)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='methodology' name='methodology' rows='8'><?php echo $methodology; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Experimental design where applicable Please complete relevant sections
                                            </label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='design' name='design' rows='8'><?php echo $design; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Work plan</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>

                                                <label class='col-12 col-sm-3 col-form-label text-sm-right'>Please attach the quarterly Gantt Chart to cover the proposed study, as per the format below</label>

                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <?php
                                                $reader = IOFactory::createReader('Xlsx');
                                                $spreadsheet = $reader->load($link = 'sample_data.xlsx');
                                                $writer = IOFactory::createWriter($spreadsheet, 'Html');
                                                $message = $writer->save('php://output');
                                                ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Indicators & milestones of progress</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Please list the milestones and indicators that will be used to measure the progress of the proposed Study</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='indicators' name='indicators' rows='8'><?php echo $indicators; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Ethical considerations</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Ethical considerations</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='ethical' name='ethical' rows='8'><?php echo $ethical; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Expected Research Outputs</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Deliverables at the end of the project in point form</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='deliverables' name='deliverables' rows='8'><?php echo $deliverables; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Plan to utilize the research output</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Plan to utilize the research output</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='plan' name='plan' rows='8'><?php echo $plan ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Research Outcomes</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Significance of research outcomes and the impact on national/socio-economic development of Sri Lanka. Please write in point form</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='significance' name='significance' rows='8'><?php echo $significance; ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Identify relevant stakeholders and potential beneficiaries</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='stakeholders' name='stakeholders' rows='8'><?php echo $stakeholders; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Plan to protect and exploit Intellectual Property (IP)? (Indicate if applicable)</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Plan to protect and exploit Intellectual Property (IP)? (Indicate if applicable)</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='protect' name='protect' rows='8'><?php echo $protect; ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='card-header card-header-divider'>Any other message</div>

                                    <div class='card-body'>

                                        <div class='form-group row'>
                                            <label class='col-12 col-sm-3 col-form-label text-sm-right'>Type any information that you feel important</label>
                                            <div class='col-12 col-sm-8 col-lg-6'>
                                                <textarea class='form-control' id='message' name='message' rows='8'><?php echo $message; ?></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <center>

                                        <a href='#' class='btn btn-primary btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fas fa-flag'></i>-->
                                            </span>
                                            <br>
                                            <button type='submit' formaction='../databases/researchSave.php' class='btn btn-primary btn-icon-split text' id='save'>Save and edit
                                                later</button>
                                        </a>

                                        <a href='#' class='btn btn-success btn-icon-split'>
                                            <span class='icon text-white-50'>
                                                <!--<i class = 'fa fa-check'></i>-->
                                            </span>
                                            <button type='submit' formaction='../databases/researchSend.php' class='btn btn-success btn-icon-split text' id='send'>Send for
                                                marking</button>
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