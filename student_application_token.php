<?php
require_once("./base/header.php");
?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <p>Your Token ID is: TND<?php 
                                $select_query = "SELECT student_application_id 
                                                FROM `student_applications` 
                                                ORDER BY student_application_id DESC 
                                                LIMIT 1"; // Fetch the latest record
                                $execute = mysqli_query($connection, $select_query);
                                $fetch = mysqli_fetch_array($execute); // Fetch the single row
                                echo "<span>{$fetch['student_application_id']}</span>"; // Display the ID
    ?>
                            </p>


                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
</div>

<?php
require_once("./base/footer.php");
?>