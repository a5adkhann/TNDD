<?php
require_once("./base/header.php")
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
                                <h4 class="page-title text-uppercase">Project Application Form</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row mb-3">
                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">To</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="First name" value="Mark" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Date</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Last name" value="Otto" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>  
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">Subject</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                placeholder="Subject" required>
                                            <div class="invalid-feedback">
                                                Please provide a subject.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom05">Message</label>
                                            <textarea class="form-control" id="validationCustom05"
                                            placeholder="Zip" required></textarea>
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
                                                placeholder="First name" value="Mark" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Student Name</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Last name" value="Otto" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>  
                                        </div>

                                        <div class="row">
                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Batch Code</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="First name" value="Mark" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Current Semester</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Last name" value="Otto" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>  
                                        </div>

                                        <div class="row">
                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Book Name</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="First name" value="Mark" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Cell Ph.</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Last name" value="Otto" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        </div>  
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="invalidCheck"
                                                    required>
                                                <label class="form-check-label form-label" for="invalidCheck">Agree to
                                                    terms
                                                    and conditions</label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

         <?php
         require_once("./base/footer.php");
         ?>