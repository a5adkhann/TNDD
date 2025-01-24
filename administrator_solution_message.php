<?php
require_once("./base/header.php");

if (isset($_GET['markSolve'])) {
    // Validate and sanitize the markSolve parameter
    $updateId = isset($_GET['markSolve']) ? intval($_GET['markSolve']) : 0;

    if ($updateId > 0) {
        // Prepared statement to safely update the status
        $update_query = "UPDATE `student_applications` SET `student_application_status` = 'Solved' WHERE `student_application_id` = ?";
        $stmt = $connection->prepare($update_query);
        $stmt->bind_param('i', $updateId);

        if ($stmt->execute()) {
            echo "<script>
            location.assign('process_requests.php');
            </script>";
        } else {
            // Handle failure to execute the query
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }
}

if (isset($_POST['savemessage'])) {
    // Validate and sanitize the message ID and the solution message
    $messageId = isset($_GET['messageId']) ? intval($_GET['messageId']) : 0;
    $administrator_solution_message = isset($_POST['administrator_solution_message']) ? trim($_POST['administrator_solution_message']) : '';

    if ($messageId > 0 && !empty($administrator_solution_message)) {
        // Prepared statement for the update
        $update_query = "UPDATE `student_applications` SET `student_application_solutionmessage` = ? WHERE `student_application_id` = ?";
        $stmt = $connection->prepare($update_query);
        $stmt->bind_param('si', $administrator_solution_message, $messageId);

        if ($stmt->execute()) {
            // Optionally handle success or redirect here
            echo "Message updated successfully!";
        } else {
            // Handle failure to execute the query
            echo "Error updating solution message: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error handling for invalid input
        echo "Please provide both a valid message ID and a solution message.";
    }
}

?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <form method="POST" class="py-10">
                <textarea class="form-control" name="administrator_solution_message" id="validationCustom05"
                    placeholder="Leave a message(Optional)" required
                    style="height: 100px; resize: none;"><?php echo htmlspecialchars($fetch['student_application_message'] ?? '', ENT_QUOTES); ?></textarea>
                <input class="bg-blue-500 text-white px-2 py-1 rounded mt-2" type="submit" value="Save Message" name="savemessage">
            </form>

            <a href="?markSolve=<?php echo urlencode($_GET['messageId']) ?>"
                class="bg-green-500 px-4 py-2 text-white rounded text-center sm:px-6 sm:py-3 md:px-8 md:py-4">
                Mark as Solved
            </a>

        </div>
    </div>
</div>

<?php
require_once("./base/footer.php");
?>
