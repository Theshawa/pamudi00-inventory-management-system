<?php

require_once(__DIR__ . '/connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "update-product")) {
    return;
}

$id = $_POST["p_id"];
$name = $_POST["p_name"];
$category = $_POST["p_category"];
$code = $_POST["p_code"];
$buying_price = $_POST["p_buying_price"];
$selling_price = $_POST["p_selling_price"];
$qty = $_POST["p_qty"];

unset($_POST);

$sql = "UPDATE stocks SET productName='$name', productCategory='$category', productCode='$code', buyingPrice='$buying_price', sellingPrice='$selling_price', quantity='$qty' WHERE id=$id";


try {
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product updated successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Unable to update product due to an error: ' . $conn->error . '")</script>';
}
