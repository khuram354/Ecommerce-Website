<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Getting total price and quantity of all items in cart
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $total_quantity = 0;

    $cart_query_price = "SELECT product_id, quantity FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $result_cart_price = mysqli_query($con, $cart_query_price);
    $invoice_number = mt_rand();
    $status = 'pending';

    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $quantity = $row_price['quantity'];

        $select_product = "SELECT product_price FROM `products` WHERE product_id = $product_id";
        $run_price = mysqli_query($con, $select_product);
        $row_product_price = mysqli_fetch_array($run_price);
        $product_price = $row_product_price['product_price'];

        $total_price += $product_price * $quantity;
        $total_quantity += $quantity;
    }

    // Calculate subtotal
    $subtotal = $total_price; // No need to multiply by $total_quantity

    // Insert into user_orders table
    $insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ('$user_id', '$subtotal', '$invoice_number', '$total_quantity', NOW(), '$status')";
    $result_query = mysqli_query($con, $insert_orders);

    if ($result_query) {
        // Insert into orders_pending table
        $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES ('$user_id', '$invoice_number', '$product_id', '$total_quantity', '$status')";
        $result_pending_orders = mysqli_query($con, $insert_pending_orders);

        if ($result_pending_orders) {
            // Delete items from cart
            $empty_cart = "DELETE FROM `cart_details` WHERE ip_address= '$get_ip_address'";
            $result_delete = mysqli_query($con, $empty_cart);

            if ($result_delete) {
                echo "<script>alert('Orders have been submitted successfully!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                echo "<script>alert('Error deleting items from cart!')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Error inserting pending orders!')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Error inserting user orders!')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
    }
} else {
    echo "<script>alert('Invalid user ID!')</script>";
    echo "<script>window.open('cart.php','_self')</script>";
}
?>