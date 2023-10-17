<?php
if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];

    $delete_query = "DELETE FROM `user_orders` WHERE `order_id` = $order_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Order has been deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}
?>