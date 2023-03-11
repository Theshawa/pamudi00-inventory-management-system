<?php

$query = $_GET["q"];
if (strlen($query) === 0) {
    header('Location: /Controller/store');
}
?>

<?php require_once("../_inc/config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>


<!DOCTYPE html>
<html lang="en">
<?php render_head(title: "Store Manager - Dashboard") ?>

<body>
    <div class="wrapper">
        <?php render_side_bar(
            array(
                new Sidebar_Link(name: "Home", href: $GLOBALS["store_path"], icon: "fa-house", is_active: false),
                new Sidebar_Link(name: "Stocks", href: $GLOBALS["store_path"] . '/stocks', icon: "fa-warehouse", is_active: false),
                new Sidebar_Link(name: "Orders", href: $GLOBALS["store_path"] . '/orders', icon: "fa-file-circle-check", is_active: false),
                new Sidebar_Link(name: "Agents", href: $GLOBALS["store_path"] . '/agents', icon: "fa-user-group", is_active: false),
                new Sidebar_Link(name: "Returned Goods", href: $GLOBALS["store_path"] . '/returned-goods', icon: "fa-user-group", is_active: false),
            )
        ) ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <div class="content">
                Search results for : <q><?php echo $query ?></q>
            </div>
        </main>
    </div>


    <?php include("../_inc/scripts.php") ?>
</body>

</html>