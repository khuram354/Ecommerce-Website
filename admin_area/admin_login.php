<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        .form-outline input[type="password"]:focus {
            border-bottom-color: #2980b9;
        }

        .form-label {
            color: #3498db;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-login {
            background-color: #27ae60;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 7px 17px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
            letter-spacing: 1.2px;
        }

        .btn-login:hover {
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
    <div class="container my-5">
        <h2 class="text-center text-danger mb-4">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-container">
                    <form action="" method="post">
                        <!-- adminName field -->
                        <div class="form-outline">
                            <label for="admin_username" class="form-label">Admin Username</label>
                            <input type="text" id="admin_username" class="form-control"
                                placeholder="Enter your username" autocomplete="off" name="admin_username" required />
                        </div>
                        <!-- adminEmail field -->
                        <div class="form-outline">
                            <label for="admin_email" class="form-label">Admin Email</label>
                            <input type="email" id="admin_email" class="form-control" placeholder="Enter your email"
                                autocomplete="off" name="admin_email" required />
                        </div>
                        <!-- adminPassword field -->
                        <div class="form-outline">
                            <label for="admin_password" class="form-label">Admin Password</label>
                            <input type="password" id="admin_password" class="form-control"
                                placeholder="Enter your password" autocomplete="off" name="admin_password" required />
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-login" name="admin_login">Login</button>
                        </div>
                        <p class="small text-center mt-3">Don't have an account ? <a href="admin_registration.php"
                                class="login-link">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $admin_ip = getIPAddress();

    if ($row_count > 0) {
        $_SESSION['admin_name'] = $admin_username;
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // echo "<script>alert('Login Successful!')</script>";
            if ($row_count == 1) {
                $_SESSION['admin_name'] = $admin_username;
                echo "<script>alert('Login Successful!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $_SESSION['admin_name'] = $admin_username;
                echo "<script>alert('Login Successful!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        } else {
            echo "<script>alert('invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('invalid credentials')</script>";
    }
}
?>