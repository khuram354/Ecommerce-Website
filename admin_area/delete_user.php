<?php
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];

    $delete_query = "DELETE FROM `user_table` WHERE `user_id` = $user_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('User has been deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>