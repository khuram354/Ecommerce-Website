<h3 class="text-center text-primary">All Products</h3>
<table class="table table-bordered mt-3 align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products = "SELECT * from `products`";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $product_title; ?>
                </td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' /></td>
                <td>
                    <?php echo $product_price; ?>
                </td>
                <td>
                    <?php
                    $get_count = "SELECT * from `orders_pending` where product_id=$product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                </td>
                <td>
                    <?php echo $status; ?>
                </td>
                <td><a href='index.php?edit_products=<?php echo $product_id; ?>'><i
                            class='fa-solid fa-pen-to-square fa-lg'></i></a></td>

                <td><a href='index.php?delete_product=<?php echo $product_id; ?>'
                        onclick='return confirm("Are you sure you want to delete this Product?");'><i
                            class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>