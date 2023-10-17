<h3 class="text-center text-primary">All Users</h3>
<table class="table table-bordered mt-3 text-center align-middle">
    <thead class="table-dark">

        <?php
        $get_users = "SELECT * FROM `user_table`";
        $result = mysqli_query($con, $get_users);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h4 class='text-center mt-6 text-danger'>No user is present in database!</h4>";
        } else {
            echo "<tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' alt='$username' class='admin_image'/></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td>
                <a href='javascript:void(0);' onclick='confirmDelete($user_id)'><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a>
                </td>
                </tr>";
            }
        }

        ?>

        </tbody>
</table>

<script>
    function confirmDelete(userId) {
        var confirmDelete = confirm("Are you sure you want to delete this user?");
        if (confirmDelete) {
            window.location.href = 'index.php?delete_user=' + userId;
        }
    }
</script>