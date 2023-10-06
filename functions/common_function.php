<?php
// include connect file
include('../includes/connect.php');

// getting products
function getproducts()
{
    $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,9";
    $result_query = mysqli_query($con, $select_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-info'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
    }
    ?>
    </div>
    </div>
    <!-- side-navbar -->
    <div class="col-md-2 bg-secondary p-0">
        <!-- Brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light">
                    <h4>Delivery Brands</h4>
                </a>
            </li>
            <?php
            $select_brands = "SELECT * FROM brands";
            $result_brands = mysqli_query($con, $select_brands);
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];
                echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";
            }
}



?>