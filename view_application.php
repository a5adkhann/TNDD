<?php
require_once("./base/header.php");

if (!isset($_SESSION['student_user_email'])) {
    echo "<script>
        location.assign('login');
    </script>";
    exit();
}

if (!isset($_GET['viewapplication'])) {
    echo "<script>
        location.assign('home');
    </script>";
    exit();
}

// Handle application updates
if (isset($_GET['update'])) {
    $updateId = intval($_GET['update']);

    $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Process' WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($update_query);
    $stmt->bind_param('i', $updateId);

    if ($stmt->execute()) {
        echo "<script>
        location.assign('pending_requests');
        </script>";
    }
    $stmt->close();
}

if (isset($_GET['markSolve'])) {
    $updateId = intval($_GET['markSolve']);

    $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Solved' WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($update_query);
    $stmt->bind_param('i', $updateId);

    if ($stmt->execute()) {
        echo "<script>
        location.assign('process_requests');
        </script>";
    }
    $stmt->close();
}

if (isset($_GET['remove'])) {
    $deleteId = intval($_GET['remove']);

    $delete_query = "DELETE FROM `student_applications` WHERE `student_application_id` = ?";
    $stmt = $connection->prepare($delete_query);
    $stmt->bind_param('i', $deleteId);

    if ($stmt->execute()) {
        echo "<script>
            location.assign('pending_requests');
        </script>";
    }
    $stmt->close();
}

?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <?php
if (isset($_GET['viewapplication'])) {
    $updateId = $_GET['viewapplication'];

    // Prepare the query
    $select_query = "SELECT student_applications.*, concern_person.concern_person_designation, 
                     all_subjects.subject_title
                     FROM student_applications
                     INNER JOIN concern_person ON student_applications.student_concern_person_id = concern_person.concern_person_id
                     INNER JOIN all_subjects ON student_applications.student_application_subject_id = all_subjects.subject_id
                     WHERE student_application_id = $updateId";

    // Execute the query
    $execute = mysqli_query($connection, $select_query);

    // Check if the query returned a result
    if ($execute && mysqli_num_rows($execute) > 0) {
        // Fetch the result into an associative array
        $fetch = mysqli_fetch_array($execute);
    } else {
        // Handle the case where no data is returned
        echo "No data found for the specified application ID.";
    }
}
?>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5><strong>To:</strong> <?php echo $fetch['concern_person_designation']; ?></h5>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <h5><strong>Date:</strong> <?php echo $fetch['student_application_date']; ?></h5>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5><strong>Subject:</strong> <?php echo $fetch['subject_title']; ?></h5>
                            </div>

                            <?php
                                if (!empty($fetch['student_application_othersubject'])) { 
                            ?>
                            <div class="mb-4">
                                <h5><strong>Specified Issue:</strong>
                                    <?php echo htmlspecialchars($fetch['student_application_othersubject']); ?></h5>
                            </div>
                            <?php 
                                } 
                            ?>


                            <div class="mb-4">
                                <h5><strong>Message:</strong></h5>
                                <p class="text-muted"><?php echo $fetch['student_application_message']; ?></p>
                            </div>

                            <hr>

                            <h4 class="page-title mt-4">Additional Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Student ID:</strong> <?php echo $fetch['student_id']; ?></h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Student Name:</strong> <?php echo $fetch['student_name']; ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Batch Code:</strong> <?php echo $fetch['student_batch_code']; ?></h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Current Semester:</strong>
                                        <?php echo $fetch['student_current_semester_id']; ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Email Address:</strong> <?php echo $fetch['student_email']; ?></h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6><strong>Cell Phone:</strong> <?php echo $fetch['student_number']; ?></h6>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12 mb-3">
                                    <h6><strong>Token ID:</strong> <?php echo $fetch['student_application_tokenid']; ?>
                                    </h6>
                                </div>
                            </div>

                            <?php
                                if($fetch['student_application_status'] == "Solved" || $fetch['student_application_status'] == "Process"){
                                ?>
                            <div class="row text-center">
                                <div class="col-md-12 mb-3">
                                    <h6><strong>Status:</strong> <span
                                            class="fw-bold badge bg-success-subtle text-success">
                                            <i
                                                class="ri-time-line text-success"></i><?php echo $fetch['student_application_status']?>
                                        </span></h6>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12 mb-3">
                                    <h6><strong>Remarks:</strong>
                                        <?php 
                                        if($fetch['student_application_solutionmessage'] !== NULL){ echo $fetch['student_application_solutionmessage']; } 
                                        else { echo "No Remarks yet"; } 
                                        ?></h6>
                                </div>
                            </div>
                            <?php
                                }
                                ?>


                            <?php
                            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "administrator") {
                                if ($fetch['student_application_status'] == "Pending") {
                                    ?>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&update=<?php echo $fetch['student_application_id']; ?>"
                                class="bg-green-500 px-2 py-1 text-white rounded">Approve</a>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&remove=<?php echo $fetch['student_application_id']; ?>"
                                class="bg-red-500 px-2 py-1 text-white rounded">Reject</a>
                            <?php
                                } elseif ($fetch['student_application_status'] == "Process") {
                                    ?>
                            <a href="?viewapplication=<?php echo $fetch['student_application_id'] ?>&markSolve=<?php echo $fetch['student_application_id']; ?>"
                                class="bg-green-500 px-2 py-1 text-white rounded">Mark as Solved</a>
                            <?php
                                }
                            }
                            ?>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
</div>

<?php
require_once("./base/footer.php");
?>