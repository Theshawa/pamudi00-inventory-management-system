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
$min_qty_treshold = $_POST["p_min_qty_treshold"];



unset($_POST);

$sql = "UPDATE stocks SET productName='$name', productCategory='$category', productCode='$code', buyingPrice='$buying_price', sellingPrice='$selling_price', quantity='$qty', minQuantityTreshold='$min_qty_treshold' WHERE id=$id";


try {
    // check quantity & min_quantity_treshold
    if ($min_qty_treshold > $qty) {
        throw new Exception("'Min Quantity Treshold' must be less or equal than to the 'Quantity'");
    }

    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product updated successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
} catch (Exception $e) {
    echo '<script>alert("Unable to update product due to an error: ' . $e->getMessage() . '")</script>';
}
