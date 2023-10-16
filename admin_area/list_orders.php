<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-3 aligin-middle text-center">
    <thead class="table-info">

        <?php
        $get_orders = "SELECT * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        echo "<tr>
        <th>Sr</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";

        if ($row_count == 0) {
            echo "<h2 class='bgdanger text-center'>No Orders Yet</h2>";
        } else {
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop'><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a>
                </td>
                </tr>";
            }
        }

        ?>

        </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-danger text-center">Are you sure to delete this brand?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="index.php?list_orders"
                        class="text-decoration-none text-light">No</a></button>

                <button type="button" class="btn btn-danger"><a href='index.php?delete_order=<?php echo $order_id; ?>'
                        class="text-decoration-none text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>