<?php
require_once("./base/header.php");

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
       location.assign('login.php');
    </script>";
}
?>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">

<style>
.main-carousel {
    height: 50vh;
    /* Removed quotes */
    width: 100%;
}

.main-carousel .carousel-cell {
    height: 50vh;
    /* Removed quotes */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
}

.apex-charts {
    height: 300px !important;
    /* Ensure that height is applied */
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
                <?php
    // Fetch the total number of requests
    $select_total_query = "SELECT COUNT(*) AS total FROM `student_applications`";
    $total_result = mysqli_query($connection, $select_total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_requests = $total_row['total'];

    // Helper function to calculate percentage
    function calculate_percentage($count, $total) {
        return $total > 0 ? round(($count / $total) * 100, 2) : 0;
    }
    ?>

                <!-- Pending Requests -->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-pink">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Pending Requests</h6>
                            <h2 class="my-2">
                                <?php
                    $pending_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Pending'";
                    $pending_result = mysqli_query($connection, $pending_query);
                    $pending_row = mysqli_fetch_assoc($pending_result);
                    $pending_count = $pending_row['count'];
                    echo $pending_count;
                    ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-10 me-1">
                                    <?= calculate_percentage($pending_count, $total_requests); ?>%
                                </span>
                                <span class="text-nowrap">of total requests</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Process Requests -->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-purple">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-wallet-2-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Process Requests</h6>
                            <h2 class="my-2">
                                <?php
                    $process_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Process'";
                    $process_result = mysqli_query($connection, $process_query);
                    $process_row = mysqli_fetch_assoc($process_result);
                    $process_count = $process_row['count'];
                    echo $process_count;
                    ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-10 me-1">
                                    <?= calculate_percentage($process_count, $total_requests); ?>%
                                </span>
                                <span class="text-nowrap">of total requests</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Solved Requests -->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-info">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-shopping-basket-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Solved Requests</h6>
                            <h2 class="my-2">
                                <?php
                    $solved_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Solved'";
                    $solved_result = mysqli_query($connection, $solved_query);
                    $solved_row = mysqli_fetch_assoc($solved_result);
                    $solved_count = $solved_row['count'];
                    echo $solved_count;
                    ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-25 me-1">
                                    <?= calculate_percentage($solved_count, $total_requests); ?>%
                                </span>
                                <span class="text-nowrap">of total requests</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Requests -->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-primary">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-shopping-basket-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Total Requests</h6>
                            <h2 class="my-2">
                                <?= $total_requests; ?>
                            </h2>
                            <p class="mb-0">
                                <span class="badge bg-white bg-opacity-25 me-1">Total</span>
                                <span class="text-nowrap">Requests</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                    aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                        class="ri-subtract-line"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                            </div>
                            <h5 class="header-title mb-0">Monthly Solved Requests</h5>

                            <div style="width: 80%; margin: auto;">
                                <canvas id="yearlySolvedRequestsChart"></canvas>
                            </div>

                            <script>
                            // Fetching PHP data dynamically and inserting it into JavaScript
                            const pendingRequests = <?php
                    $select_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Pending'";
                    $execute = mysqli_query($connection, $select_query);
                    $data = mysqli_fetch_assoc($execute);
                    echo $data['count'];
                    ?>;

                            const processRequests = <?php
                    $select_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Process'";
                    $execute = mysqli_query($connection, $select_query);
                    $data = mysqli_fetch_assoc($execute);
                    echo $data['count'];
                    ?>;

                            const solvedRequests = <?php
                    $select_query = "SELECT COUNT(*) AS count FROM `student_applications` WHERE `student_application_status` = 'Solved'";
                    $execute = mysqli_query($connection, $select_query);
                    $data = mysqli_fetch_assoc($execute);
                    echo $data['count'];
                    ?>;

                            const totalRequests = <?php
                    $select_query = "SELECT COUNT(*) AS count FROM `student_applications`";
                    $execute = mysqli_query($connection, $select_query);
                    $data = mysqli_fetch_assoc($execute);
                    echo $data['count'];
                    ?>;

                            const yearlyData = {
                                labels: ['Pending', 'Process', 'Solved', 'Total'],
                                datasets: [{
                                    label: 'Requests',
                                    data: [pendingRequests, processRequests, solvedRequests, totalRequests],
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 2,
                                    tension: 0.4, // Smoothness of the line
                                    fill: true // Adds a background fill below the line
                                }]
                            };

                            const yearlyConfig = {
                                type: 'line',
                                data: yearlyData,
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            display: true,
                                            position: 'top',
                                        },
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                precision: 0 // Ensures whole numbers on the Y-axis
                                            }
                                        }
                                    }
                                }
                            };

                            var yearlyCtx = document.getElementById('yearlySolvedRequestsChart').getContext('2d');
                            var yearlyChart = new Chart(yearlyCtx, yearlyConfig);
                            </script>
                        </div>
                    </div>
                </div>
            </div>


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
                                        $select_query = "SELECT * FROM tnd_projects INNER JOIN all_semesters ON tnd_projects.tnd_project_semester_id = all_semesters.semester_id";
                                        $execute = mysqli_query($connection, $select_query);
                                        while($fetch = mysqli_fetch_array($execute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $indexNo++?></td>
                                            <td><?php echo $fetch['tnd_project_name']?></td>
                                            <td><span
                                                    class="badge bg-info-subtle text-info"><?php echo $fetch['semester_name']?></span>
                                            </td>
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
                <div class="col-12 flex flex-col sm:flex-row justify-between items-center sm:space-x-4">
                    <!-- Left Side -->
                    <div class="page-title-box mb-4 sm:mb-0">
                        <h4 class="page-title text-xl text-[#1A2942] font-bold sm:text-2xl lg:text-3xl"
                            style="font-family: 'Lexend Giga', serif;">
                            Welcome <?php echo $_SESSION['student_user_name']; ?>
                        </h4>
                    </div>
                    <!-- Right Side -->
                    <div class="page-title-box">
                        <h4 class="page-title text-xl text-[#1A2942] font-bold sm:text-2xl lg:text-3xl"
                            style="font-family: 'Lexend Giga', serif;">
                            TND Support System
                        </h4>
                    </div>
                </div>
            </div>



            <!-- start content -->
            <div class="row">
                <div class="col-12">

                    <!-- About Section -->
                    <section class="px-6 sm:px-10 lg:px-20 py-10 fade-on-scroll">
                        <div class="text-area">
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1A2942] mb-4">Aptech TND
                                Department</h1>
                            <p class="text-gray-600 text-base sm:text-lg md:text-xl leading-relaxed">
                                The Training and Development (TND) Department at Aptech plays a pivotal role in
                                nurturing talent and fostering innovation. As the backbone of Aptech's educational
                                success, the TND Department is committed to designing, developing, and delivering
                                top-quality technical courses that align with global industry standards.
                            </p>
                        </div>
                    </section>

                    <!-- Card Section -->
                    <section class="card-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 py-6">
                        <div
                            class="card h-[600px] rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="./images/workshop-calender.jpeg"
                                    class="w-full h-[450px] object-fill rounded-md mb-4" alt="Workshop Schedule">
                            </div>
                            <h3 class="text-xl font-semibold text-[#1A2942]">Workshop Schedule</h3>
                            <p class="text-gray-600 mt-2">Check out the upcoming workshops to enhance your skills.</p>
                        </div>

                        <div
                            class="card h-[600px] rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="./images/project-month.jpeg"
                                    class="w-full h-[450px] object-fill rounded-md mb-4" alt="Project of the Month">
                            </div>
                            <h3 class="text-xl font-semibold text-[#1A2942]">Project of the Month</h3>
                            <p class="text-gray-600 mt-2">Discover the most innovative project created this month.</p>
                        </div>

                        <div
                            class="card h-[600px] rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-semibold text-[#1A2942]">Presentation Date</h3>
                            <p class="text-gray-600 mt-2">Don't miss the next presentation. Check the schedule here.</p>
                        </div>

                        <div
                            class="card h-[600px] rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-semibold text-[#1A2942]">Rules for Presentation</h3>
                            <p class="text-gray-600 mt-2">Learn about the guidelines to ace your presentation.</p>
                        </div>

                    </section>

                    <!-- Contact Section -->
                    <div class="text-gray-600 text-center py-4 px-6">
                        <h2 class="text-xl sm:text-2xl font-bold mb-4">Contact Us</h2>
                        <p class="mb-2">Reach us at <u
                                class="text-blue-400 underline">sfcprojectdepartment@gmail.com</u></p>
                        <p class="mb-2">📍: 30-A, Progressive Center, Suite # 202-203, Main Shahra-e-Faisal,
                            Karachi</p>
                        <p>📞 +92 3082709968</p>
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
</div>
</div>

<?php
require_once("./base/footer.php");
?>