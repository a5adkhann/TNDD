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

?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="card shadow-lg rounded-lg">
                        <div class="card-body">

                            <h3 class="text-center mb-4">Your Token ID</h3>

                            <!-- Token Display Section -->
                            <div class="text-center">
                                <div class="alert alert-success d-flex align-items-center justify-content-center p-4">
                                    <i class="fa fa-check-circle me-3"></i>
                                    <span id="token-display" style="font-size: 1.5rem;">
                                        <?php 
    // Query to fetch the most recent token ID
    $select_query = "SELECT `student_application_tokenid` FROM `student_applications` ORDER BY `student_application_id` DESC LIMIT 1";
    
    // Execute the query
    $execute = mysqli_query($connection, $select_query);
    
    if ($execute) {
        $fetch = mysqli_fetch_array($execute);
        
        // Check if a token was fetched
        if (!empty($fetch['student_application_tokenid'])) {
            // Display the fetched token ID
            echo "<span>" . htmlspecialchars($fetch['student_application_tokenid'], ENT_QUOTES, 'UTF-8') . "</span>";
        } else {
            echo "<span>No token found</span>";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    ?>
                                    </span>

                                </div>
                            </div>

                            <!-- Success message -->
                            <div id="success-message" class="text-center mt-4" style="display:none;">
                                <p class="text-success font-weight-bold">Your Token ID has been successfully generated!
                                </p>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Display Success Toast Message
    iziToast.success({
        timeout: 5000,
        icon: 'fa fa-check-circle',
        title: 'Success',
        message: 'Your Token ID has been generated',
        position: 'bottomRight'
    });

    // Show success message after the token ID is displayed
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'block';
    }, 3000); // Delay success message after 3 seconds
});
</script>

<?php
require_once("./base/footer.php");
?>