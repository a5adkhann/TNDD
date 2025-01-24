<?php
// Start the session
session_start();
session_unset();

// Set session variable for logout success
$_SESSION['logout_success'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #333;
            font-family: "Poppins", serif;
        }
        .logout-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .logout-form button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #D3F2F4;
        }
        .logout-form button:hover {
            background-color: #3BC0C3;
            color: #FFF;
        }
        .logout-form .form-check-label {
            font-size: 14px;
        }
        .logout-message {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="logout-form container bg-light p-5 my-5 rounded shadow">
        <h3 class="text-center mb-4">TND Support System | Logout</h3>
        
        <div class="logout-message">
            <p>You have successfully logged out!</p>
            <p>Your session has been ended.</p>
            <p>We hope to see you again soon.</p>
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="button" class="btn" onclick="window.location.href='login.php'">Login Again</button>
        </div>

        <div class="text-center mt-3">
            <small>If you have any issues, <a href="#">contact support</a></small>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show success toast if logout_success session is set
        <?php if (isset($_SESSION['logout_success']) && $_SESSION['logout_success'] === true) { ?>
            iziToast.error({
                timeout: 5000, 
                icon: 'fa fa-check-circle',
                title: 'Logged Out',
                message: 'You have successfully logged out.',
                position: 'bottomRight' 
            });
            <?php 
                // Clear the session flag after showing the message
                unset($_SESSION['logout_success']);
            } ?>

        // Redirect after showing toast
        setTimeout(function() {
            window.location.href = 'login.php'; // Redirect to login page after showing the toast
        }, 5500); // Wait 5.5 seconds (time for the toast to finish showing)
    });
    </script>

</body>

</html>
