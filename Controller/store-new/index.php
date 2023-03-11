<?php require_once("./_inc/config.php") ?>
<?php include("./_inc/side_bar.php") ?>
<?php include("./_inc/head.php") ?>
<?php require("./_lib/add-product.php") ?>
<?php require("./_lib/add-agent.php") ?>


<!DOCTYPE html>
<html lang="en">
<?php render_head(
    title: "Store Manager - Dashboard",
    children: ' <link rel="stylesheet" href="' . $GLOBALS["store_path"] . '/_styles/home.css">
                <link rel="stylesheet" href="' . $GLOBALS["store_path"] . '/_styles/popup.css">'
) ?>

<body>
    <div class="wrapper">
        <?php render_side_bar(
            array(
                new Sidebar_Link(name: "Home", href: $GLOBALS["store_path"], icon: "fa-house", is_active: true),
                new Sidebar_Link(name: "Stocks", href: $GLOBALS["store_path"] . '/stocks', icon: "fa-warehouse", is_active: false),
                new Sidebar_Link(name: "Orders", href: $GLOBALS["store_path"] . '/orders', icon: "fa-file-circle-check", is_active: false),
                new Sidebar_Link(name: "Agents", href: $GLOBALS["store_path"] . '/agents', icon: "fa-user-group", is_active: false),
                new Sidebar_Link(name: "Returned Goods", href: $GLOBALS["store_path"] . '/returned-goods', icon: "fa-user-group", is_active: false),
            )
        ) ?>
        <main>
            <?php include("./_inc/navigation.php") ?>

            <div class="content">
                <div class="nav-bar">
                    <span></span>
                    <nav>
                        <button class="popup-btn action" popup-target="add-product">Add Product</button>
                        <button class="popup-btn action" popup-target="add-agent">Add Agent</button>
                    </nav>
                </div>
                <div class="cards small">
                    <div class="card">
                        <h4>Customer<br />Orders</h4>
                        <small>Monthly</small>
                        <span>24</span>
                    </div>
                    <div class="card">
                        <h4>Incomplete<br />Orders</h4>
                        <small>Monthly</small>
                        <span>11</span>
                    </div>
                    <div class="card">
                        <h4>Outstanding<br />Payments</h4>
                        <small>Monthly</small>
                        <span>Rs. 43,500</span>
                    </div>
                    <div class="card">
                        <h4>On-time Delivery<br />Rate</h4>
                        <small>Monthly</small>
                        <span>86.07%</span>
                    </div>
                    <div class="card">
                        <h4>Retention<br />Rate</h4>
                        <small>Monthly</small>
                        <span>Rs. 120,000</span>
                    </div>
                </div>
                <div class="cards large">
                    <div class="card">
                        <h4>Successful Order Vs. Returned Orders</h4>
                        <img src="<?php echo $GLOBALS["store_path"] ?>/_assets/graph1.png" alt="">
                    </div>
                    <div class="card">
                        <h4>Outstanding Payments</h4>
                        <img src="<?php echo $GLOBALS["store_path"] ?>/_assets/graph2.jpg" alt="">
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="popup" id="add-product">
        <div class="container">
            <div class="header">
                <h4>Add Product</h4>
                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="wrapper">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="" class="input">
                        <span>Name</span>
                        <input type="text" name="p_name" placeholder="" required>
                    </label>
                    <label for="" class="input">
                        <span>Category</span>
                        <input type="text" name="p_category" placeholder="" required>
                    </label>
                    <label for="" class="input">
                        <span>Code</span>
                        <input type="text" name="p_code" placeholder="" required>
                    </label>
                    <label for="" class="input">
                        <span>Buying Price(Rs.)</span>
                        <input type="number" name="p_buying_price" placeholder="" min="0" required>
                    </label>
                    <label for="" class="input">
                        <span>Selling Price(Rs.)</span>
                        <input type="number" name="p_selling_price" placeholder="" min="0" required>
                    </label>
                    <label for="" class="input">
                        <span>Quantity </span>
                        <input type="number" name="p_qty" placeholder="" min="0" required>
                    </label>
                    <button class="disabled" type="reset">Cancel</button>
                    <button class="main" type="submit" name="submit" value="add-product">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="popup" id="add-agent">
        <div class="container">
            <div class="header">
                <h4>Add Agent</h4>
                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="wrapper">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="" class="input">
                        <span>Company name</span>
                        <input type="text" name="a_company_name" placeholder="" required>
                    </label>
                    <label for="" class="input">
                        <span>Phone Number</span>
                        <input type="tel" pattern="{0-9}[10]" name="a_phone_no" placeholder="" required>
                    </label>
                    <label for="" class="input">
                        <span>Address</span>
                        <input type="text" name="a_address" placeholder="" min="0" required>
                    </label>
                    <div></div>
                    <button class="disabled" type="reset">Cancel</button>
                    <button class="main" type="submit" value="add-agent" name="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo $GLOBALS["store_path"] ?>/_scripts/popup.js"></script>
    <?php include("./_inc/scripts.php") ?>
</body>

</html>