<?php

function getCart()
{
    $sessionId = session_id();
    $sql = "SELECT cart.id, cart.product_name, products.image, products.price FROM `cart`, `products` WHERE `cart`.`product_name` = `products`.`name` AND `session_id` = '{$sessionId}'";
    return getAssocResult($sql);
}

function getCartStatus() {
    if (!empty(getCart())) {
        return true;
    }
    return false;
}

function deleteFromCart() {
    $productId = $_GET['id'];
    $sessionId = session_id();
    $sql = "DELETE FROM `cart` WHERE `cart`.`id` = '{$productId}' AND `session_id` = '{$sessionId}'";
    mysqli_query(getDb(), $sql);

    header("Location: /cart");
    exit();
}

function doCartAction($action) {
    if ($action == 'delete') {
        deleteFromCart();
    }
}

function getCartCount() {
    $sessionId = session_id();
    $sql = "SELECT count(`id`) as count FROM `cart` WHERE `session_id` = '{$sessionId}'";
    return getAssocResult($sql)[0]['count'];
}

function getTotalPrice() {
    $sessionId = session_id();
    $sql = "SELECT SUM(products.price) as totalPrice FROM cart, products WHERE `cart`.`product_name` = `products`.`name` AND `session_id` = '{$sessionId}'";
    return getAssocResult($sql)[0]['totalPrice'];
}