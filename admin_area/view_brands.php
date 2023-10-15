<h3 class="text-center text-primary">All Brands</h3>
<table class="table table-bordered mt-5 text-center align-middle">
    <thead>
        <tr>
            <th class="bg-dark text-light">Sr</th>
            <th class="bg-dark text-light">Brand Title</th>
            <th class="bg-dark text-light">Edit</th>
            <th class="bg-dark text-light">Delete</th>
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
                <td><a href=''><i class='fa-solid fa-pen-to-square fa-lg'></i></a></td>
                <td><a href=''><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>