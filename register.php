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
        header('Location: login');
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
    <title>TND Support System - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #1A2942;
            font-family: "Poppins", serif;
        }
    </style>
</head>

<body class="bg-[#1A2942] flex items-center justify-center min-h-screen py-10">

    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
        <h3 class="text-center text-2xl font-semibold text-[#1A2942] mb-6">TND Support System | Register</h3>
        <form action="register" method="POST" enctype="multipart/form-data" class="space-y-6">
            
            <div class="grid grid-cols-2 gap-5">
            <div>
                <label for="student_user_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="student_user_name" name="student_user_name" required placeholder="Enter your name">
            </div>

            <div>
                <label for="student_user_email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="student_user_email" name="student_user_email" required placeholder="Enter your email">
            </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
            <div>
                <label for="student_user_password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="student_user_password" name="student_user_password" required placeholder="Enter your password">
            </div>
            <div>
                <label for="student_user_batchcode" class="block text-sm font-medium text-gray-700">Batch Code</label>
                <input type="text" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="student_user_batchcode" name="student_user_batchcode" required placeholder="Enter your batch code">
            </div>
            </div>

            <div>
                <label for="student_current_semester_id" class="block text-sm font-medium text-gray-700">Current Semester</label>
                <select class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" name="student_current_semester_id" required>
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

            <div>
                <label for="student_user_image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" name="student_user_image" id="student_user_image" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" class="h-4 w-4 text-[#1A2942] border-gray-300 rounded" id="rememberMe" name="rememberMe">
                <label for="rememberMe" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <div>
                <button type="submit" name="register" class="w-full py-3 px-4 bg-[#D3F2F4] text-[#1A2942] font-medium rounded-md hover:bg-[#1A2942] hover:text-white transition duration-300">Register</button>
            </div>

            <div class="text-center">
                <small class="text-sm text-gray-600">Already have an account? <a href="./login" class="text-[#1A2942] font-bold hover:underline">Log In</a></small>
            </div>
        </form>
    </div>

</body>

</html>
