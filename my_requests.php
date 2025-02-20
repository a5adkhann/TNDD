<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "student"){
    echo "
      <script>location.assign('home');</script>
    ";
}

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
        location.assign('login');
    </script>";
}

if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $delete_query = "DELETE FROM `student_applications` WHERE `student_application_id` = $deleteId";

    if (mysqli_query($connection, $delete_query)) {
        echo "<script>
        const url = new URL(window.location.href);
        url.searchParams.delete('delete');
        history.replaceState(null, '', url);
        </script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
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
                            <?php
                    // Number of records per page
                    $records_per_page = 10;

                    // Get the current page from the URL, default to 1 if not set
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                    // Calculate the offset for the SQL query
                    $offset = ($page - 1) * $records_per_page;

                    // Modify your query to limit the records based on the offset and records per page
                    $select_query = "SELECT 
                    student_applications.student_application_id, 
                    student_applications.student_application_tokenid,
                    student_applications.student_application_date, 
                    student_applications.student_application_status, 
                    student_applications.student_application_message, 
                    student_applications.student_application_othersubject, 
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
                    student_applications.student_application_subject_id = all_subjects.subject_id 
                WHERE `student_user_id` = $_SESSION[student_user_id]
                LIMIT $offset, $records_per_page";
                
$execute = mysqli_query($connection, $select_query);
?>


<table class="table table-bordered border-light table-centered mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>To</th>
            <th>Subject</th>
            <th>Specified Issue</th>
            <th>Message</th>
            <th>Application Token No.</th>
            <th>Date Initiated</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($fetch = mysqli_fetch_array($execute)) { ?>
        <tr>
            <td><?php echo $fetch['student_application_id']; ?></td>
            <td class="table-user">
                <img src="./images/avatar.jpg" alt="table-user" class="me-2 rounded-circle" />
                <?php echo $fetch['concern_person']; ?>
            </td>
            <td><?php echo $fetch['subject_title']; ?></td>

            <td>
                <?php echo !empty($fetch['student_application_othersubject']) ? $fetch['student_application_othersubject'] : "---"; ?>
            </td>

            <td>
                <?php 
                $message = $fetch['student_application_message'];
                echo substr($message, 0, 10) . (strlen($message) > 10 ? "..." : ""); 
                ?>
            </td>
            <td>TND<?php echo $fetch['student_application_tokenid']; ?></td>
            <td><?php echo $fetch['student_application_date']; ?></td>
            
            <td class="text-center">
                <?php 
                $status = $fetch['student_application_status'];
                $status_classes = [
                    "Pending" => "bg-warning-subtle text-warning",
                    "Process" => "bg-info-subtle text-info",
                    "Solved" => "bg-success-subtle text-success",
                    "Rejected" => "bg-danger-subtle text-danger"
                ];
                ?>
                <span class="fw-bold badge <?php echo $status_classes[$status] ?? 'bg-secondary'; ?>">
                    <i class="ri-time-line <?php echo $status_classes[$status] ?? 'text-secondary'; ?>"></i>
                    <?php echo $status; ?>
                </span>
            </td>

            <td class="text-center">
                <a href="?delete=<?php echo $fetch['student_application_id']; ?>" class="text-sm fs-18 px-1">
                    <i class="ri-delete-bin-2-line text-red-500"></i>
                </a>
                <?php if (!in_array($status, ["Solved", "Process", "Rejected"])) { ?>
                <a href="./student_application_form?update=<?php echo $fetch['student_application_id']; ?>" class="text-reset fs-18 px-1" title="Edit">
                    <i class="fas text-sm fa-pen text-blue-500"></i>
                </a>
                <?php } ?>
                <a href="view_application?viewapplication=<?php echo $fetch['student_application_id']; ?>">
                    <i class="ri-eye-line fs-18 text-yellow-500"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php
// Get the total number of records
$total_query = "SELECT COUNT(*) FROM `student_applications` WHERE `student_user_id` = $_SESSION[student_user_id]";
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

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
$('#successClick').click(function() {
    iziToast.success({
        timeout: 5000,
        icon: 'fa fa-chrome',
        title: 'OK',
        message: 'iziToast.sucess() with custom icon!'
    });
}); // ! .click
</script>



<?php
require_once("./base/footer.php");
?>