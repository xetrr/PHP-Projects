<?php
ob_start();

// fn to get the lastest records [users, Items , comments]

function getLatest($select, $table, $order, $limit = 10)
{
    global $con;

    $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit ");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;
}
// fn to get the Items from the database [users, Items , comments]

function getItemsFromCategory($select, $where,  $ordering = 'DESC')
{
    global $con;

    $getStmt = $con->prepare("SELECT items.*,.
                                 users.Username AS user_name
                                 FROM items 
                                 INNER JOIN users
                                 ON users.user_id = items.member_id
                                 WHERE cat_id = $where
                                 ORDER BY cat_id $ordering 
                                 ");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;
}
// title function that echos the page title in case the page
function getTitle(): void
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'Default';
    }
}

// prepare html tag
function pre($arg)
{
    return '<pre>' . print_r($arg) . '</pre>';
}

// redirction
function redirectHome($userMsg, $url = null, $seconds = 1)
{
    if ($url === null) {
        $url = 'index.php';
    } else {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = 'index.php';
        }
    }
    header("refresh:$seconds;url=$url");
    echo "<div class= 'alert alert-info'>$userMsg</div>";
    exit();
}

// function to check items in database
function checkItem($select, $from, $value)
{
    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute([$value]);

    $count = $statement->rowCount();
    return $count;
}

// count the number of items  V1.0

function countItems($item, $table)
{
    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();
}



// change all the select boxs in the website 
ob_end_flush();
