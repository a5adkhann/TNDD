<?php
require_once("./base/header.php");

if (isset($_GET['update'])) {
    $updateId = intval($_GET['update']); // Sanitize input to prevent SQL injection

    // Update query
    $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Process' WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($update_query); 
    $stmt->bind_param('i', $updateId); 

    if ($stmt->execute()) {
        echo "<script>
        location.assign('pending_requests.php');
        </script>";
    }
    $stmt->close();
}

if (isset($_GET['markSolve'])) {
    $updateId = intval($_GET['markSolve']); // Sanitize input to prevent SQL injection

    // Update query
    $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Solved' WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($update_query); 
    $stmt->bind_param('i', $updateId); 

    if ($stmt->execute()){
        echo "<script>
        location.assign('process_requests.php');
        </script>";
    } 
    $stmt->close();
}


if (isset($_GET['remove'])) {
    $deleteId = $_GET['remove'];
    $delete_query = "DELETE FROM `student_applications` WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($delete_query);

    $stmt->bind_param('i', $deleteId);

    if ($stmt->execute()) {
        echo "<script>
            location.assign('pending_requests.php');
        </script>";
    }
    $stmt->close();
}



?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a class="border-b-2" href="javascript:void(0)" onclick="window.history.back()">Back</a>
                        </div>
                        <h4 class="page-title text-uppercase">Student Application Details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <?php
                            if (isset($_GET['viewapplication'])) {
                                $updateId = $_GET['viewapplication'];
                                $select_query = "SELECT * FROM `student_applications` INNER JOIN `concern_person` INNER JOIN `all_subjects` WHERE `student_application_id` = ?";
                                $stmt = $connection->prepare($select_query);
                                $stmt->bind_param("i", $updateId);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $fetch = $result->fetch_assoc();
                            }
                            ?>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5><strong>To:</strong>
                                        <?php echo $fetch['concern_person_designation'] ?? 'N/A'; ?></h5>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <h5><strong>Date:</strong>
                                        <?php echo $fetch['student_application_date'] ?? 'N/A'; ?></h5>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5><strong>Subject:</strong> <?php echo $fetch['subject_title'] ?? 'N/A'; ?></h5>
                            </div>

                            <div class="mb-4">
                                <h5><strong>Message:</strong></h5>
                                <p class="text-muted"><?php echo $fetch['student_application_message'] ?? 'N/A'; ?></p>
                            </div>

                            <hr>

                            <h4 class="page-title mt-4">Additional Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Student ID:</strong> <?php echo $fetch['student_id'] ?? 'N/A'; ?></h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Student Name:</strong> <?php echo $fetch['student_name'] ?? 'N/A'; ?>
                                    </h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Batch Code:</strong>
                                        <?php echo $fetch['student_batch_code'] ?? 'N/A'; ?></h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Current Semester:</strong>
                                        <?php echo $fetch['student_current_semester_id'] ?? 'N/A'; ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Email Address:</strong> <?php echo $fetch['student_email'] ?? 'N/A'; ?>
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Cell Phone:</strong> <?php echo $fetch['student_number'] ?? 'N/A'; ?>
                                    </h6>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12 mb-3">
                                    <h6><strong>Token ID:</strong>
                                        <?php echo $fetch['student_application_tokenid'] ?? 'N/A'; ?></h6>
                                </div>
                            </div>

                            <?php 
// Sanitize and validate the 'viewapplication' parameter
                        if (isset($_GET['viewapplication'])) {
                            $updateId = intval($_GET['viewapplication']); // Ensure it's an integer

                            // Prepare and execute the query securely
                            $select_query = "SELECT `student_application_status`, `student_application_solutionmessage` 
                                            FROM `student_applications` 
                                            WHERE `student_application_id` = ?";
                            $stmt = $connection->prepare($select_query);
                            $stmt->bind_param('i', $updateId);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $count_records = $result->num_rows;

                            // Check if records exist
                            if ($count_records > 0 && $fetch['student_application_solutionmessage'] !== "") {
                                $fetch = $result->fetch_assoc();
                                ?>
                            <div class="row text-center">
                                <div class="col-md-12 mb-3">
                                    <strong>Status:</strong>
                                    <span class="fw-bold badge bg-success-subtle text-success">
                                        <i class="ri-time-line text-success"></i>
                                        <?php echo htmlspecialchars($fetch['student_application_status']); ?>
                                    </span>
                                    <br>
                                    <strong>Solution Message:</strong>
                                    <p><?php echo htmlspecialchars($fetch['student_application_solutionmessage']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                                } else {
                                    echo "";
                                }

    $stmt->close(); // Close the statement
} else {
    echo "<p>Invalid application ID.</p>";
}
?>


                            <?php
$updateId = $_GET['viewapplication'];
$select_query = "SELECT `student_application_status`, `student_application_id` FROM `student_applications` WHERE `student_application_id` = '$updateId'";
$execute = mysqli_query($connection, $select_query);
$fetch = mysqli_fetch_array($execute);

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "administrator") {
    if ($fetch['student_application_status'] == "Pending") {
        ?>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&update=<?php echo $fetch['student_application_id']?>"
                                class="bg-green-500 px-2 py-1 text-white rounded">Approve</a>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&remove=<?php echo $fetch['student_application_id']?>"
                                class="bg-red-500 px-2 py-1 text-white rounded">Reject</a>
                            <?php
    } elseif ($fetch['student_application_status'] == "Process") {
        ?>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&markSolve=<?php echo $fetch['student_application_id']?>"
                                class="bg-green-500 px-2 py-1 text-white rounded">Mark as Solved</a>
                            <?php
    }
}
?>



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