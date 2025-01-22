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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Basic Tables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">My Requests</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered border-light table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>To</th>
                                            <th>Subject</th>
                                            <th>Application No.</th>
                                            <th>Date Initiated</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $select_query = "SELECT 
                                    student_applications.student_application_id, 
                                    student_applications.student_application_date, 
                                    student_applications.student_application_status, 
                                    concern_person.concern_person_designation AS concern_person, 
                                    all_subjects.subject_title
                                FROM 
                                    student_applications 
                                INNER JOIN 
                                    concern_person 
                                ON 
                                    student_applications.student_concern_person_id = concern_person.concern_person_id
                                INNER JOIN 
                                    all_subjects 
                                ON 
                                    student_applications.student_application_subject_id = all_subjects.subject_id";
                
                                    $execute = mysqli_query($connection, $select_query);
                                    while($fetch = mysqli_fetch_array($execute)){
                                    ?>
                                        <tr>
                                            <td class="table-user">
                                                <img src="./images/avatar.jpg" alt="table-user"
                                                    class="me-2 rounded-circle" />
                                                <?php echo $fetch['concern_person']?>
                                            </td>
                                            <td><?php echo $fetch['subject_title']?></td>
                                            <td><?php echo $fetch['student_application_id']?></td>
                                            <td><?php echo $fetch['student_application_date']?></td>
                                            <td class="text-center">
                                                <span class="fw-bold badge bg-warning-subtle text-warning"> <i
                                                        class="ri-time-line text-warning"></i><?php echo $fetch['student_application_status']?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                                        class="ri-delete-bin-2-line text-danger"></i></a>

                                                <a href="javascript:void(0);" class="text-reset fs-16 px-1">
                                                    <i class="ri-edit-2-line text-info"></i>
                                                </a>

                                                <a href="javascript:void(0);" class="text-reset fs-16 px-1">
                                                    <i class="ri-eye-line text-primary"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                        
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->
</div>








<?php
require_once("./base/footer.php");
?>