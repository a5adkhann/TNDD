<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "administrator"){
    echo "<script>
       location.assign('index.php');
    </script>";
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
                                <?php
// Number of records per page
$records_per_page = 10;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $records_per_page;

// Modify your query to limit the records based on the offset and records per page
$select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Process' LIMIT $offset, $records_per_page";
$execute = mysqli_query($connection, $select_query);
?>

                                <table class="table table-bordered table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Std Name</th>
                                            <th>Application Token ID</th>
                                            <th>Application Message</th>
                                            <th>Date Generated</th>
                                            <th>Review</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($fetch = mysqli_fetch_array($execute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $fetch['student_application_id']?></td>
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
                                            <td class="text-center">
                                                <a href="view_application.php?viewapplication=<?php echo $fetch['student_application_id']?>">
                                                    <i class="ri-eye-line text-yellow-500 shadow-lg"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="./administrator_solution_message.php?messageId=<?php echo $fetch['student_application_id']?>">Add Remarks</a>
                                            </td>
                                        </tr>
                                        <?php
        }
        ?>
                                    </tbody>
                                </table>

                                <?php
// Get the total number of records
$total_query = "SELECT COUNT(*) FROM `student_applications` WHERE `student_application_status` = 'Process'";
$total_result = mysqli_query($connection, $total_query);
$total_records = mysqli_fetch_array($total_result)[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Pagination links
echo '<div class="pagination">';
if ($page > 1) {
    echo '<a href="?page=' . ($page - 1) . '">&laquo; Previous</a>';
}
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href="?page=' . $i . '"' . ($i == $page ? ' class="active"' : '') . '>' . $i . '</a>';
}
if ($page < $total_pages) {
    echo '<a href="?page=' . ($page + 1) . '">Next &raquo;</a>';
}
echo '</div>';
?>

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