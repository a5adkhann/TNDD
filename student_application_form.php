<?php
require_once("./base/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student_application'])) {

    $updateId = $_GET['update'];
    $student_concern_person_id = mysqli_real_escape_string($connection, $_POST['student_concern_person_id']);
    $student_application_date = mysqli_real_escape_string($connection, $_POST['student_application_date']);
    $student_application_subject_id = mysqli_real_escape_string($connection, $_POST['student_application_subject_id']);
    $student_application_message = mysqli_real_escape_string($connection, $_POST['student_application_message']);
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $student_batch_code = mysqli_real_escape_string($connection, $_POST['student_batch_code']);
    $student_current_semester_id = mysqli_real_escape_string($connection, $_POST['student_current_semester_id']);
    $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
    $student_number = mysqli_real_escape_string($connection, $_POST['student_number']);
    $student_user_id = mysqli_real_escape_string($connection, $_SESSION['student_user_id']);


    $update_query = "UPDATE student_applications SET 
    student_concern_person_id = '$student_concern_person_id', 
    student_application_date = '$student_application_date', 
    student_application_subject_id = '$student_application_subject_id', 
    student_application_message = '$student_application_message', 
    student_id = '$student_id', 
    student_name = '$student_name', 
    student_batch_code = '$student_batch_code', 
    student_current_semester_id = '$student_current_semester_id', 
    student_email = '$student_email', 
    student_number = '$student_number',
    student_user_id = '$student_user_id'
WHERE student_application_id = '$updateId'";


    // Execute the query
    if (mysqli_query($connection, $update_query)) {
        echo "<script>
            location.assign('my_requests.php');
        </script>";
        exit; 
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the connection
    mysqli_close($connection);
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
                        <h4 class="page-title text-uppercase">Student Application Form</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <?php
                        if (isset($_GET['update'])) {
                            $updateId = $_GET['update'];
                            $select_query = "SELECT * FROM `student_applications` WHERE `student_application_id` = ?";
                            $stmt = $connection->prepare($select_query);
                            $stmt->bind_param("i", $updateId);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $fetch = $result->fetch_assoc();
                        }
                        ?>

                        <?php
                        if (isset($_GET['update'])) {
                        ?>
                            <form class="needs-validation" novalidate method="POST">
                        <?php
                        } else {
                        ?>
    <form class="needs-validation" novalidate method="POST" action="process.php">
<?php
}
?>


<div class="row mb-3">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom01">To</label>
                <select class="form-select" name="student_concern_person_id">
                    <option value="---">---</option>
                    <?php
                    $select_query = "SELECT * FROM `concern_person`";
                    $execute = mysqli_query($connection, $select_query);
                    while ($row = mysqli_fetch_array($execute)) {
                        $selected = ($row['concern_person_id'] == $fetch['student_concern_person_id']) ? 'selected' : '';
                        echo "<option value='{$row['concern_person_id']}' $selected>{$row['concern_person_designation']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Date</label>
                <input type="date" class="form-control" name="student_application_date"
                       id="validationCustom02" value="<?php echo $fetch['student_application_date'] ?? ''; ?>" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="validationCustom03">Subject</label>
        <select class="form-select" name="student_application_subject_id">
            <option value="---">---</option>
            <?php
            $select_query = "SELECT * FROM `all_subjects`";
            $execute = mysqli_query($connection, $select_query);
            while ($row = mysqli_fetch_array($execute)) {
                $selected = ($row['subject_id'] == $fetch['student_application_subject_id']) ? 'selected' : '';
                echo "<option value='{$row['subject_id']}' $selected>{$row['subject_title']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label" for="validationCustom05">Message</label>
        <textarea class="form-control" name="student_application_message"
                  id="validationCustom05" placeholder="Message" required
                  style="height: 100px; resize: none;"><?php echo $fetch['student_application_message'] ?? ''; ?></textarea>
    </div>

    <hr>
    <h4 class="page-title mt-4">Additional Information</h4>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom01">Student ID</label>
                <input type="text" class="form-control" id="validationCustom01"
                       placeholder="ex: Student156" name="student_id" value="<?php echo $fetch['student_id'] ?? ''; ?>" required>
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Student Name</label>
                <input type="text" class="form-control" id="validationCustom02"
                       name="student_name" value="<?php echo $fetch['student_name'] ?? ''; ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom01">Batch Code</label>
                <input type="text" class="form-control" id="validationCustom01"
                       placeholder="ex: PR2-202408G" name="student_batch_code" value="<?php echo $fetch['student_batch_code'] ?? ''; ?>" required>
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Current Semester</label>
                <select class="form-select" name="student_current_semester_id">
                    <option value="---">---</option>
                    <?php
                    $select_query = "SELECT * FROM `all_semesters`";
                    $execute = mysqli_query($connection, $select_query);
                    while ($row = mysqli_fetch_array($execute)) {
                        $selected = ($row['semester_id'] == $fetch['student_current_semester_id']) ? 'selected' : '';
                        echo "<option value='{$row['semester_id']}' $selected>{$row['semester_name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Email Address</label>
                <input type="text" class="form-control" id="validationCustom02"
                       name="student_email" value="<?php echo $fetch['student_email'] ?? ''; ?>" required>
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Cell Ph.</label>
                <input type="text" class="form-control" id="validationCustom02"
                       name="student_number" value="<?php echo $fetch['student_number'] ?? ''; ?>" required>
            </div>
        </div>
    </div>

            <?php
        if (isset($_GET['update'])) {
        ?>
            <input type="submit" class="btn btn-success" name="update_student_application" value="Make Changes" />
        <?php
        } else {
        ?>
            <input type="submit" class="btn btn-success" name="student_application" value="Submit Application" />
        <?php
        }
        ?>
</form>


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