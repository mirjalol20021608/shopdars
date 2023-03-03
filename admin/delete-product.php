<?php

require('../dbmysql.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM product WHERE id = {$id}";
    $conn->query($delete_sql);
    header('location: product.php');
}