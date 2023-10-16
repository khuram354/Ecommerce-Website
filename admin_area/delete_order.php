<?php
// Check if the delete_order parameter is present in the URL
if (isset($_GET['delete_order'])) {
    $order_id_to_delete = $_GET['delete_order'];
    // Perform the deletion operation, assuming $con is your database connection
    $delete_query = "DELETE FROM `user_orders` WHERE `order_id` = $order_id_to_delete";
    $delete_result = mysqli_query($con, $delete_query);
    // Check if the deletion was successful
    if ($delete_result) {
        echo "<script>alert('Order has been deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
        exit();
    } else {
        echo "Error: Unable to delete the order.";
    }
}
?>