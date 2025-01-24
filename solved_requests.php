<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "administrator"){
    echo "<script>
       location.assign('index.php');
    </script>";
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

if (isset($_GET['clearAll'])) {
    $delete_query = "DELETE FROM `student_applications` WHERE `student_application_status` = 'Solved'";
    $stmt = $connection->prepare($delete_query); 

    if ($stmt->execute()){
        echo "<script>
        location.assign('solved_requests.php');
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
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Basic Tables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Process Requests</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <div class="clear-all-btn-div mb-3 flex justify-end">
                                    <a class="bg-red-600 px-2 py-1 text-white rounded" href="?clearAll">Clear All</a>
                                </div>
                                <table class="table table-bordered table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Name</th>
                                            <th>Application Token ID</th>
                                            <th>Application Message</th>
                                            <th>Date Generated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $indexNo = 1;
                                        $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Solved'";
                                        $execute = mysqli_query($connection, $select_query);
                                        while($fetch = mysqli_fetch_array($execute)){
                                    ?>
                                        <tr>
                                            <td><?php echo $indexNo++?></td>
                                            <td class="table-user">
                                                <?php echo $fetch['student_name']?>
                                            </td>
                                            <td><?php echo $fetch['student_application_tokenid']?></td>
                                            <td>
                                                <?php 
                                                $student_application_message = $fetch['student_application_message'];
                                                $short_student_application_message = substr($student_application_message, 0, 50);
                                                echo $short_student_application_message.(strlen($student_application_message) > 50 ? "..." : "")    
                                                ?>
                                            </td>
                                            <td><?php echo $fetch['student_application_date']?></td>
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