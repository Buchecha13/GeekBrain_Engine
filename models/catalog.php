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
    $sql = "SELECT price FROM products WHERE name = '{$productName}'";
    $productPrice = getAssocResult($sql)[0]['price'];

    $sql = "INSERT INTO `cart`(`session_id`, `product_name`, `product_price`) VALUES ('{$sessionId}', '{$productName}', '{$productPrice}')";
    return executeSql($sql);
}

function doCatalogAction($action) {
    if ($action == 'buy') {
        buyProduct();
        header("Location: /catalog");
        exit();
    }
}