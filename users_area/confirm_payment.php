<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * from `user_orders` where order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<script>alert('Payment Completed Successfully!')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "UPDATE `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($con, $update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        h1 {
            font-size: 36px;
        }

        .btn-primary {
            border: none;
            border-radius: 10px;
            letter-spacing: 1.2px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body class="bg-success">

    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="invoice_number" class="form-label text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                    value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="amount" class="form-label text-light">Amount Due</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="payment_mode" class="form-label text-light">Payment Mode</label>
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash On Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <input type="submit" value="Confirm" class="btn btn-primary" name="confirm_payment">
            </div>
        </form>
    </div>

</body>

</html>