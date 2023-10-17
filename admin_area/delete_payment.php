<?php
if (isset($_GET['delete_payment'])) {
    $payment_id = $_GET['delete_payment'];

    $delete_query = "DELETE FROM `user_payments` WHERE `payment_id` = $payment_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Payment has been deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>