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
            background-color: #CDEAF3;
            font-family: "Poppins", serif;
        }

        .register-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
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

    <div class="register-form container bg-light p-5 my-5 rounded shadow">
        <h3 class="text-center mb-4">Register</h3>
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Name</label>
                <input type="email" class="form-control" id="email" name="email" required
                    placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required
                    placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    placeholder="Enter your password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn">Register</button>
            </div>

            <div class="text-center mt-3">
                <small>Forgot your password? <a href="#">Reset it here</a></small>
            </div>

            <div class="text-center mt-3">
                <small>Already registered? <a href="#">Log In</a></small>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>