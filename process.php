<?php
require_once("./db/db_connection.php");

function generateTokenID() {
    return 'TND' . strtoupper(bin2hex(random_bytes(4)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_application'])) {
    $student_concern_person_id = $_POST['student_concern_person_id'];
    $student_application_date = $_POST['student_application_date'];

    $student_application_subject_id = isset($_POST['student_application_subject_id']) ? $_POST['student_application_subject_id'] : NULL;
    $student_application_othersubject = !empty($_POST['student_application_othersubject']) ? mysqli_real_escape_string($connection, $_POST['student_application_othersubject']) : NULL;
    $student_application_message = mysqli_real_escape_string($connection, $_POST['student_application_message']);
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $student_batch_code = mysqli_real_escape_string($connection, $_POST['student_batch_code']);
    $student_current_semester_id = mysqli_real_escape_string($connection, $_POST['student_current_semester_id']);
    $student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
    $student_number = mysqli_real_escape_string($connection, $_POST['student_number']);
    $student_user_id = $_SESSION['student_user_id'];

    // Generate a unique token
    $token_id = generateTokenID();

    // SQL Query to handle both subject ID and "Others" field
    $insert_query = "INSERT INTO student_applications (
                        student_concern_person_id, 
                        student_application_date, 
                        student_application_subject_id, 
                        student_application_othersubject,
                        student_application_message, 
                        student_id, 
                        student_name, 
                        student_batch_code, 
                        student_current_semester_id, 
                        student_email, 
                        student_number,
                        student_user_id,
                        student_application_tokenid
                    ) VALUES (
                        '$student_concern_person_id', 
                        '$student_application_date', 
                        ". ($student_application_subject_id ? "'$student_application_subject_id'" : "NULL") .", 
                        ". ($student_application_othersubject ? "'$student_application_othersubject'" : "NULL") .", 
                        '$student_application_message', 
                        '$student_id', 
                        '$student_name', 
                        '$student_batch_code', 
                        '$student_current_semester_id', 
                        '$student_email', 
                        '$student_number',
                        '$student_user_id',
                        '$token_id'
                    )";

    // Execute the query
    if (mysqli_query($connection, $insert_query)) {
        unset($_SESSION['token_id']); // Clear the token from session
        header("Location: student_application_token.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($connection); // Debug error if the query fails
    }

    mysqli_close($connection);
} else {
    echo "Invalid request method.";
}



if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_query = "SELECT * FROM `student_users` WHERE `student_user_email` = '$email' AND `student_user_password` = '$password'";
    $execute = mysqli_query($connection, $select_query);

    $count_records = mysqli_num_rows($execute);
    if($count_records > 0){
        $display = mysqli_fetch_array($execute);
        $_SESSION['student_user_id'] = $display['student_user_id'];
        $_SESSION['student_user_email'] = $display['student_user_email'];
        $_SESSION['student_user_password'] = $display['student_user_password'];
        $_SESSION['student_user_name'] = $display['student_user_name'];
        $_SESSION['student_user_batchcode'] = $display['student_user_batchcode'];
        $_SESSION['student_user_image'] = $display['student_user_image'];
        $_SESSION['user_role'] = $display['user_role'];
        header("location: home.php");
    }
    else {
        echo "<script>alert('Invalid Credentials');
        location.assign('login.php');
        </script>";
    }
}
?>
