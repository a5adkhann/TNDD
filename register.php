<?php
require_once("./db/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $name = mysqli_real_escape_string($connection, $_POST['student_user_name']);
    $email = mysqli_real_escape_string($connection, $_POST['student_user_email']);
    $password = mysqli_real_escape_string($connection, $_POST['student_user_password']);
    $batch_code = mysqli_real_escape_string($connection, $_POST['student_user_batchcode']);
    $semester_id = mysqli_real_escape_string($connection, $_POST['student_current_semester_id']);
    
    // Handle image upload
    $image = $_FILES['student_user_image']['name'];
    $image_temp = $_FILES['student_user_image']['tmp_name'];
    $image_folder = "uploads/" . $image;
    
    // Check if image is uploaded
    if (!empty($image)) {
        move_uploaded_file($image_temp, $image_folder); // Move the image to the uploads folder
    }
    
    // Insert data into the student_users table
    $insert_query = "INSERT INTO student_users (student_user_name, student_user_email, student_user_password, student_user_batchcode, student_user_current_semester_id, student_user_image) 
                     VALUES ('$name', '$email', '$password', '$batch_code', '$semester_id', '$image_folder')";

    // After successful registration
    if (mysqli_query($connection, $insert_query)) {
        // Set a session variable to indicate success
        $_SESSION['registration_success'] = true;

        // Redirect to the same page to show the message
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        background-color: #333;
        font-family: "Poppins", serif;
    }

    .register-form {
        color: #FFF;
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        background-color: transparent;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .register-form button {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #D3F2F4;
    }

    .register-form button:hover {
        background-color: #3BC0C3;
        color: #FFF;
    }

    .register-form .form-check-label {
        font-size: 14px;
    }
    </style>
</head>

<body>

    <div class="register-form container p-5 my-5 rounded shadow">
        <h3 class="text-center mb-4">TND Support System | Register</h3>
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="student_user_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="student_user_name" name="student_user_name" required
                            placeholder="Enter your name">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="student_user_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="student_user_email" name="student_user_email"
                            required placeholder="Enter your email">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="student_user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="student_user_password" name="student_user_password"
                    required placeholder="Enter your password">
            </div>

            <div class="mb-3">
                <label for="student_user_batchcode" class="form-label">Batch Code</label>
                <input type="text" class="form-control" id="student_user_batchcode" name="student_user_batchcode"
                    required placeholder="Enter your batch code">
            </div>

            <div class="mb-3">
                <label for="student_current_semester_id" class="form-label">Current Semester</label>
                <select class="form-select" name="student_current_semester_id" required>
                    <option value="---">---</option>
                    <?php
            // Fetch semesters from the database
            $select_query = "SELECT * FROM `all_semesters`";
            $execute = mysqli_query($connection, $select_query);
            while ($fetch = mysqli_fetch_array($execute)) {
            ?>
                    <option value="<?php echo $fetch['semester_id']?>"><?php echo $fetch['semester_name']?></option>
                    <?php
            }
            ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="student_user_image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="student_user_image" id="student_user_image" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn">Register</button>
            </div>

            <div class="text-center mt-3">
                <small>Already registered? <a href="./login.php">Log In</a></small>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
