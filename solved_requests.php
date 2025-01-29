<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "administrator"){
    echo "<script>
       location.assign('home');
    </script>";
}

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
        location.assign('login');
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
        location.assign('process_requests');
        </script>";
    } 
    $stmt->close();
}

if (isset($_GET['clearAll'])) {
    $delete_query = "DELETE FROM `student_applications` WHERE `student_application_status` IN ('Solved', 'Rejected')";
    $stmt = $connection->prepare($delete_query); 

    if ($stmt->execute()) {
        echo "<script>
        // Remove the 'delete' query parameter from the URL
        const url = new URL(window.location.href);
        url.searchParams.delete('clearAll');
        history.replaceState(null, '', url);
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
                        <h4 class="page-title">Solved Requests</h4>
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
                                    <?php
                                    $select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Solved'";
                                    $execute = mysqli_query($connection, $select_query);
                                    $count_records = mysqli_num_rows($execute);
                                    if($count_records > 0){
                                    ?>
                                    <a class="bg-red-600 px-2 py-1 text-white rounded" href="?clearAll">Clear All</a>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <?php
// Number of records per page
$records_per_page = 10;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $records_per_page;

// Modify your query to limit the records based on the offset and records per page
$select_query = "SELECT * FROM `student_applications` WHERE `student_application_status` = 'Solved' LIMIT $offset, $records_per_page";
$execute = mysqli_query($connection, $select_query);

$count_records = mysqli_num_rows($execute);
if($count_records > 0){
?>

<input type="text" id="searchSolved" placeholder="Search by Name or Token ID" 
    class="border border-gray-300 focus:border-[#1A2942] focus:ring-1 focus:ring-[#1A2942] p-2 mb-2 w-full focus:outline-none">
<?php
}
?>


<table class="table table-bordered table-centered mb-0" id="data-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Std ID</th>
            <th>Application Token ID</th>
            <th>Application Message</th>
            <th>Date Generated</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $indexNo = 1 + $offset; // Start index based on the offset
        while($fetch = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?php echo $indexNo++?></td>
            <td class="table-user">
                <?php echo $fetch['student_id']?>
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

<?php
// Get the total number of records
$total_query = "SELECT COUNT(*) FROM `student_applications` WHERE `student_application_status` = 'Solved'";
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).ready(function () {
    $("#searchSolved").on("keyup", function () {
        var query = $(this).val();
        $.ajax({
            url: "search", // The PHP script that will process the search
            method: "POST",
            data: { searchSolved: query },
            success: function (data) {
                $("#data-table tbody").html(data); // Update table content dynamically
            }
        });
    });
});
    </script>

<?php
    require_once("./base/footer.php");
    ?>