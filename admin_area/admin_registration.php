<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px 40px;
            margin: 40px auto;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-outline input[type="text"],
        .form-outline input[type="email"],
        .form-outline input[type="password"] {
            border: none;
            border-bottom: 2px solid #3498db;
            border-radius: 5px;
            outline: none;
            background-color: transparent;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            width: 100%;
        }

        .form-outline input[type="text"]:focus,
        .form-outline input[type="email"]:focus,
        .form-outline input[type="password"]:focus :focus {
            border-bottom-color: #2980b9;
        }

        .form-label {
            color: #3498db;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-register {
            background-color: #27ae60;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 7px 17px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 18px;
            letter-spacing: 1.2px;
        }

        .btn-register:hover {
            background-color: #219f4e;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
        }

        .login-link {
            color: #e74c3c;
            text-decoration: none;
            background-color: transparent;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-link:hover {
            background-color: #e74c3c;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-success mb-5">Admin Registration</h2>
        <div class="row">
            <div class="col-lg-6">
                <img src="admin_reg.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-outline">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter User Name" required>
                    </div>
                    <div class="form-outline">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"
                            required>
                    </div>
                    <div class="form-outline">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="form-outline">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-register" name="admin_registration">Register</button>
                    </div>
                    <p class="small text-center mt-2">Already have an account? <a href="admin_login.php"
                            class="login-link">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>