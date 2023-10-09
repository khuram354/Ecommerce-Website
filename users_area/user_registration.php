<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

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
        .form-outline input[type="password"]:focus,
        .form-outline input[type="file"]:focus {
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
            padding: 15px 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 18px;
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

<!-- PHP code -->
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Hash the password before storing it
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    //select query
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username already exists. Please choose another username!')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password and Confirm Password are not matched.')</script>";
    } else {
        //insert query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hashed_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
    }
    if ($sql_execute) {
        echo "<script>alert('Data inserted Successfully!')</script>";
    } else {
        die('Connection failed: ' . mysqli_connect_error());
    }

    //selecting cart items
    $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $SESSION['username'] = $user_username;
        echo "<script>alert('You have some items in the Cart!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>