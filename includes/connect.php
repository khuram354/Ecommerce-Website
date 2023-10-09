<?php
$con = mysqli_connect('localhost', 'root', '', 'mystore');

// Check connection
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Now $con can be used to perform database operations
?>