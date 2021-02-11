<?php
function getCatalog()
{
    $sql = "SELECT * FROM `products`";
    return getAssocResult($sql);
}

function getProduct($name)
{
    $sql = "SELECT * FROM `products` WHERE `name`='{$name}'";
    return getAssocResult($sql) [0];
}

function buyProduct() {
    $sessionId = session_id();
    $productName = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_GET['name'])));
    $sql = "INSERT INTO `cart`(`session_id`, `product_name`) VALUES ('{$sessionId}', '{$productName}')";
    return mysqli_query(getDb(), $sql);
}

function doCatalogAction($action) {
    if ($action == 'buy') {
        buyProduct();
        header("Location: /catalog");
        exit();
    }
}