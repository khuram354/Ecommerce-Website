<h3 class="text-center text-primary">All Brands</h3>
<table class="table table-bordered mt-4 text-center align-middle">
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
                <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>'><i
                            class='fa-solid fa-pen-to-square fa-lg'></i></a></td>

                <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>' type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-danger text-center">Are you sure to delete this brand?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?view_brands"
                        class="text-decoration-none text-light">No</a></button>

                <button type="button" class="btn btn-danger"><a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                        class="text-decoration-none text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>