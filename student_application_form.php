<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "student"){
    echo "<script>
       location.assign('home');
    </script>";
}

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
        location.assign('login');
    </script>";
}

if (isset($_POST['update_student_application'])) {
    $updateId = $_GET['update'];
    $student_concern_person_id = $_POST['student_concern_person_id'];
    $student_application_date = $_POST['student_application_date'];
    $student_application_subject_id = $_POST['student_application_subject_id'];
    $student_application_message = $_POST['student_application_message'];
    $student_application_othersubject = $_POST['student_application_othersubject'];
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_batch_code = $_POST['student_batch_code'];
    $student_current_semester_id = $_POST['student_current_semester_id'];
    $student_email = $_POST['student_email'];
    $student_number = $_POST['student_number'];
    $student_user_id = $_SESSION['student_user_id'];

    $query = "UPDATE student_applications SET 
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
        student_user_id = '$student_user_id',
        student_application_othersubject = '$student_application_othersubject'
    WHERE student_application_id = '$updateId'";

    if (mysqli_query($connection, $query)) {
        echo "<script>location.assign('my_requests');</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($connection);
    }

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
                        <h4 class="page-title">Student Application Form</h4>
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
                            $select_query = "SELECT * FROM `student_applications` WHERE `student_application_id` = $updateId";
                            $result = mysqli_query($connection, $select_query);
                            $fetch = mysqli_fetch_assoc($result);
                        }
                        ?>


                        <?php
                        if (isset($_GET['update'])) {
                        ?>
                            <form class="needs-validation" novalidate method="POST">
                        <?php
                        } else {
                        ?>
    <form class="needs-validation" novalidate method="POST" action="process">
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
<!-- Dropdown -->
<select name="student_application_subject_id" id="subjectDropdown" class="form-select" onchange="handleDropdownChange()">
    <option value="" disabled selected>Select a subject</option>
    <?php
    $select_query = "SELECT * FROM `all_subjects`";
    $execute = mysqli_query($connection, $select_query);
    while ($row = mysqli_fetch_array($execute)) {
        $selected = ($row['subject_id'] == $fetch['student_application_subject_id']) ? 'selected' : '';
        echo "<option value='{$row['subject_id']}' $selected>{$row['subject_title']}</option>";
    }
    ?>
</select>


<!-- Hidden Input Field -->
<div id="otherSubjectContainer" class="mt-3 hidden">
    <label class="form-label" for="otherSubject">Please Specify</label>
    <input 
        type="text" 
        name="student_application_othersubject" 
        id="otherSubject" 
        class="form-control" 
        placeholder="Write your issue here">
</div>

<!-- JavaScript for Toggling Input Field -->
<script>
    function handleDropdownChange() {
        const dropdown = document.getElementById('subjectDropdown');
        const otherSubjectContainer = document.getElementById('otherSubjectContainer');
        const otherSubjectInput = document.getElementById('otherSubject');

        // Check if the selected option has the value corresponding to "Others"
        const selectedOption = dropdown.options[dropdown.selectedIndex].text.toLowerCase();
        if (selectedOption === 'others') {
            otherSubjectContainer.classList.remove('hidden');
            otherSubjectInput.required = true; // Make the field required
        } else {
            otherSubjectContainer.classList.add('hidden');
            otherSubjectInput.required = false; // Remove required attribute
            otherSubjectInput.value = ''; // Clear input field
        }
    }
</script>

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