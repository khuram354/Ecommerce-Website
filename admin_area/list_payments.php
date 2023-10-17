<h3 class="text-center text-primary">All Payments</h3>
<table class="table table-bordered mt-3 text-center">
    <thead class="table-dark">

        <?php
        $get_payments = "SELECT * FROM `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h4 class='text-center mt-6 text-danger'>No payment received yet</h4>";
        } else {
            echo "<tr>
            <th>Sr</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $invoice_number = $row_data['invoice_number'];
                $amount = $row_data['amount'];
                $date = $row_data['date'];
                $payment_mode = $row_data['payment_mode'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$amount</td>
                <td>$invoice_number</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td>
                <a href='javascript:void(0);' onclick='confirmDelete($payment_id)'><i class='fa-solid fa-trash fa-lg' style='color: #e30d38;'></i></a>
                </td>
                </tr>";
            }
        }

        ?>

        </tbody>
</table>

<script>
    function confirmDelete(paymentId) {
        var confirmDelete = confirm("Are you sure you want to delete this payment?");
        if (confirmDelete) {
            window.location.href = 'index.php?delete_payment=' + paymentId;
        }
    }
</script>