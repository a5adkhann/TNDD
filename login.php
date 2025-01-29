<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TND Support System - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #1A2942;
            font-family: "Poppins", serif;
        }
    </style>
</head>

<body class="bg-[#1A2942] flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h3 class="text-center text-2xl font-semibold text-[#1A2942] mb-6">TND Support System | Login</h3>
        <form action="process" method="POST" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-2 block w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1A2942]" id="password" name="password" required placeholder="Enter your password">
            </div>

            <div class="flex items-center">
                <input type="checkbox" class="h-4 w-4 text-[#1A2942] border-gray-300 rounded" id="rememberMe" name="rememberMe">
                <label for="rememberMe" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <div>
                <button type="submit" name="login" class="w-full py-3 px-4 bg-[#D3F2F4] text-[#1A2942] font-medium rounded-md hover:bg-[#1A2942] hover:text-white transition duration-300">Log In</button>
            </div>

            <div class="text-center">
                <small class="text-sm text-gray-600">Don't have an account? <a href="./register" class="text-[#1A2942] font-bold hover:underline">Register</a></small>
            </div>
        </form>
    </div>

</body>

</html>
