<?php include 'init.php'; ?>

<div class="container">
    <h1 class="text-center"> <?php echo str_replace('-', ' ', $_GET["pagename"]); ?>
    </h1>

    <div class="container">
        <?php
        // get the catID
        $catid = isset($_GET["pageid"]) && is_numeric($_GET["pageid"]) ? intval($_GET["pageid"]) : '0';
        $items = getItemsFromCategory('*', $catid);
        if (!$items) {
            echo "<h1 class='text-center'> No Items in this category</h1>"; ?>
            <a href="admin/items.php?do=Add">Add new Item</a>
            <?php
        } else {
            foreach ($items as $item) {
            ?>
                <div class="card item-box" style="width: 14rem;">
                    <span class="price-tag"><?php echo $item['price'] ?></span>
                    <img class="card-img-top" src="img.jpg" alt="Card image cap">
                    <div class="card-body caption">
                        <h5 class="card-title"><?php echo $item['name'] ?></h5>
                        <p class="card-text"><?php echo $item['description'] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
        <?php
            }
        } ?>

    </div>
</div>


<?php include $tpl . 'footer.php'; ?>