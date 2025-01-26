<?php
require_once("./db/db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>TND Support System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="./css/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="./css/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="./js/config.js"></script>

    <!-- App css -->
    <link href="./css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="./css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: "Poppins", serif;
    }

    .pagination {
        display: inline-block;
        margin-top: 20px;
    }

    .pagination a {
        color: #2D333C;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #2F3742;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #2D333C;
        color: white;
    }

    /* Initially hide page content */
    body.loading .content {
        visibility: hidden;
    }

    /* Loader styling */
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        visibility: visible;
        opacity: 1;
        background-color: #fff;
        /* Default white background */
        transition: visibility 0s 0.2s, opacity 0.2s linear;
    }

    .loader.hidden {
        visibility: hidden;
        opacity: 0;
    }

    /* Three dots styling */
    .loader .dots {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .loader .dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #333333;
        /* Change this to the desired dot color */
        animation: bounce 1s forwards;
        /* 1-second animation */
    }

    /* Individual dot animation delay */
    .loader .dot:nth-child(1) {
        animation-delay: 0s;
    }

    .loader .dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loader .dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    /* Bouncing animation for dots */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    /* Dark theme loader background */
    body.dark-theme .loader {
        background-color: #333333;
    }

    /* Light theme loader background */
    body.light-theme .loader {
        background-color: #ffffff;
    }
    </style>

</head>

<body>

    <body class="loading">
        <!-- Loader -->
        <div class="loader">
            <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div class="wrapper">


            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="index.php" class="logo-light">
                                <span class="logo-lg">
                                    <img src="./images/logo.png" alt="logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="./images/logo-sm.png" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="index.php" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="./images/logo-sm.png" alt="small logo">
                                </span>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="ri-menu-line"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>

                        <!-- Topbar Search Form -->
                        <div class="app-search d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search...">
                                    <span class="ri-search-line search-icon text-muted"></span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line fs-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="./images/us.jpg" alt="user-image" class="me-0 me-sm-1 h-3 w-auto">
                                <span class="align-middle d-none d-lg-inline-block">English</span>
                                <i class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <!-- German -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="./images/germany.jpg" alt="user-image" class="me-1 h-3 w-auto">
                                    <span class="align-middle">German</span>
                                </a>

                                <!-- Italian -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="./images/italy.jpg" alt="user-image" class="me-1 h-3 w-auto">
                                    <span class="align-middle">Italian</span>
                                </a>

                                <!-- Spanish -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="./images/spain.jpg" alt="user-image" class="me-1 h-3 w-auto">
                                    <span class="align-middle">Spanish</span>
                                </a>

                                <!-- Russian -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1 h-3 w-auto">
                                    <span class="align-middle">Russian</span>
                                </a>


                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-notification-3-line fs-22"></i>
                                <span class="noti-icon-badge badge text-bg-pink">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold"> Notification</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                <small>Clear All</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div style="max-height: 300px;" data-simplebar>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary-subtle">
                                            <i class="mdi mdi-comment-account-outline text-primary"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="noti-time">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning-subtle">
                                            <i class="mdi mdi-account-plus text-warning"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="noti-time">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger-subtle">
                                            <i class="mdi mdi-heart text-danger"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <small class="noti-time">3 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-pink-subtle">
                                            <i class="mdi mdi-comment-account-outline text-pink"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admi
                                            <small class="noti-time">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-purple-subtle">
                                            <i class="mdi mdi-account-plus text-purple"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="noti-time">7 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success-subtle">
                                            <i class="mdi mdi-heart text-success"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                            <small class="noti-time">Carlos Crouch liked</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="d-none d-sm-inline-block">
                            <div class="nav-link" id="light-dark-mode">
                                <i class="ri-moon-line fs-22"></i>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="./<?php echo $_SESSION['student_user_image']?>" alt="user-image"
                                        width="32" class="rounded-circle">
                                </span>
                                <span class="d-lg-block d-none">
                                    <h5 class="my-0 fw-normal"><?php echo $_SESSION['student_user_name']?> <i
                                            class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="./profile.php" class="dropdown-item">
                                    <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="./logout.php" class="dropdown-item">
                                    <i class="text-red-500 ri-logout-box-line fs-18 align-middle me-1"></i>
                                    <span class="text-red-500">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu pt-10">

                <!-- Brand Logo Light -->
                <a href="index.php" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="./images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="./images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="./images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="./images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title">Modules</li>

                        <?php
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "student"){
                    ?>

                            <li class="side-nav-item">
                            <a href="./index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Home </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="./my_requests.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <?php
                            $select_query = "SELECT * FROM `student_applications` WHERE `student_user_id` = $_SESSION[student_user_id]";
                            $execute = mysqli_query($connection, $select_query);
                            $count_records = mysqli_num_rows($execute);
                            ?>
                                <span class="badge bg-success float-end"><?php echo $count_records?></span>
                                <span> My Requests </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="./student_application_form.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Initiate Application </span>
                            </a>
                        </li>
                        <?php
                      } else{
                    ?>


                        <li class="side-nav-item">
                            <a href="./index.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="./pending_requests.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>

                                <?php
                            $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Pending'";
                            $execute = mysqli_query($connection, $select_query);
                            $count_records = mysqli_num_rows($execute);

                            if($count_records == 0){
                                echo "";
                            }
                            else if($count_records < 10){
                            ?>
                                <span class="badge bg-green-500 float-end"><?php echo $count_records?></span>
                                <?php
                                }
                                else if($count_records > 10){
                                ?>
                                <span class="badge bg-red-500 float-end"><?php echo $count_records?></span>
                                <?php
                                } else {
                                ?>
                                <span class="badge bg-blue-500 float-end"><?php echo $count_records?></span>
                                <?php
                                }
                                ?>
                                <span> Pending Requests </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="./process_requests.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>

                                <?php
                            $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Process'";
                            $execute = mysqli_query($connection, $select_query);
                            $count_records = mysqli_num_rows($execute);

                            if($count_records == 0){
                                echo "";
                            }
                            else if($count_records < 10){
                            ?>
                                <span class="badge bg-green-500 float-end"><?php echo $count_records?></span>
                                <?php
                                }
                                else if($count_records > 10){
                                ?>
                                <span class="badge bg-red-500 float-end"><?php echo $count_records?></span>
                                <?php
                                } else {
                                ?>
                                <span class="badge bg-blue-500 float-end"><?php echo $count_records?></span>
                                <?php
                                }
                                ?>
                                <span> Process Requests </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="./solved_requests.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Solved Requests </span>
                            </a>
                        </li>

                        <?php
                    }
                    ?>

                        <li class="side-nav-item">
                            <a href="./profile.php" class="side-nav-link">
                                <i class="ri-user-line"></i> <!-- Icon for Student Profile -->
                                <span> My Profile </span>
                            </a>
                        </li>
                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->