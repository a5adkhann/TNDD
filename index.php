<?php
require_once("./base/header.php");

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
       location.assign('login.php');
    </script>";
}

?>


<style>
    .main-carousel {
    height: 50vh; /* Removed quotes */
    width: 100%;
}
.main-carousel .carousel-cell {
    height: 50vh; /* Removed quotes */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
}

    .apex-charts {
        height: 300px !important; /* Ensure that height is applied */
    }



</style>
<div class="content-page">
    <div class="content">

        <?php
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "administrator"){
                    ?>
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row py-3">
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-pink">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Pending Requests</h6>
                            <h2 class="my-2">
                            <?php
                                $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Pending'";
                                $execute = mysqli_query($connection, $select_query);
                                $fetch = mysqli_num_rows($execute);
                                echo $fetch;
                            ?>
                            </h2>

                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-purple">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-wallet-2-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Process Requests</h6>
                            <h2 class="my-2">
                            <?php
                                $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Process'";
                                $execute = mysqli_query($connection, $select_query);
                                $fetch = mysqli_num_rows($execute);
                                echo $fetch;
                            ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-info">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-shopping-basket-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Solved Requests</h6>
                            <h2 class="my-2">
                            <?php
                                $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Solved'";
                                $execute = mysqli_query($connection, $select_query);
                                $fetch = mysqli_num_rows($execute);
                                echo $fetch;
                            ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-primary">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-shopping-basket-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Total</h6>
                            <h2 class="my-2">
                            <?php
                                $select_query = "SELECT * FROM `student_applications`";
                                $execute = mysqli_query($connection, $select_query);
                                $fetch = mysqli_num_rows($execute);
                                echo $fetch;
                            ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div> <!-- end col-->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button"
                                    aria-expanded="false" aria-controls="weeklysales-collapse"><i
                                        class="ri-subtract-line"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                            </div>
                            <h5 class="header-title mb-0">Weekly Solved Requests</h5>

                            <div id="weeklysales-collapse" class="collapse pt-3 show">
                                <div dir="ltr">
                                    <div id="revenue-chart" class="apex-charts h-64 w-full" data-colors="#3bc0c3,#1a2942,#d1d7d973">
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col">
                                        <p class="text-muted mt-3">Current Week</p>
                                        <h3 class=" mb-0">
                                            <span>$506.54</span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3">Previous Week</p>
                                        <h3 class=" mb-0">
                                            <span>$305.25 </span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3">Conversation</p>
                                        <h3 class=" mb-0">
                                            <span>3.27%</span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3">Customers</p>
                                        <h3 class=" mb-0">
                                            <span>3k</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                    aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                        class="ri-subtract-line"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                            </div>
                            <h5 class="header-title mb-0">Yearly Solved Requests</h5>

                            <div id="yearly-sales-collapse" class="collapse pt-3 show">
                                <div dir="ltr">
                                    <div id="yearly-sales-chart" class="apex-charts"
                                        data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <p class="text-muted mt-3 mb-2">Quarter 1</p>
                                        <h4 class="mb-0">$56.2k</h4>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3 mb-2">Quarter 2</p>
                                        <h4 class="mb-0">$42.5k</h4>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3 mb-2">All Time</p>
                                        <h4 class="mb-0">$102.03k</h4>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h4 class="fs-22 fw-semibold">69.25%</h4>
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> US Dollar
                                        Share</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <div id="us-share-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-12">
                    <!-- Todo-->
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <div class="card-widgets">
                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                        aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                            class="ri-subtract-line"></i></a>
                                    <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                </div>
                                <h5 class="header-title mb-0">Projects</h5>
                            </div>

                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TND Projects</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $indexNo = 1;
                                        $select_query = "SELECT * FROM `tnd_projects` INNER JOIN `all_semesters` LIMIT 4";
                                        $execute = mysqli_query($connection, $select_query);
                                        while($fetch = mysqli_fetch_array($execute)){
?>
                                        <tr>
                                            <td><?php echo $indexNo++?></td>
                                            <td><?php echo $fetch['tnd_project_title']?></td>
                                            <td><span class="badge bg-info-subtle text-info"><?php echo $fetch['semester_name']?></span></td>
                                        </tr>
<?php
    }
?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div>
        <!-- container -->
        <?php
                      } else{
                    ?>

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Basic Tables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Welcome to TND Support System</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                        <div class="carousel-cell" style="background-image: url('./images/slider1.jpg')"></div>
                        <div class="carousel-cell" style="background-image: url('./images/slider2.jpg')"></div>
                        <div class="carousel-cell" style="background-image: url('./images/slider3.jpg')"></div>
                        
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->
        <?php
                      }
                    ?>

    </div>
    <!-- content -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if the success message has already been shown
        if (!localStorage.getItem('successMessageShown')) {
            iziToast.success({
                timeout: 2000,
                icon: 'fa fa-check-circle',
                title: 'Success',
                message: 'You have successfully Logged In',
                position: 'topRight'
            });

            // Set a flag in localStorage to indicate the message has been shown
            localStorage.setItem('successMessageShown', 'true');
        }
    });

    </script>
    <?php
require_once("./base/footer.php");
?>
