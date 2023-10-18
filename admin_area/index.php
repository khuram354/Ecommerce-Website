<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="../style.css">

    <style>
        body {
            overflow-x: hidden;
        }

        .product_img {
            width: 100px;
            object-fit: contain;
            height: auto;
            margin-left: 10px;
        }

        .admin_image {
            width: 100px;
            object-fit: contain;
            height: auto;
        }
    </style>

</head>

<body>
    <!-- navbar starts -->
    <div class="container-fluid p-0">
        <!-- 1st child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="khuram_logo.svg" alt="our logo" class="pb-3">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                            </li>";
                        } else {
                            echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome " . $_SESSION['admin_name'] . "</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- 2nd child -->
        <div class="bg-light text-center">
            <h3 class="p-2">Manage Details</h3>
        </div>

        <!-- 3rd child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/admin1.png" alt="admin1" class="admin_image"></a>
                    <?php
                    if (!isset($_SESSION['admin_name'])) {
                        echo "<p class='text-light text-center'>Admin Name</p>";
                    } else {
                        echo "<p class='text-light text-center'>" . $_SESSION['admin_name'] . "</p>";
                    }
                    ?>
                </div>
                <div class="button text-center">

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'insert_products.php');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert Products</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?view_products');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View Product</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?insert_category');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert
                            Categories</span></button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?view_categories');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View Categories</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?insert_brand');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert Brands</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?view_brands');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View Brands</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?list_orders');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">All Orders</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?list_payments');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">All Payments</span>
                    </button>

                    <button class="my-3 border-0" <?php echo !isset($_SESSION['admin_name']) ? 'disabled' : ''; ?>
                        onclick="return onButtonClick(event, 'index.php?list_users');">
                        <span class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">List Users</span>
                    </button>

                    <?php
                    if (!isset($_SESSION['admin_name'])) {
                        echo '<button class="my-3 border-0"><a href="admin_login.php" class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Admin Login</a></button>';
                    } else {
                        echo '<button class="my-3 border-0"><a href="logout.php" class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Logout</a></button>';
                    }
                    ?>
                </div>
                <script>
                    function onButtonClick(event, target) {
                        if (event.target.getAttribute('disabled') !== null) {
                            event.preventDefault(); // Prevent anchor tag's default behavior
                            return false; // Prevent button click event
                        }
                        window.location.href = target; // Redirect to the desired location
                    }
                </script>
            </div>
        </div>

        <!-- 4th child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            ?>
        </div>

        <!-- last child -->
        <!-- include footer -->
        <?php
        include('../includes/footer.php');
        ?>

    </div>


    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>