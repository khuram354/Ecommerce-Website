<h3 class="text-center text-primary">All Brands</h3>
<table class="table table-bordered mt-3 align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>Sr</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brand = "SELECT * from `brands`";
        $result = mysqli_query($con, $select_brand);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $brand_title; ?>
                </td>
                <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>'><i
                            class='fa-solid fa-pen-to-square fa-lg'></i></a></td>

                <td>
                    <a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                        onclick='return confirm("Are you sure you want to delete this brand?");'>
                        <i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>