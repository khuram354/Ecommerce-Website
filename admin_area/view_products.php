<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered text-center mt-5 table-thick-border">
    <thead>
        <tr>
            <th class="bg-info">Product ID</th>
            <th class="bg-info">Product Title</th>
            <th class="bg-info">Product Image</th>
            <th class="bg-info">Product Price</th>
            <th class="bg-info">Total Sold</th>
            <th class="bg-info">Status</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
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
                <td class="align-middle">
                    <?php echo $number; ?>
                </td>
                <td class="align-middle">
                    <?php echo $product_title; ?>
                </td class="align-middle">
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' /></td>
                <td class="align-middle">
                    <?php echo $product_price; ?>
                </td>
                <td class="align-middle">
                    <?php
                    $get_count = "SELECT * from `orders_pending` where product_id=$product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                </td>
                <td class="align-middle">
                    <?php echo $status; ?>
                </td>
                <td class="align-middle"><a href='index.php?edit_products=<?php echo $product_id ?>'><i
                            class='fa-solid fa-pen-to-square fa-lg'></i></a></td>
                <td class="align-middle"><a href=''><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>

</table>