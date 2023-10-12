<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-cart details</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <style>
        .cart_img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <!-- navbar starts -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="./images/khuram_logo.svg" alt="our logo" class="pb-3">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- calling cart function -->
        <?php
        cart();
        ?>
        <!-- 2nd child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                                    <a class='nav-link' href='#'>Welcome Guest</a>
                                </li>";
                } else {
                    echo "<li class='nav-item'>
                                        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                                        </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>
        <!-- 3rd child -->
        <div class="bg-light">
            <h3 class="text-center">Our Store</h3>
            <p class="text-center">
                Communication is the heart of community and e-commerce
            </p>
        </div>
        <!-- 4th child table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- php code to display dynamic data -->
                        <?php
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "  <thead>
                                        <tr>
                                            <th>Product Title</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM `products` WHERE product_id= $product_id";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;
                                    ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?php echo $product_title ?>
                                        </td>
                                        <td class="align-middle"><img
                                                src="./admin_area/product_images/<?php echo $product_image1 ?>" alt=""
                                                class="cart_img"></td>
                                        <td class="align-middle"><input type="text" name="qty" class="form-input w-50 text-center">
                                        </td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "UPDATE `cart_details` SET quantity = ? WHERE ip_address = ?";
                                            $stmt = $con->prepare($update_cart);
                                            $stmt->bind_param("is", $quantities, $get_ip_add);
                                            if ($stmt->execute()) {
                                                // Update successful
                                                $total_price = intval($total_price) * intval($quantities);
                                            } else {
                                                // Update failed
                                                echo "Error updating cart: " . $stmt->error;
                                            }
                                            $stmt->close();
                                        }
                                        ?>
                                        <td class="align-middle">
                                            <?php echo $price_table ?>/-
                                        </td>
                                        <td class="align-middle"><input type="checkbox" name="removeitem[]"
                                                value="<?php echo $product_id ?>"></td>
                                        <td class="align-middle">
                                            <!-- <button type="button" class="btn btn-warning">Update</button> -->
                                            <input type="submit" value="Update Cart" class="btn btn-warning" name="update_cart">
                                            <!-- <button type="button" class="btn btn-danger">Remove</button> -->
                                            <input type="submit" value="Remove Cart" class="btn btn-danger" name="remove_cart">
                                        </td>
                                    </tr>
                                <?php }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='p-1'>Subtotal: <strong>$total_price</strong></h4>
            <a href='index.php'><input type='button' class='btn btn-primary mx-3' value='Continue Shopping' name='continueShopping'></a>
            <a href='./users_area/checkout.php'><input type='button' class='btn btn-success' value='Checkout' name='checkout'></a>";
                        } else {
                            echo "<a href='index.php'><input type='button' class='btn btn-primary mx-3' value='Continue Shopping' name='continueShopping'></a>";
                        }
                        if (isset($_POST['continueShopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>
                    </div>
                </form>
                <!-- function to remove items -->
                <?php
                function remove_cart_item()
                {
                    global $con;
                    if (isset($_POST['remove_cart'])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            echo $remove_id;
                            $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                            $run_delete = mysqli_query($con, $delete_query);
                            if ($run_delete) {
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }

                        }
                    }
                }
                remove_cart_item();

                ?>
            </div>
        </div>

        <!-- last child -->
        <!-- include footer -->
        <?php
        include('./includes/footer.php');
        ?>
    </div>

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>