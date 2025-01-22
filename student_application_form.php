<?php
require_once("./base/header.php");
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
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Validation</li>
                            </ol>
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

                            <form class="needs-validation" novalidate method="POST" action="process.php">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">To</label>
                                            <select class="form-select" name="student_concern_person_id"">
                                                <option value=" ---">---</option>
                                                <?php
                                                 $select_query = "SELECT * FROM `concern_person`";
                                                 $execute = mysqli_query($connection, $select_query);
                                                 while($fetch = mysqli_fetch_array($execute)){
                                                ?>
                                                <option value="<?php echo $fetch['concern_person_id']?>">
                                                    <?php echo $fetch['concern_person_designation']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="valid-feedback">
                                                Select the concern person
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Date</label>
                                            <input type="date" class="form-control" name="student_application_date"
                                                id="validationCustom02" required>
                                            <div class="valid-feedback">
                                                Select Date please
                                            </div>
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
                                                 while($fetch = mysqli_fetch_array($execute)){
                                                ?>
                                        <option value="<?php echo $fetch['subject_id']?>">
                                            <?php echo $fetch['subject_title']?></option>
                                        <?php
                                                }
                                                ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a subject.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom05">Message</label>
                                    <textarea class="form-control" name="student_application_message"
                                        id="validationCustom05" placeholder="Message" required
                                        style="height: 100px; resize: none;"></textarea>

                                    <div class="invalid-feedback">
                                        Provide some message.
                                    </div>
                                </div>

                                <hr>
                                <h4 class="page-title mt-4">Additional Information</h4>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Student ID</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="ex: Student156" name="student_id" required>
                                            <div class="valid-feedback">
                                                Insert Your Student ID
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Student Name</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                name="student_name" required>
                                            <div class="valid-feedback">
                                                Insert Your Name
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Batch Code</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="ex: PR2-202408G" name="student_batch_code" required>
                                            <div class="valid-feedback">
                                                Insert Your Batch Code
                                            </div>
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
                                                 while($fetch = mysqli_fetch_array($execute)){
                                                ?>
                                                <option value="<?php echo $fetch['semester_id']?>">
                                                    <?php echo $fetch['semester_name']?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <div class="valid-feedback">
                                                Select Your Current Semester
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Email Address</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                name="student_email" required>
                                            <div class="valid-feedback">
                                                Insert Your Email
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Cell Ph.</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                name="student_number" required>
                                            <div class="valid-feedback">
                                                Insert Your Number
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-success" name="student_application" value="Submit Application" />
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