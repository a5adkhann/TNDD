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

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">

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
        background-color: #EAF1F3;
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
        background-color: #1A2942;
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
                            <a href="home" class="logo-light">
                            <span class="logo-lg hidden md:flex items-center justify-center">
                    <span class="text-lg font-bold flex items-center justify-center tracking-wide text-[#EAF1F3] md:text-xl lg:text-2xl xl:text-3xl" style="font-family: 'Lexend Giga', serif;">
                        <img class="invert w-6 md:w-4 lg:w-4 xl:w-6" src="./images/logo1.png" alt=""> 
                        <span class="ml-2">TND</span>
                    </span>
                </span>
                                <span class="logo-sm">
                                    <img src="./images/logo-sm.png" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="home" class="logo-dark">
                            <span class="logo-lg hidden md:block">
                                <h1 class="font-bold tracking-wide text-blue-600 md:text-4xl lg:text-5xl" style="font-family: 'Lexend Giga', serif;">
                                    TND Dept.
                                </h1>
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
                                <a href="./profile" class="dropdown-item">
                                    <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="./logout" class="dropdown-item">
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
                <a href="home" class="logo logo-light">
                <span class="logo-lg hidden md:flex items-center justify-center">
                    <span class="text-lg font-bold flex items-center justify-center tracking-wide text-[#EAF1F3] md:text-xl lg:text-2xl xl:text-3xl" style="font-family: 'Lexend Giga', serif;">
                        <img class="invert w-6 md:w-4 lg:w-4 xl:w-6" src="./images/logo1.png" alt=""> 
                        <span class="ml-2">TND</span>
                    </span>
                </span>

                </span>

                    <span class="logo-sm">
                        <img src="./images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="home" class="logo logo-dark">
                <span class="logo-lg hidden md:flex items-center justify-center">
                    <span class="text-lg font-bold flex items-center justify-center tracking-wide text-[#EAF1F3] md:text-xl lg:text-2xl xl:text-3xl" style="font-family: 'Lexend Giga', serif;">
                        <img class="invert w-6 md:w-4 lg:w-4 xl:w-6" src="./images/logo1.png" alt=""> 
                        <span class="ml-2">TND</span>
                    </span>
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
                            <a href="./home" class="side-nav-link">
                            <i class="ri-home-line"></i>

                                <span> Home </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="./my_requests" class="side-nav-link">
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
                            <a href="./student_application_form" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Initiate Application </span>
                            </a>
                        </li>
                        <?php
                      } else{
                    ?>


                        <li class="side-nav-item">
                            <a href="./home" class="side-nav-link">
                            <i class="ri-dashboard-2-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="./pending_requests" class="side-nav-link">
                            <i class="ri-time-line"></i>

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
                            <a href="./process_requests" class="side-nav-link">
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
                            <a href="./solved_requests" class="side-nav-link">
                            <i class="ri-checkbox-circle-line"></i>

                                <span> Solved Requests </span>
                            </a>
                        </li>

                        <?php
                    }
                    ?>

                        <li class="side-nav-item">
                            <a href="./profile" class="side-nav-link">
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