<?php

include 'init.php';
echo "weclome";

$cats = getLatest("*", "categories", "catid");
foreach ($cats as $cat) {
    echo $cat['name'];
}


include $tpl . 'footer.php';
