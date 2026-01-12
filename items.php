<?php
session_start();
$pageTitle = "Show Items";
include 'init.php';

$itemid = isset($_GET["itemid"]) && is_numeric($_GET["itemid"]) ? intval($_GET["itemid"]) : 0;
$stmt = $con->prepare("SELECT items.*,
                                categories.name AS category_name,
                                users.Username AS user_name
                                FROM items
                                INNER JOIN categories
                                ON catid = cat_id
                                INNER JOIN users
                                ON user_id = member_id
                                WHERE item_id = ?");
$stmt->execute(array($itemid));
$row = $stmt->rowCount();
if ($row > 0) {
    $item = $stmt->fetch();
?>
    <h2 class="text-center"><?php echo $item['name'] ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src="img.jpg" alt="Card image cap">
            </div>
            <div class="col-md-9">
                <h2><?php echo $item['name'] ?></h2>
                <p><?php echo $item['description'] ?></p>
                <span><?php echo $item['add_date'] ?></span>
                <div><?php echo $item['price'] ?></div>
                <div><?php echo $item['country_made'] ?></div>
                <div>Created By: <?php echo $item['user_name'] ?></div>

            </div>
        </div>
        <b>test</b>
        <strong>test</strong>
    </div>
<?php } else {
    echo "there is no such ID";
}
?>

<?= include $tpl . 'footer.php'; ?>