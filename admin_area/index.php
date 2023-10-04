<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>
    <!-- navbar starts -->
    <div class="container-fluid p-0">
        <!-- 1st child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- 2nd child -->
        <div class="bg-light text-center">
            <h3 class="p-2">Manage Details</h3>
        </div>

        <!-- 3rd child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/admin1.png" alt="admin1" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert
                            Products</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View
                            Product</a></button>
                    <button class="my-3 border-0"><a href="index.php?insert_category"
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert
                            Categories</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View
                            Categories</a></button>
                    <button class="my-3 border-0"><a href="index.php?insert_brand"
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Insert
                            Brands</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">View
                            Brands</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">All
                            Orders</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">All
                            Payments</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">List
                            Users</a></button>
                    <button class="my-3 border-0"><a href=""
                            class="nav-link text-dark fw-bold bg-info m-1 px-2 py-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- 4th child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            ?>
        </div>

        <!-- last child -->
        <div class="bg-info p-3 text-center footer">
            <p class="mb-0">All Rights Reserved &copy; Designed by Khuram Shahzad 2023</p>
        </div>

    </div>


    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>