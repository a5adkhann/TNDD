<?php
require_once("./base/header.php");

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
       location.assign('login');
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
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "administrator") {
?>
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row py-3">
                <?php
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
                    <!-- Projects Table-->
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
                    </div>
                </div>
            </div>
        </div>
        <?php
} else if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "student") {
?>
        <!-- Student Section -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="flex flex-wrap flex-col lg:flex-row-reverse justify-between py-4">
                        <h2 class="page-title w-full lg:w-auto">TND Support System</h2>
                        <h2 class="page-title w-full lg:w-auto">Welcome
                            <?php echo $_SESSION['student_user_name']?></h2>
                    </div>
                </div>

            </div>

            <div class="row py-3">
                <div class="col-lg-12">
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
                </div>

                <!-- Workshop Schedule -->
                <div class="col-lg-12">
                    <div class="text-center py-4 px-6">
                        <h2 class="text-xl text-[#1A2942] sm:text-2xl font-bold mb-4">Contact Us</h2>
                        <p class="mb-2">Reach us at <u
                                class="text-blue-400 underline">sfcprojectdepartment@gmail.com</u></p>
                        <p class="mb-2">📍: 30-A, Progressive Center, Suite # 202-203, Main Shahra-e-Faisal,
                            Karachi</p>
                        <p>📞 +92 3082709968</p>
                    </div>
                </div>
            </div>
        </div>
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