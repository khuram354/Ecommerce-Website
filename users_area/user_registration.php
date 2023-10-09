<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 10px;
        }

        .form-outline input[type="text"],
        .form-outline input[type="email"],
        .form-outline input[type="password"],
        .form-outline input[type="file"] {
            border: none;
            border-bottom: 2px solid #3498db;
            border-radius: 0;
            outline: none;
            background-color: transparent;
            margin-bottom: 20px;
            padding: 10px 0;
            width: 100%;
        }

        .form-outline input[type="text"]:focus,
        .form-outline input[type="email"]:focus,
        .form-outline input[type="password"]:focus,
        .form-outline input[type="file"]:focus {
            border-bottom-color: #2980b9;
        }

        .form-label {
            color: #555555;
        }

        .btn-register {
            background-color: #27ae60;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #219f4e;
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
    <div class="container my-5">
        <h2 class="text-center mb-4">New User Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="form-outline">
                            <label for="user_username" class="form-label">User Name</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                                autocomplete="off" name="user_username" required />
                        </div>
                        <!-- email field -->
                        <div class="form-outline">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                                autocomplete="off" name="user_email" required />
                        </div>
                        <!-- image field -->
                        <div class="form-outline">
                            <label for="user_image" class="form-label">User Image</label>
                            <input type="file" id="user_image" class="form-control" name="user_image" required />
                        </div>
                        <!-- password field -->
                        <div class="form-outline">
                            <label for="user_password" class="form-label">User Password</label>
                            <input type="password" id="user_password" class="form-control"
                                placeholder="Enter your password" autocomplete="off" name="user_password" required />
                        </div>
                        <!-- confirm password field -->
                        <div class="form-outline">
                            <label for="conf_user_password" class="form-label">Confirm User Password</label>
                            <input type="password" id="conf_user_password" class="form-control"
                                placeholder="Confirm your password" autocomplete="off" name="conf_user_password"
                                required />
                        </div>
                        <!-- address field -->
                        <div class="form-outline">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                                autocomplete="off" name="user_address" required />
                        </div>
                        <!-- contact field -->
                        <div class="form-outline">
                            <label for="user_contact" class="form-label">Contact Number</label>
                            <input type="text" id="user_contact" class="form-control"
                                placeholder="Enter your mobile number" autocomplete="off" name="user_contact"
                                required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-register" name="user_register">Register</button>
                        </div>
                        <p class="small text-center mt-3">Already have an account? <a href="user_login.php"
                                class="login-link">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>