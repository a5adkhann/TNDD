<?php
require_once("./database/db_connection.php");


if (isset($_POST['student_application'])) {
    $student_concern_person_id = mysqli_real_escape_string($connection, $_POST['student_concern_person_id']);
    $student_application_date = mysqli_real_escape_string($connection, $_POST['student_application_date']);
    $student_application_subject_id = mysqli_real_escape_string($connection, $_POST['student_application_subject_id']);
    $student_application_message = mysqli_real_escape_string($connection, $_POST['student_application_message']);
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $student_batch_code = mysqli_real_escape_string($connection, $_POST['student_batch_code']);
    $student_current_semester_id = mysqli_real_escape_string($connection, $_POST['student_current_semester_id']);
    $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
    $student_number = mysqli_real_escape_string($connection, $_POST['student_number']);

    // Define the insert query
    $insert_query = "INSERT INTO student_applications (
                        student_concern_person_id, 
                        student_application_date, 
                        student_application_subject_id, 
                        student_application_message, 
                        student_id, 
                        student_name, 
                        student_batch_code, 
                        student_current_semester_id, 
                        student_email, 
                        student_number
                    ) VALUES (
                        '$student_concern_person_id', 
                        '$student_application_date', 
                        '$student_application_subject_id', 
                        '$student_application_message', 
                        '$student_id', 
                        '$student_name', 
                        '$student_batch_code', 
                        '$student_current_semester_id', 
                        '$student_email', 
                        '$student_number'
                    )";

    if (mysqli_query($connection, $insert_query)) {
        header("location: student_application_token.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid request method.";
}
?>


