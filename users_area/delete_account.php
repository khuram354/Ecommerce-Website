<h3 class="text-danger mb-4">Delete Account ?</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control bg-danger text-light w-25 m-auto" name="delete" value="Delete Account">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control bg-warning text-dark w-25 m-auto" name="dont_delete"
            value="Don't Delete Account">
    </div>
</form>

<?php
$username_session = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query = "DELETE from `user_table` where username='$username_session'";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        session_destroy();
        echo "<script>alert('Your account has been deleted!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}

?>