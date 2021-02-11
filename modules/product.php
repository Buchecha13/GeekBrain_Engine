<?php
function doProductAction($action) {
    if ($action == 'buy') {
        buyProduct();
        header("Location: /product/?name={$_GET['name']}");
        exit();
    }
}