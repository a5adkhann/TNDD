<?php
// Start the session
session_start();
session_unset();

$_SESSION['logout_success'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TND Support System - Logout</title>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #1A2942;
            font-family: "Poppins", serif;
        }

        .logout-card {
            background-color: white; /* White background for the card */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-[#1A2942] flex justify-center items-center min-h-screen">

    <div class="logout-card max-w-lg w-full mx-4">
        <h3 class="text-center text-3xl font-semibold text-[#1A2942] mb-6">TND Support System | Logout</h3>

        <div class="text-center mb-6">
            <p class="text-lg text-gray-700">You have successfully logged out!</p>
            <p class="text-lg text-gray-700">Your session has been ended.</p>
            <p class="text-lg text-gray-700">We hope to see you again soon.</p>
        </div>

        <div class="text-center">
            <button onclick="window.location.href='login'" class="w-full py-3 px-4 bg-[#D3F2F4] text-[#1A2942] font-medium rounded-md hover:bg-[#1A2942] transition duration-300">
                Login Again
            </button>
        </div>
    </div>

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
                window.location.href = 'login'; // Redirect to login page after showing the toast
            }, 5500); // Wait 5.5 seconds (time for the toast to finish showing)
        });
    </script>

</body>

</html>
