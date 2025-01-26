<?php
require_once("./base/header.php");

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] !== "administrator"){
    echo "<script>
       location.assign('index.php');
    </script>";
}

if(!isset($_SESSION['student_user_email'])){
    echo "<script>
        location.assign('login.php');
    </script>";
}

if (isset($_GET['markSolve'])) {
    $updateId = intval($_GET['markSolve']); // Ensure it’s an integer

    if ($updateId > 0) {
        // Update query
        $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Solved' WHERE `student_application_id` = $updateId";

        if (mysqli_query($connection, $update_query)) {
            echo "<script>
            location.assign('process_requests.php');
            </script>";
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    }
}

if (isset($_POST['savemessage'])) {
    $messageId = intval($_GET['messageId']);
    $administrator_solution_message = trim($_POST['administrator_solution_message']);

    if ($messageId > 0 && !empty($administrator_solution_message)) {
        $update_query = "UPDATE `student_applications` SET `student_application_solutionmessage` = '$administrator_solution_message' WHERE `student_application_id` = $messageId";

        if (mysqli_query($connection, $update_query)) {
            echo "Message updated successfully!";
        } else {
            echo "Error updating solution message: " . mysqli_error($connection);
        }
    } else {
        echo "Please provide both a valid message ID and a solution message.";
    }
}
?>


?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

        <form method="POST" class="py-10">
    <?php
    // Get the existing solution message from the database (if any)
    $messageId = isset($_GET['messageId']) ? intval($_GET['messageId']) : 0;
    $fetchMessage = ''; // Default value for the message
    
    if ($messageId > 0) {
        $select_query = "SELECT `student_application_solutionmessage` FROM `student_applications` WHERE `student_application_id` = $messageId";
        $execute = mysqli_query($connection, $select_query);
        $fetch = mysqli_fetch_array($execute);
        $fetchMessage = !empty($fetch['student_application_solutionmessage']) ? htmlspecialchars($fetch['student_application_solutionmessage'], ENT_QUOTES) : '';
    }
    ?>
    
    <!-- Textarea for Solution Message -->
    <textarea class="form-control" name="administrator_solution_message" id="validationCustom05" placeholder="Leave a message (Optional)" required style="height: 100px; resize: none;"><?php echo $fetchMessage; ?></textarea>

    <!-- Submit Button -->
    <input class="bg-blue-500 shadow-lg text-white px-2 py-1 rounded mt-2" type="submit" value="Save Message" name="savemessage">
</form>


            <a href="?markSolve=<?php echo urlencode($_GET['messageId']) ?>"
                class="bg-green-500 shadow-lg px-4 py-2 text-white rounded text-center sm:px-6 sm:py-3 md:px-8 md:py-4">
                Mark as Solved
            </a>

        </div>
    </div>
</div>

<?php
require_once("./base/footer.php");
?>
